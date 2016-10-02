<?php

namespace servicio_comunitario\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

use League\Flysystem\Exception;
use servicio_comunitario\Http\Requests;

class EquipoController extends Controller
{

    public function crearEquipo(Request $request){

        try{
            $idUniv = DB::table('UNIVERSIDAD')->select('*')->where('acronimo', '=', $request->universidad)->first();

            $idDisciplina = $request->disciplina;

            DB::table('EQUIPO')->insert([
                'nombre_equipo' => $request->nombre,
                'fk_disciplina' => $idDisciplina
            ]);

            $idEquipo = DB::table('EQUIPO')->select('*')->where('nombre_equipo','=', $request->nombre)->first();

            DB::table('USU_EQUI_UNI')->insert([
                'fk_equipo' => $idEquipo->id,
                'fk_universidad' => $idUniv->id
            ]);
            Session::flash('message', 'Se creó el equipo exitosamente.');
        }catch (Exception $e){
            Session::flash('message-error', 'No se pudo crear el equipo.');
        }
        return Redirect::to('createTeam');
    }






    public function actualizarEquipo(Request $request){
        //Obtenemos el id de la Universidad-------------------------------------------------------------------------
        $idUniv = DB::table('UNIVERSIDAD')->select('id')->where('acronimo', $request->acronimo)->first();

        //Obtenemos el id del equipo--------------------------------------------------------------------------------
        $idEquipo = DB::table('EQUIPO')->select('id')->where('nombre_equipo', $request->nombre_equipo)->first();

        //actualizamos los datos del equipo--------------------------------------------------------------------------------
        try{
            DB::table('EQUIPO')
                ->join('USU_EQUI_UNI','USU_EQUI_UNI.fk_equipo', '=','EQUIPO.id')
                ->join('UNIVERSIDAD','UNIVERSIDAD.id', '=','USU_EQUI_UNI.fk_universidad')
                ->join('DISCIPLINA','DISCIPLINA.id', '=','EQUIPO.fk_disciplina')
                ->where('EQUIPO.id',  '=', $idEquipo->id)
                ->update([
                    'EQUIPO.nombre_equipo' => $request->nombre_equipo,
                    'DISCIPLINA.nombre_disciplina' => $request->nombre_disciplina,
                    'DISCIPLINA.modalidad' => $request->modalidad,
                    'UNIVERSIDAD.acronimo' => $request->acronimo
                ]);
        }catch (Exception $e){
            Session::flash('message', 'No se pudo actualizar datos del equipo');
            return Redirect::to('manageTeams');
        }

        //insertamos los nuevos jugadores-------------------------------------------------------------------------------
            if ($request->cedulaNuevoUsuario1 != ""){
                //verificamos que el usuario no exista ya en el equipo
                $existeUsuario = DB::table('USU_EQUI_UNI')
                    ->select('*')
                    ->where([
                        ['fk_usuario', '=', $request->cedulaNuevoUsuario1],
                        ['fk_equipo', '=', $idEquipo->id],
                        ['fk_universidad', '=', $idUniv->id]
                    ])->get();

                if ($existeUsuario == null) // si no existe ese usuario en el equipo
                    DB::table('USU_EQUI_UNI')
                        ->insert([
                            'fk_usuario' => $request->cedulaNuevoUsuario1,
                            'fk_equipo' => $idEquipo->id,
                            'fk_universidad' => $idUniv->id
                        ]);
                else {
                    Session::flash('message-error', 'El usuario : ' . $request->cedulaNuevoUsuario1 . ' ya existe en el equipo');
                    return Redirect::to('manageTeams');
                }
            }
            if ($request->cedulaNuevoUsuario2 != ""){
                //verificamos que el usuario no exista ya en el equipo
                $existeUsuario = DB::table('USU_EQUI_UNI')
                    ->select('*')
                    ->where([
                        ['fk_usuario', '=', $request->cedulaNuevoUsuario2],
                        ['fk_equipo', '=', $idEquipo->id],
                        ['fk_universidad', '=', $idUniv->id]
                    ])->get();
                if ($existeUsuario == null) // si no existe ese usuario en el equipo
                    DB::table('USU_EQUI_UNI')
                        ->insert([
                            'fk_usuario' => $request->cedulaNuevoUsuario2,
                            'fk_equipo' => $idEquipo->id,
                            'fk_universidad' => $idUniv->id
                        ]);
                else {
                    Session::flash('message-error', 'El usuario : ' . $request->cedulaNuevoUsuario2 . ' ya existe en el equipo');
                    return Redirect::to('manageTeams');
                }
            }
            if ($request->cedulaNuevoUsuario3 != ""){
                //verificamos que el usuario no exista ya en el equipo
                $existeUsuario = DB::table('USU_EQUI_UNI')
                    ->select('*')
                    ->where([
                        ['fk_usuario', '=', $request->cedulaNuevoUsuario3],
                        ['fk_equipo', '=', $idEquipo->id],
                        ['fk_universidad', '=', $idUniv->id]
                    ])->get();

                if ($existeUsuario == null) // si no existe ese usuario en el equipo
                    DB::table('USU_EQUI_UNI')
                        ->insert([
                            'fk_usuario' => $request->cedulaNuevoUsuario3,
                            'fk_equipo' => $idEquipo->id,
                            'fk_universidad' => $idUniv->id
                        ]);
                else {
                    Session::flash('message-error', 'El usuario : ' . $request->cedulaNuevoUsuario3 . ' ya existe en el equipo');
                    return Redirect::to('manageTeams');
                }
            }
            if ($request->cedulaNuevoUsuario4 != ""){
                //verificamos que el usuario no exista ya en el equipo
                $existeUsuario = DB::table('USU_EQUI_UNI')
                    ->select('*')
                    ->where([
                        ['fk_usuario', '=', $request->cedulaNuevoUsuario4],
                        ['fk_equipo', '=', $idEquipo->id],
                        ['fk_universidad', '=', $idUniv->id]
                    ])->get();

                if ($existeUsuario == null) // si no existe ese usuario en el equipo
                    DB::table('USU_EQUI_UNI')
                        ->insert([
                            'fk_usuario' => $request->cedulaNuevoUsuario4,
                            'fk_equipo' => $idEquipo->id,
                            'fk_universidad' => $idUniv->id
                        ]);
                else {
                    Session::flash('message-error', 'El usuario : ' . $request->cedulaNuevoUsuario4 . ' ya existe en el equipo');
                    return Redirect::to('manageTeams');
                }
            }
            if ($request->cedulaNuevoUsuario5 != ""){
                //verificamos que el usuario no exista ya en el equipo
                $existeUsuario = DB::table('USU_EQUI_UNI')
                    ->select('*')
                    ->where([
                        ['fk_usuario', '=', $request->cedulaNuevoUsuario5],
                        ['fk_equipo', '=', $idEquipo->id],
                        ['fk_universidad', '=', $idUniv->id]
                    ])->get();

                if ($existeUsuario == null) // si no existe ese usuario en el equipo
                    DB::table('USU_EQUI_UNI')
                        ->insert([
                            'fk_usuario' => $request->cedulaNuevoUsuario5,
                            'fk_equipo' => $idEquipo->id,
                            'fk_universidad' => $idUniv->id
                        ]);
                else {
                    Session::flash('message-error', 'El usuario : ' . $request->cedulaNuevoUsuario5 . ' ya existe en el equipo');
                    return Redirect::to('manageTeams');
                }
            }
        //actualizamos la información del representante--------------------------------------------------------------------------------
        if ($request->representante != 0) {
            try {
                //reseteamos todos los boolean de representante de ese equipo a 0
                DB::table('USU_EQUI_UNI')
                    ->where([
                        ['fk_equipo', '=', $request->idEquipo],
                        ['fk_universidad', '=', $request->idUniv],
                        ['fk_usuario','!=', null]
                    ])
                    ->update([
                        'representante' => 0
                    ]);
//NO SE POR QUE NO ACTUALIZA LA INFORMACION DEL REPRESENTANTE-------------------- REVISAR--------------
                //asignamos el representante único
                DB::table('USU_EQUI_UNI')
                    ->where([
                        ['fk_usuario', '=', $request->representante],
                        ['fk_equipo', '=', $request->idEquipo],
                        ['fk_universidad', '=', $request->idUniv]
                    ])
                    ->update([
                            'representante' => 1
                        ]);

            } catch (Exception $e) {
                Session::flash('message-error', 'No se pudo actualizar representante');
                return Redirect::to('manageTeams');
            }
        }
        Session::flash('message','Se ha actualizado todo exitosamente');
        return Redirect::to('manageTeams');
    }


    public function eliminarUsuarioDeEquipo($idUser, $nombreEquipo){
        //Obtenemos el id del equipo
        $idEquipo = DB::table('EQUIPO')->select('id')->where('nombre_equipo', $nombreEquipo)->first();
        try{

           DB::table('USU_EQUI_UNI')
               ->where([
                   ['fk_usuario','=', $idUser],
                   ['fk_equipo','=',$idEquipo->id]
               ])
               ->delete();
           Session::flash('message', 'Se elimino satisfactoriamente');
       }catch (Exception $e){
           Session::flash('message-error', 'No se pudo eliminar');
       }
        return Redirect::to('manageTeams');
    }

    public function eliminarEquipo($id){

    }
}
