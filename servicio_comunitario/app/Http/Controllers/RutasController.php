<?php

namespace servicio_comunitario\Http\Controllers;

use Illuminate\Http\Request;

use servicio_comunitario\Http\Requests;

class RutasController extends Controller
{
    public function getAdminPage(){
        return view('admin');
    }
    public function getProfilePage(){
        return view('profile');
    }
    public function getDirectorPage(){
        return view('director');
    }
    public function getLoginPage(){
        return view('/usuario/login');
    }
    public function getRegisterPage(){
        return view('/usuario/registro');
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
}
