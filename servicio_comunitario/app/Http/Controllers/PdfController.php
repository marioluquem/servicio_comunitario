<?php

namespace servicio_comunitario\Http\Controllers;

use Illuminate\Http\Request;

use servicio_comunitario\Http\Requests;
use Illuminate\Support\Facades\DB;
use PDF;
use App;



class PdfController extends Controller
{

    public function nominaEquipo($id_equipo){


        $imageRoute = 'C:\Users\Mario\Documents\servicio_comunitario_git\servicio_comunitario\public/images';
        $dataEquipo = $this->obtenerDatosEquipo($id_equipo);
        $dataJugadores = $this->obtenerDatosJugadores($id_equipo);
        $usus_equi_uni = DB::table('USU_EQUI_UNI')->select('*')->where('USU_EQUI_UNI.fk_equipo',$id_equipo)->get();

        $view = \View::make('pdf/rosterTeam',compact('dataEquipo','dataJugadores','usus_equi_uni','imageRoute'))->render();
        $pdf = \App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        return $pdf->download('plantilla.pdf');

    }


    public function obtenerDatosEquipo($id_equipo)
    {



            $equipo = DB::table('EQUIPO')
                ->join('USU_EQUI_UNI', 'USU_EQUI_UNI.fk_equipo', '=', 'EQUIPO.id_equipo')
                ->join('UNIVERSIDAD', 'UNIVERSIDAD.id_universidad', '=', 'USU_EQUI_UNI.fk_universidad')
                ->join('DISCIPLINA', 'EQUIPO.fk_disciplina', '=', 'DISCIPLINA.id_disciplina')
                ->select('*')
                ->where([
                    ['EQUIPO.id_equipo', $id_equipo],
                    ['USU_EQUI_UNI.fk_usuario', null]
                ])
                ->distinct()
                ->get();


        return $equipo;

    }


    public function obtenerDatosJugadores($id_equipo){

        $jugadores = DB::table('USUARIO')
            ->join('USU_EQUI_UNI', 'USU_EQUI_UNI.fk_usuario', '=', 'USUARIO.cedula')
            ->join('EQUIPO', 'EQUIPO.id_equipo', '=', 'USU_EQUI_UNI.fk_equipo')
            ->join('UNIVERSIDAD', 'UNIVERSIDAD.id_universidad', '=', 'USU_EQUI_UNI.fk_universidad')
            ->select('*')
            ->where('EQUIPO.id_equipo', $id_equipo)
            ->distinct()
            ->get();

        return $jugadores;

    }
}
