<?php

namespace servicio_comunitario\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use League\Flysystem\Exception;
use servicio_comunitario\Http\Requests\LoginRequest;
use servicio_comunitario\Http\Requests;
use Illuminate\Support\Facades\DB;
use PDF;
use App;
use Storage;



class PdfController extends Controller
{

    public function nominaEquipo($id_equipo){


        $imageRoute = 'images';
        $dataEquipo = $this->obtenerDatosEquipo($id_equipo);
        $dataJugadores = $this->obtenerDatosJugadores($id_equipo);
        $dataCuerpoTecnico = $this->obtenerDatosCuerpoTecnico($id_equipo);
        $usus_equi_uni = DB::table('USU_EQUI_UNI')->select('*')->where('USU_EQUI_UNI.fk_equipo',$id_equipo)->get();
        

        $view = \View::make('pdf/rosterTeam',compact('dataEquipo','dataJugadores','usus_equi_uni','imageRoute','dataCuerpoTecnico'))->render();
        $pdf = \App::make('dompdf.wrapper');
        
        $pdf->setPaper("L","portrait");
        $pdf->loadHTML($view);
       
       
        return  $pdf->download('plantilla.pdf');

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
            ->where([
                ['EQUIPO.id_equipo', $id_equipo],
                ['USU_EQUI_UNI.rol_equipo', '=' ,'Jugador']
            ])
            ->distinct()
            ->get();

        return $jugadores;

    }


     public function obtenerDatosCuerpoTecnico($id_equipo){

        $jugadores = DB::table('USUARIO')
            ->join('USU_EQUI_UNI', 'USU_EQUI_UNI.fk_usuario', '=', 'USUARIO.cedula')
            ->join('EQUIPO', 'EQUIPO.id_equipo', '=', 'USU_EQUI_UNI.fk_equipo')
            ->join('UNIVERSIDAD', 'UNIVERSIDAD.id_universidad', '=', 'USU_EQUI_UNI.fk_universidad')
            ->select('*')
            ->where([
                    ['USU_EQUI_UNI.fk_equipo', $id_equipo],
                    ['USU_EQUI_UNI.rol_equipo', '<>' ,'Jugador']
                ])
            ->distinct()
            ->get();

        return $jugadores;

    }


    public function viewRegistrationData ($cedula){
              
        return response()->file('images/'.$cedula.'/ConstanciaEstudio.pdf');

    }


      public function deleteRegistrationData($cedula){



     try {

         DB::update('update USUARIO set constancia = ? where cedula =? ',['N',$cedula]);

        $path = public_path().'/images/'.$cedula.'/ConstanciaEstudio.pdf';
        
        unlink($path); 


     }catch(Exception $e) {

        Session::flash('message-error', 'No se elimino el archivo');
        return Redirect::to('/');
     }
        Session::flash('message', 'Constancia eliminada'); 
       
        return Redirect::to('managePlayers');



    }

}
