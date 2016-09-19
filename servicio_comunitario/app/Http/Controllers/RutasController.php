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
        return view('registro');
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
        return view('userCRUD/createUser');
    }

    public function getDetailUser($cedula){

        if ($cedula != null){
            $user = DB::table('USUARIO')->select('*')->where('cedula', $cedula)->get();
            return View::make('userCRUD/detailUser', array('data' => $user));
        }
    }

    public function getManageUsers(){
        $users = DB::table('USUARIO')->select('*')->get();
        return View::make('userCRUD/manageUsers', array('data' =>$users));
    }


}
