<?php

namespace servicio_comunitario\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use servicio_comunitario\Http\Requests\LoginRequest;

use servicio_comunitario\Http\Requests;

class UsuarioController extends Controller
{



// INSERTAR NUEVO USUARIO-------------------------------------------------------
    public function registrarUsuario(Request $request)
    {

        //Obtiene el nombre de los archivos (imágenes)
        $imageName = $request->file('foto');
        $nombre_foto = $imageName->getClientOriginalName();
        $key =  $request['cedula']."/". $nombre_foto;

        $archivoDNI = $request->file('dni');
        $nombre_dni = $archivoDNI->getClientOriginalName();
        $key2 =  $request['cedula']."/". $nombre_dni;


        //Guardamos las imágenes en disco local
        \Storage::disk('images')->put($key,file_get_contents($request->file('foto')));
        \Storage::disk('images')->put($key2,file_get_contents($request->file('dni')));

        //Cambiamos el formato de la fecha para adecuarlo a la BD
        $date = date("Y-m-d", strtotime($request['fecha_nacimiento']));


        //Verifica si la cédula existe en la BD
        $existeCedula = DB::table('USUARIO')->select('cedula')->where('cedula', $request['cedula'])->first();

       if ($existeCedula != null){
            Session::flash('message-error', 'La cédula ya está registrada en el Sistema');
            return Redirect::to('registro');
        }
        else{
            DB::table('USUARIO')->insert(
                [
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
                ]
            );

            Session::flash('message', 'Se ha registrado satisfactoriamente');
            return Redirect::to('/');
        }

    }


    //VALIDAR INICIO DE SESIÓN----------------------------------------------------

    public function validarUsuario(LoginRequest $request)
    {

        //Traemos el usuario de la BD
        $usuario = DB::table('USUARIO')->select('*')->where('cedula', '=', $request['cedula'])->first();

        //Creamos el path del que se leerán las imágenes
        $path = 'images/'.$usuario->cedula.'/';

        //Si el usuario existe y la contraseña introducida coincide
        if (($usuario != null) && (password_verify($request['password'], $usuario->password))) {

            //Obtenemos el ROL del usuario
            $rol = DB::table('ROL')
                        ->join('USUARIO', 'USUARIO.fk_rol', '=', 'ROL.id')
                        ->select('ROL.tipo')
                        ->where('USUARIO.cedula', '=', $request['cedula'])
                        ->first();

            //Arreglamos la data para regresarla
            $data =  array(

                'nombre_usuario' => $usuario->usuario,
                'primer_nombre' => $usuario->primer_nombre,
                'segundo_nombre' => $usuario->segundo_nombre,
                'primer_apellido' => $usuario->primer_apellido,
                'segundo_apellido' => $usuario->segundo_apellido,
                'correo' => $usuario->correo,
                'fecha_nacimiento' => $usuario->fecha_nacimiento,
                'sexo' => $usuario->sexo,
                'foto' => $path.$usuario->foto,
                'dni' => $path.$usuario->dni,
                'rol' => $rol->tipo
            );

            //Creamos la sesión del usuario
            $request->session()->put('key', $usuario->cedula);
            $request->session()->put('data', $data);

            return View::make('profile', $data);
        }
        else{ // Si no existe el usuario o la contraseña es incorrecta
            Session::flash('message-error', 'Datos incorrectos');
            return Redirect::to('login');
        }
    }


    public function cerrarSesion(){

        if (session()->has('key')){
            session()->flush();
            Session::flash('message', 'Ha cerrado sesión exitosamente');
        }
        return Redirect::to('/');
    }


}
