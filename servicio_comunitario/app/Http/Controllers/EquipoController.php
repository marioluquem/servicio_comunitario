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

            DB::table('EQUIPO')->insert([
                'nombre_equipo' => $request->nombre,
                'fk_disciplina' => $request->id_disciplina,
                'genero_equipo'=> $request->genero

            ]);

            $id_equipo = DB::table('EQUIPO')->select('*')->where('nombre_equipo','=', $request->nombre)->first();

            DB::table('USU_EQUI_UNI')->insert([
                'fk_equipo' => $id_equipo->id_equipo,
                'fk_universidad' => $request->id_universidad
            ]);
            Session::flash('message', 'Se creó el equipo exitosamente.');
        }catch (Exception $e){
            Session::flash('message-error', 'No se pudo crear el equipo.');
        }
        return Redirect::to('createTeam');
    }






    public function actualizarEquipo(Request $request){
        //Obtenemos el id de la Universidad-------------------------------------------------------------------------
        $id_universidad = $request->id_universidad;

        //Obtenemos el id del equipo--------------------------------------------------------------------------------
        $id_equipo = $request->id_equipo;


        //actualizamos los datos del equipo--------------------------------------------------------------------------------
        try{
            DB::table('EQUIPO')
                ->join('USU_EQUI_UNI','USU_EQUI_UNI.fk_equipo', '=','EQUIPO.id_equipo')
                ->join('UNIVERSIDAD','UNIVERSIDAD.id_universidad', '=','USU_EQUI_UNI.fk_universidad')
                ->join('DISCIPLINA','DISCIPLINA.id_disciplina', '=','EQUIPO.fk_disciplina')
                ->where('EQUIPO.id_equipo',  '=', $id_equipo)
                ->update([
                    'EQUIPO.nombre_equipo' => $request->nombre_equipo,
                    'EQUIPO.fk_disciplina' => $request->id_disciplina,
                    'EQUIPO.genero_equipo' => $request->genero_equipo
                ]);

            //actualizamos la universidad a la que está asociado
            DB::table('USU_EQUI_UNI')
                ->where('fk_equipo', '=', $id_equipo)
                ->update([
                    'fk_universidad' => $id_universidad
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
                        ['fk_equipo', '=', $id_equipo],
                        ['fk_universidad', '=', $id_universidad]
                    ])->get();

                if ($existeUsuario == null) { // si no existe ese usuario en el equipo

                    if ($request->rol_equipo1 == 'Entrenador') {

                        $poseeEntrenador = DB::table('USU_EQUI_UNI')->select('fk_usuario')
                            ->where([['fk_equipo', '=', $id_equipo],
                                ['rol_equipo', '=', $request->rol_equipo1]])
                            ->get();
                        if ($poseeEntrenador != null) {

                            Session::flash('message-error', 'El rol entrenador  ya esta asignado en el equipo');
                            return Redirect::to('manageTeams');
                        }

                    }
                    DB::table('USU_EQUI_UNI')->insert([
                        'fk_usuario' => $request->cedulaNuevoUsuario1,
                        'fk_equipo' => $id_equipo,
                        'fk_universidad' => $id_universidad,
                        'rol_equipo' => $request->rol_equipo1
                    ]);
                }else {
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
                        ['fk_equipo', '=', $id_equipo],
                        ['fk_universidad', '=', $id_universidad]
                    ])->get();
                if ($existeUsuario == null) {// si no existe ese usuario en el equipo

                    if ($request->rol_equipo2 == 'Entrenador') {

                        $poseeEntrenador = DB::table('USU_EQUI_UNI')->select('fk_usuario')
                            ->where([['fk_equipo', '=', $id_equipo],
                                ['rol_equipo', '=', $request->rol_equipo2]])
                            ->get();
                        if ($poseeEntrenador != null) {

                            Session::flash('message-error', 'El rol entrenador  ya esta asignado en el equipo');
                            return Redirect::to('manageTeams');
                        }

                    }

                    DB::table('USU_EQUI_UNI')
                        ->insert([
                            'fk_usuario' => $request->cedulaNuevoUsuario2,
                            'fk_equipo' => $id_equipo,
                            'fk_universidad' => $id_universidad,
                            'rol_equipo' => $request->rol_equipo2
                        ]);}
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
                        ['fk_equipo', '=', $id_equipo],
                        ['fk_universidad', '=', $id_universidad]
                    ])->get();

                if ($existeUsuario == null) {// si no existe ese usuario en el equipo

                    if ($request->rol_equipo3 == 'Entrenador') {

                        $poseeEntrenador = DB::table('USU_EQUI_UNI')->select('fk_usuario')
                            ->where([['fk_equipo', '=', $id_equipo],
                                ['rol_equipo', '=', $request->rol_equipo3]])
                            ->get();
                        if ($poseeEntrenador != null) {

                            Session::flash('message-error', 'El rol entrenador  ya esta asignado en el equipo');
                            return Redirect::to('manageTeams');
                        }

                    }

                    DB::table('USU_EQUI_UNI')
                        ->insert([
                            'fk_usuario' => $request->cedulaNuevoUsuario3,
                            'fk_equipo' => $id_equipo,
                            'fk_universidad' => $id_universidad,
                            'rol_equipo' => $request->rol_equipo3
                        ]);}
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
                        ['fk_equipo', '=', $id_equipo],
                        ['fk_universidad', '=', $id_universidad]
                    ])->get();

                if ($existeUsuario == null){// si no existe ese usuario en el equipo

                    if ($request->rol_equipo4 == 'Entrenador') {

                        $poseeEntrenador = DB::table('USU_EQUI_UNI')->select('fk_usuario')
                            ->where([['fk_equipo', '=', $id_equipo],
                                ['rol_equipo', '=', $request->rol_equipo4]])
                            ->get();
                        if ($poseeEntrenador != null) {

                            Session::flash('message-error', 'El rol entrenador  ya esta asignado en el equipo');
                            return Redirect::to('manageTeams');
                        }

                    }

                    DB::table('USU_EQUI_UNI')
                        ->insert([
                            'fk_usuario' => $request->cedulaNuevoUsuario4,
                            'fk_equipo' => $id_equipo,
                            'fk_universidad' => $id_universidad,
                            'rol_equipo' => $request->rol_equipo4
                        ]);}
                else {
                    Session::flash('message-error', 'El rol entrenador  ya esta asignado en el equipo');
                    return Redirect::to('manageTeams');
                }
            }
            if ($request->cedulaNuevoUsuario5 != ""){
                //verificamos que el usuario no exista ya en el equipo
                $existeUsuario = DB::table('USU_EQUI_UNI')
                    ->select('*')
                    ->where([
                        ['fk_usuario', '=', $request->cedulaNuevoUsuario5],
                        ['fk_equipo', '=', $id_equipo],
                        ['fk_universidad', '=', $id_universidad]
                    ])->get();

                if ($existeUsuario == null){ // si no existe ese usuario en el equipo

                    if ($request->rol_equipo5 == 'Entrenador') {

                        $poseeEntrenador = DB::table('USU_EQUI_UNI')->select('fk_usuario')
                            ->where([['fk_equipo', '=', $id_equipo],
                                ['rol_equipo', '=', $request->rol_equipo5]])
                            ->get();
                        if ($poseeEntrenador != null) {

                            Session::flash('message-error', 'El rol entrenador  ya esta asignado en el equipo');
                            return Redirect::to('manageTeams');
                        }

                    }

                    DB::table('USU_EQUI_UNI')
                        ->insert([
                            'fk_usuario' => $request->cedulaNuevoUsuario5,
                            'fk_equipo' => $id_equipo,
                            'fk_universidad' => $id_universidad,
                            'rol_equipo' => $request->rol_equipo5
                        ]);}
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
                        ['fk_equipo', '=', $id_equipo],
                        ['fk_universidad', '=', $id_universidad],
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
                        ['fk_equipo', '=', $id_equipo],
                        ['fk_universidad', '=', $id_universidad]
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


    public function eliminarUsuarioDeEquipo($cedula_usuario, $id_equipo){

        try{

           DB::table('USU_EQUI_UNI')
               ->where([
                   ['fk_usuario','=', $cedula_usuario],
                   ['fk_equipo','=',$id_equipo]
               ])
               ->delete();
           Session::flash('message', 'Se elimino satisfactoriamente');
       }catch (Exception $e){
           Session::flash('message-error', 'No se pudo eliminar');
       }
        return Redirect::to('manageTeams');
    }

    public function eliminarEquipo($id_equipo){
        $data = session('data');
        try{
            DB::table('EQUIPO')->where('id_equipo', '=', $id_equipo)->delete();
            DB::table('USU_EQUI_UNI')->where('fk_equipo', '=', $id_equipo)->delete();
            Session::flash('message', 'Equipo eliminado satisfactoriamente');
        }catch (Exception $e){
            Session::flash('message-error', 'No se pudo eliminar el Equipo');
        }

        if ($data['rol']!='D') {
            return Redirect::to('manageTeams');
        }
        return Redirect::to('manageTeamsD');
    }


    public function fijarFechaInscripcion(Request $request){

        $date = date("Y-m-d", strtotime($request['fecha_limite_inscripcion']));

        try{

            DB::table('INSCRIPCION')->where('id_inscripcion','=','1')
                ->update(['fecha_limite'=> $date]);





             Session::flash('message', 'Se establecio la fecha exitosamente.');
        }catch (Exception $e){
             Session::flash('message-error', 'No se puede establecer limite de inscripción');
        }
        return Redirect::to('/');
    }



}
