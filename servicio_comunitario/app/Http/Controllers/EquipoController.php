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
                'nombre' => $request->nombre,
                'fk_disciplina' => $idDisciplina
            ]);

            $idEquipo = DB::table('EQUIPO')->select('*')->where('nombre','=', $request->nombre)->first();

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


    public function eliminarEquipo($id){

    }
}
