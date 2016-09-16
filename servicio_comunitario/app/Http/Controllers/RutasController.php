<?php

namespace servicio_comunitario\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use servicio_comunitario\Http\Requests;

class RutasController extends Controller
{
    public function getAdminPage(){
        return view('admin');
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
}
