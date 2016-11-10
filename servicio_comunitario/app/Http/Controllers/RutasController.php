<?php

namespace servicio_comunitario\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

use servicio_comunitario\Http\Requests;

class RutasController extends Controller
{

    //--------------------------NORMAL PAGES----------------------------
    public function getAdminPage(){
        return view('CRUD');
    }
    public function getProfilePage(){
        if(session()->has('data')){
            $data = session('data');
            return View::make('profile', $data);
        }
        else{
            return view('profile');
        }
    }
    public function getDirectorPage(){
        return view('director');
    }
    public function getLoginPage(){
        return view('login');
    }
    public function getRegisterPage(){
        return view('register');
    }
    public function getCalendarPage(){
        return view('calendar');
    }
    public function getStatsPage(){
        return view('stats');
    }
    public function getTablesPage(){
        return view('tables');
    }
    public function getButtonsPage(){
        return view('buttons');
    }
    public function getEditorsPage(){
        return view('editors');
    }
    public function getFormsPage(){
        return view('forms');
    }

    //---------------------------CRUDS ADMIN-------------------------------

    public function getCreateUser(){
        return view('CRUD/createUser');
    }

    public function getDetailUser($cedula){

        if ($cedula != null){
            $user = DB::table('USUARIO')
                ->leftjoin('USU_EQUI_UNI', 'USU_EQUI_UNI.fk_usuario','=','USUARIO.cedula')
                ->leftjoin('UNIVERSIDAD','UNIVERSIDAD.id_universidad','=','USU_EQUI_UNI.fk_universidad')
                ->select('*')->where('cedula', $cedula)->get();
            $univ = DB::table('UNIVERSIDAD')->select('*')->get();    
            return View::make('CRUD/detailUser', array('data' => $user , 'univ' => $univ));
        }
    }

    public function getManageUsers(){

        $users = DB::table('USUARIO')
            ->join('ROL', 'USUARIO.fk_rol', '=', 'ROL.id_rol')
            ->leftjoin('USU_EQUI_UNI', 'USUARIO.cedula', '=', 'USU_EQUI_UNI.fk_usuario')
            ->leftjoin('UNIVERSIDAD', 'USU_EQUI_UNI.fk_universidad', '=', 'UNIVERSIDAD.id_universidad')
            ->select('*')->distinct()->get();

        return View::make('CRUD/manageUsers', array('data' =>$users));
    }


    public function getCreateUniversity(){
        return view('CRUD/createUniversity');
    }

    public function getManageUniversities(){
        $univ = DB::table('UNIVERSIDAD')
            ->select('*')->get();
        return View::make('CRUD/manageUniversities', array('data' =>$univ));
    }

    public function getDetailUniv($id_universidad){

        if ($id_universidad != null){
            $univ = DB::table('UNIVERSIDAD')->select('*')->where('id_universidad', $id_universidad)->get();
            return View::make('CRUD/detailUniv', array('data' => $univ));
        }
    }

    public function getCreateTeam(){
        $univ = DB::table('UNIVERSIDAD')->select('*')->get();
        $disciplinaNombre = DB::table('DISCIPLINA')->select('*')->get();
        $disciplinaModalidad = $disciplinaNombre;
        return View::make('CRUD/createTeam', array('univ' => $univ, 'disciplinaNombre' => $disciplinaNombre, 'disciplinaModalidad' => $disciplinaModalidad));
    }

    public function getManageTeams(){
        $equipos = DB::table('EQUIPO')
            ->join('USU_EQUI_UNI', 'EQUIPO.id_equipo', '=', 'USU_EQUI_UNI.fk_equipo')
            ->join('UNIVERSIDAD', 'USU_EQUI_UNI.fk_universidad', '=', 'UNIVERSIDAD.id_universidad')
            ->join('DISCIPLINA', 'EQUIPO.fk_disciplina', '=', 'DISCIPLINA.id_disciplina')
            ->select('*')
            ->where('USU_EQUI_UNI.fk_usuario', null)->distinct()->get();

        return View::make('CRUD/manageTeams', array('equipos' => $equipos));
    }

    public function getDetailTeam($id_equipo){


        $fecha_actual = Carbon::now();



        if ($id_equipo != null) {
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

            $jugadores = DB::table('USUARIO')
                ->join('USU_EQUI_UNI', 'USU_EQUI_UNI.fk_usuario', '=', 'USUARIO.cedula')
                ->join('EQUIPO', 'EQUIPO.id_equipo', '=', 'USU_EQUI_UNI.fk_equipo')
                ->join('UNIVERSIDAD', 'UNIVERSIDAD.id_universidad', '=', 'USU_EQUI_UNI.fk_universidad')
                ->select('*')
                ->where('EQUIPO.id_equipo', $id_equipo)
                ->distinct()
                ->get();

            $disciplinas = DB::table('DISCIPLINA')->select('*')->get();
            $universidades = DB::table('UNIVERSIDAD')->select('*')->get();
            $usus_equi_uni = DB::table('USU_EQUI_UNI')->select('*')->where('USU_EQUI_UNI.fk_equipo',$id_equipo)->get();
            $fecha_inscripcion_max = DB::table('INSCRIPCION')->select('INSCRIPCION.fecha_limite')->where('INSCRIPCION.id_inscripcion','=','1')->first();



            if ( $fecha_actual <= $fecha_inscripcion_max->fecha_limite) {

                return View::make('CRUD/detailTeam', array('equipo' => $equipo, 'jugadores' => $jugadores, 'disciplinas' => $disciplinas, 'universidades' => $universidades, 'usus_equi_uni' => $usus_equi_uni));
            }
            else{

                return View::make('CRUD/detailTeamsNoRegistration', array('equipo' => $equipo, 'jugadores' => $jugadores, 'disciplinas' => $disciplinas, 'universidades' => $universidades, 'usus_equi_uni' => $usus_equi_uni));
            }

        }
    }


    public function getRegistrationTeam(){


        return View::make('CRUD/registrationTeam');
    }

}
