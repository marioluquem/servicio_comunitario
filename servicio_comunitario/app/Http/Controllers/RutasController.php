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
        $data = session('data');
        if ($cedula != null){
            $user = DB::table('USUARIO')
                ->leftjoin('USU_EQUI_UNI', 'USU_EQUI_UNI.fk_usuario','=','USUARIO.cedula')
                ->leftjoin('UNIVERSIDAD','UNIVERSIDAD.id_universidad','=','USU_EQUI_UNI.fk_universidad')
                ->select('*')->where('cedula', $cedula)->groupBy('cedula')->get();
            if ($data['rol']!='D'){        
                $univ = DB::table('UNIVERSIDAD')->select('*')->get(); 
            }    
            else{
            $iduniv = DB::table('USU_EQUI_UNI')->select('*')->
            where('USU_EQUI_UNI.fk_usuario','=',$data['cedula'])->first();
            $univ = DB::table('UNIVERSIDAD')->select('*')
            ->where('id_universidad','=',$iduniv->fk_universidad)->get();
            
            }  
             
            return View::make('CRUD/detailUser', array('data' => $user , 'univ' => $univ , 'rol'=>$data['rol']));
        }

    }

    public function getManageUsers(){
        $data = session('data');
        if ($data['rol']!='D'){

            $users = DB::table('USUARIO')
            ->join('ROL', 'USUARIO.fk_rol', '=', 'ROL.id_rol')
            ->leftjoin('USU_EQUI_UNI', 'USUARIO.cedula', '=', 'USU_EQUI_UNI.fk_usuario')
            ->leftjoin('UNIVERSIDAD', 'USU_EQUI_UNI.fk_universidad', '=', 'UNIVERSIDAD.id_universidad')
            ->select('*')->groupBy('cedula')->get();
        }
        else{

             $iduniv = DB::table('USU_EQUI_UNI')->select('*')->
            where('USU_EQUI_UNI.fk_usuario','=',$data['cedula'])->first();

            $users = DB::table('USUARIO')
            ->join('ROL', 'USUARIO.fk_rol', '=', 'ROL.id_rol')
            ->leftjoin('USU_EQUI_UNI', 'USUARIO.cedula', '=', 'USU_EQUI_UNI.fk_usuario')
            ->leftjoin('UNIVERSIDAD', 'USU_EQUI_UNI.fk_universidad', '=', 'UNIVERSIDAD.id_universidad')
            ->select('*')->where([['id_universidad','=',$iduniv->fk_universidad],['fk_rol','<>',1]])
            ->groupBy('cedula')->get();


        }

        return View::make('CRUD/manageUsers', array('data' =>$users , 'rol'=>$data['rol']));
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
        $data = session('data');
        if ($data['rol']!='D') {
            $univ = DB::table('UNIVERSIDAD')->select('*')->get();
        
        }
        else{
            $iduniv = DB::table('USU_EQUI_UNI')->select('*')->
            where('USU_EQUI_UNI.fk_usuario','=',$data['cedula'])->first();
            $univ = DB::table('UNIVERSIDAD')->select('*')
            ->where('id_universidad','=',$iduniv->fk_universidad)->get();
            
        }
        
        
        $disciplinaNombre = DB::table('DISCIPLINA')->select('*')->get();
        $disciplinaModalidad = $disciplinaNombre;
        return View::make('CRUD/createTeam', array('univ' => $univ, 'disciplinaNombre' => $disciplinaNombre, 'disciplinaModalidad' => $disciplinaModalidad, 'rol'=>$data['rol']));
    }

    public function getManageTeams(){

        $data = session('data');
        if ($data['rol']!='D') {
            $univ = DB::table('UNIVERSIDAD')->select('*')->get();
        
        

        $equipos = DB::table('EQUIPO')
            ->join('USU_EQUI_UNI', 'EQUIPO.id_equipo', '=', 'USU_EQUI_UNI.fk_equipo')
            ->join('UNIVERSIDAD', 'USU_EQUI_UNI.fk_universidad', '=', 'UNIVERSIDAD.id_universidad')
            ->join('DISCIPLINA', 'EQUIPO.fk_disciplina', '=', 'DISCIPLINA.id_disciplina')
            ->select('*')
            ->where('USU_EQUI_UNI.fk_usuario', null)->distinct()->get();   
        }
        
        else{

             $iduniv = DB::table('USU_EQUI_UNI')->select('*')->
            where('USU_EQUI_UNI.fk_usuario','=',$data['cedula'])->first();

            $equipos =  DB::select('select distinct(id_equipo) id_equipo, acronimo, id_universidad , id_disciplina , nombre_disciplina , nombre_equipo , genero_equipo  from equipo , usu_equi_uni , disciplina , universidad where fk_universidad = id_universidad and fk_equipo = id_equipo and id_disciplina = fk_disciplina and fk_universidad <> ?', [$iduniv->fk_universidad]);
           

        }     

       return View::make('CRUD/manageTeams', array('equipos' => $equipos , 'rol'=>$data['rol']));
        

        
    }


    public function getManageTeamsDirector(){
        if(session()->has('data')){
            $data = session('data');
        $univ = DB::table('USU_EQUI_UNI')->select('*')->
        where('USU_EQUI_UNI.fk_usuario','=',$data['cedula'])->first();

       $equipos = DB::table('EQUIPO')
            ->join('USU_EQUI_UNI', 'EQUIPO.id_equipo', '=', 'USU_EQUI_UNI.fk_equipo')
            ->join('DISCIPLINA', 'EQUIPO.fk_disciplina', '=', 'DISCIPLINA.id_disciplina')
            ->select('*')
            ->where('USU_EQUI_UNI.fk_universidad','=',$univ->fk_universidad)->groupBy('id_equipo')->get();
        

    }

    return View::make('CRUD/manageTeamsD',array('equipos' => $equipos));

    }

    public function getDetailTeam($id_equipo){


        $fecha_actual = Carbon::now();
        $data = session('data');



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

            if ($data['rol']!='D') {

                $universidades = DB::table('UNIVERSIDAD')->select('*')->get();
                # code...
            }
            else {

                $iduniv = DB::table('USU_EQUI_UNI')->select('*')
                ->where('USU_EQUI_UNI.fk_usuario','=',$data['cedula'])->first();

                $universidades =DB::table('UNIVERSIDAD')->select('*')
                ->where('UNIVERSIDAD.id_universidad','=',$iduniv->fk_universidad)->get();
            }
            
            $usus_equi_uni = DB::table('USU_EQUI_UNI')->select('*')->where('USU_EQUI_UNI.fk_equipo',$id_equipo)->get();
            $fecha_inscripcion_max = DB::table('INSCRIPCION')->select('INSCRIPCION.fecha_limite')->where('INSCRIPCION.id_inscripcion','=','1')->first();



            if ( $fecha_actual <= $fecha_inscripcion_max->fecha_limite) {

                return View::make('CRUD/detailTeam', array('equipo' => $equipo, 'jugadores' => $jugadores, 'disciplinas' => $disciplinas, 'universidades' => $universidades, 'usus_equi_uni' => $usus_equi_uni, 
                    'rol'=>$data['rol']));
            }
            else{

                return View::make('CRUD/detailTeamsNoRegistration', array('equipo' => $equipo, 'jugadores' => $jugadores, 'disciplinas' => $disciplinas, 'universidades' => $universidades, 'usus_equi_uni' => $usus_equi_uni , 'rol'=>$data['rol']));
            }

        }
    }


    public function getRegistrationTeam(){


        return View::make('CRUD/registrationTeam');
    }

}
