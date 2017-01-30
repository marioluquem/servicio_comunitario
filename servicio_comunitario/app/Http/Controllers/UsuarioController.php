<?php

namespace servicio_comunitario\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;
use servicio_comunitario\Http\Requests\LoginRequest;
use servicio_comunitario\Http\Requests;

class UsuarioController extends Controller
{



// INSERTAR NUEVO USUARIO-------------------------------------------------------
    public function registrarUsuario(Request $request)
    {

        try{
            //Obtiene el nombre de los archivos (imágenes)
            $archivoFoto = $request->file('foto');
            $nombre_foto = $archivoFoto->getClientOriginalName();
            $key =  $request['cedula']."/". $nombre_foto;

            $archivoDNI = $request->file('dni');
            $nombre_dni = $archivoDNI->getClientOriginalName();
            $key2 =  $request['cedula']."/". $nombre_dni;

            try{
                //Guardamos las imágenes en disco local
                \Storage::disk('images')->put($key,file_get_contents($archivoFoto, FILE_USE_INCLUDE_PATH));
                \Storage::disk('images')->put($key2,file_get_contents($archivoDNI, FILE_USE_INCLUDE_PATH));
            }catch(Exception $e){
                Session::flash('message-error', 'El archivo excede el tamaño máximo');
                if($request->session()->get('rol') == 'A' || $request->session()->get('rol') == 'D')
                    return Redirect::to('createUser');
                else
                    return Redirect::to('register');
            }


            //Cambiamos el formato de la fecha para adecuarlo a la BD
            $date = date("Y-m-d", strtotime($request['fecha_nacimiento']));


            //Verifica si la cédula existe en la BD
            $existeCedula = DB::table('USUARIO')->select('cedula')->where('cedula', $request['cedula'])->first();

            if ($existeCedula != null){
                Session::flash('message-error', 'La cédula ya está registrada en el Sistema');
                if($request->session()->get('rol') == 'A' || $request->session()->get('rol') == 'D')
                   return Redirect::to('createUser');
                else
                    return Redirect::to('register');
            }
            else{
                try{
                    DB::table('USUARIO')->insert([
                        'cedula'=>$request['cedula'],
                        'usuario'=>$request['usuario'],
                        'password'=>password_hash($request['password'], PASSWORD_DEFAULT),
                        'primer_nombre'=>$request['primer_nombre'],
                        'segundo_nombre'=>$request['segundo_nombre'],
                        'primer_apellido'=>$request['primer_apellido'],
                        'segundo_apellido'=>$request['segundo_apellido'],
                        'correo'=>$request['correo'],
                        'fecha_nacimiento'=>$date,
                        'sexo'=>$request['sexo'],
                        'foto'=>$nombre_foto,
                        'dni'=>$nombre_dni,
                        'fk_rol'=>3
                    ]);

                    DB::table('USUARIO_PREGUNTA')->insert([
                        'respuesta'=> $request['respuesta_secreta'],
                        'fk_pregunta'=>$request['pregunta_secreta'],
                        'fk_usuario'=>$request['cedula']
                    ]);

                    Session::flash('message', 'Se ha registrado satisfactoriamente');
                }catch (Exception $e){
                    Session::flash('message-error', 'Hubo un problema SQL');
                }
                return Redirect::to('/');
            }
        }catch (Exception $e){
            Session::flash('message-error', 'Hubo un problema. No se pudo registrar');
            if($request->session()->get('rol') == 'A' || $request->session()->get('rol') == 'D')
                return Redirect::to('createUser');
            else
                return Redirect::to('register');
        }
    }


    //VALIDAR INICIO DE SESIÓN----------------------------------------------------

    public function validarUsuario(LoginRequest $request)
    {
         

            //Traemos el usuario de la BD
            $usuario = DB::table('USUARIO')->select('*')->where('cedula', '=', $request['cedula'])->first();
            $disciplinas = DB::select('select * from DISCIPLINA');

            //Si el usuario existe y la contraseña introducida coincide
            if (($usuario != null) && (password_verify($request['password'], $usuario->password))) {

                //Creamos el path del que se leerán las imágenes
                $path = 'images/' . $usuario->cedula . '/';

                //Obtenemos el ROL del usuario
                $rol = DB::table('ROL')
                    ->join('USUARIO', 'USUARIO.fk_rol', '=', 'ROL.id_rol')
                    ->select('ROL.tipo_rol')
                    ->where('USUARIO.cedula', '=', $request['cedula'])
                    ->first();

                //Arreglamos la data para regresarla
                $data = array(
                    'cedula' => $usuario->cedula,
                    'nombre_usuario' => $usuario->usuario,
                    'primer_nombre' => $usuario->primer_nombre,
                    'segundo_nombre' => $usuario->segundo_nombre,
                    'primer_apellido' => $usuario->primer_apellido,
                    'segundo_apellido' => $usuario->segundo_apellido,
                    'correo' => $usuario->correo,
                    'fecha_nacimiento' => $usuario->fecha_nacimiento,
                    'sexo' => $usuario->sexo,
                    'foto' => $path . $usuario->foto,
                    'dni' => $path . $usuario->dni,
                    'rol' => $rol->tipo_rol
                );

                //Creamos la sesión del usuario
                $request->session()->put('key', $usuario->cedula);
                $request->session()->put('rol', $rol->tipo_rol);
                $request->session()->put('data', $data);
                $request->session()->put('disciplinas',$disciplinas);

                return View::make('profile', $data);
            }
            else{
                // Si no existe el usuario o la contraseña es incorrecta
                Session::flash('message-error', 'Datos incorrectos');
                return Redirect::to('login');
            }
    }


    public function actualizarUsuario(Request $request){
         try{

            DB::table('USUARIO')
                ->where('USUARIO.cedula', '=', $request->cedula)
                ->update([
                    'USUARIO.cedula' => $request->cedula,
                    'USUARIO.primer_nombre' => $request->primer_nombre,
                    'USUARIO.primer_apellido' => $request->primer_apellido,
                    'USUARIO.fk_rol' =>$request->rol,
                    'USUARIO.correo' => $request->correo,
                    'USUARIO.sexo' =>  $request->sexo
                ]);

             $existeUsuario = DB::table('USU_EQUI_UNI')->select('*')
             ->where('fk_usuario','=',$request['cedula'])->first();   

             if ($existeUsuario!= null) {

                    DB::table('USU_EQUI_UNI')->where('fk_usuario','=',$request->cedula)
                    ->update(['fk_universidad'=>$request->id_universidad]);
                 # code...
             } else{

                DB::table('USU_EQUI_UNI')->insert([
                        'fk_usuario' => $request['cedula'],
                        'fk_universidad' => $request['id_universidad']
                    ]);
            }

                 

            Session::flash('message', 'Se ha actualizado con éxito');
        }catch (Exception $e){
            Session::flash('message-error', 'No se pudo actualizar');
        }
        return Redirect::to('manageUsers');

    }


    public function eliminarUsuario($cedula){
        try{
            DB::table('USUARIO')->where('cedula', $cedula)->delete();
            Session::flash('message', 'Usuario eliminado satisfactoriamente');
        }catch (Exception $e){
            Session::flash('message-error', 'No se pudo eliminar al usuario');
        }
        return Redirect::to('manageUsers');
    }

    public function cerrarSesion(){

        if (session()->has('key')){
            session()->flush();
            Session::flash('message', 'Ha cerrado sesión exitosamente');
        }
        return Redirect::to('/');
    }

 public function uploadRegistrationPlayer(Request $request){

         try{
            //Obtiene el nombre de los archivos (imágenes)
            $archivoConstancia = $request->file('Constancia');
            $nombre_constancia = $request->file('Constancia')->getClientOriginalName();
            $key =  $request['cedula']."/". "ConstanciaEstudio.pdf";

            DB::update('update USUARIO set Constancia = ? where cedula = ?',['S',$request['cedula']]);


            try{
                //Guardamos las imágenes en disco local
                \Storage::disk('images')->put($key,file_get_contents($archivoConstancia, FILE_USE_INCLUDE_PATH));
               
            }catch(Exception $e){
                Session::flash('message-error', 'El archivo excede el tamaño máximo');
                return Redirect::to('uploadRegistration');
            }

            }catch (Exception $e){
            Session::flash('message-error', 'Hubo un problema. No se pudo registrar');
            if($request->session()->get('rol') == 'A' || $request->session()->get('rol') == 'D')
              return Redirect::to('uploadRegistration');
            }   
        Session::flash('message', 'Constancia agregada exitosamente');    
        return Redirect::to('managePlayers');
    }


    public function cambiarPassword(Request $request){
        $id_pregunta = $request->id_pregunta;
        $respuesta = $request->respuesta_secreta;
        $cedula = $request->cedula;
        $nuevoPassword = $request->password;

        //Leemos la respuesta secreta del usuario
        $respuestaBD = DB::table('USUARIO_PREGUNTA')
                                ->select('respuesta')
                                ->where([
                                    ['fk_usuario','=',$cedula],
                                    ['fk_pregunta','=',$id_pregunta]
                                ])
                                ->first();

        if ($respuesta == $respuestaBD->respuesta) {
            $nuevoPasswordCifrado = password_hash($nuevoPassword, PASSWORD_DEFAULT);
            DB::update('update USUARIO set password = ? where cedula = ?', [$nuevoPasswordCifrado, $cedula]);
            Session::flash('message', 'Su contraseña ha sido modificada exitosamente');
            return Redirect::to('/');
        }
        else{
            Session::flash('message-error', 'Respuesta incorrecta');
            return Redirect::to('/');
        }
    }

    function generarPasswordAleatorio($longitud) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++)
            $key .= $pattern{rand(0,$max)};
        return $key;
    }

}
