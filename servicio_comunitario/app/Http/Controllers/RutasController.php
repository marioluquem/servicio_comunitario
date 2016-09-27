<?php

namespace servicio_comunitario\Http\Controllers;

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
                ->select('*')->where('cedula', $cedula)->get();
            return View::make('CRUD/detailUser', array('data' => $user));
        }
    }

    public function getManageUsers(){

        //NO MUESTRA ADMINISTRADORES YA QUE LOS ADMIN NO TIENEN UNA UNIVERSIDAD DEFINIDA Y AQUI FILTRA POR UNIV
        $users = DB::table('USUARIO')
            ->join('ROL', 'USUARIO.fk_rol', '=', 'ROL.id')
            ->join('USU_EQUI_UNI', 'USUARIO.cedula', '=', 'USU_EQUI_UNI.fk_usuario')
            ->join('UNIVERSIDAD', 'USU_EQUI_UNI.fk_universidad', '=', 'UNIVERSIDAD.id')
            ->select('*')->get();
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

    public function getDetailUniv($id){

        if ($id != null){
            $univ = DB::table('UNIVERSIDAD')->select('*')->where('id', $id)->get();
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
            ->join('USU_EQUI_UNI', 'EQUIPO.id', '=', 'USU_EQUI_UNI.fk_equipo')
            ->join('UNIVERSIDAD', 'USU_EQUI_UNI.fk_universidad', '=', 'UNIVERSIDAD.id')
            ->join('DISCIPLINA', 'EQUIPO.fk_disciplina', '=', 'DISCIPLINA.id')
            ->select('*')->get();

        return View::make('CRUD/manageTeams', array('equipos' => $equipos));
    }

    public function getDetailTeam($id){

    }

}
