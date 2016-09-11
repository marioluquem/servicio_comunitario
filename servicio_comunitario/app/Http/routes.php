<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Enrutamiento al index --------------------------------------------------------------------------
Route::get('/', [
    'uses' => function(){
        return view("index");
    },
    'as' => 'index'
]);

//Lecturas de Formularios ------------------------------------------------------------------------

//Registro
Route::post('/usuario/registrar', 'UsuarioController@registrarUsuario');
//Login
Route::post('/usuario/login','UsuarioController@validarUsuario');

//Logout
Route::get('logout',['uses'=>'UsuarioController@cerrarSesion', 'as' =>'logout']);

//Enrutamiento entre páginas, a través de controllers ---------------------------------------
Route::get('registro',['uses'=>'RutasController@getRegisterPage', 'as'=>'registro']);
Route::get('login',['uses'=>'RutasController@getLoginPage', 'as'=>'login']);
Route::get('calendar',['uses'=>'RutasController@getCalendarPage', 'as'=>'calendar']);
Route::get('stats',['uses'=>'RutasController@getStatsPage', 'as'=>'stats']);
Route::get('tables',['uses'=>'RutasController@getTablesPage', 'as'=>'tables']);
Route::get('buttons',['uses'=>'RutasController@getButtonsPage', 'as'=>'buttons']);
Route::get('editors',['uses'=>'RutasController@getEditorsPage', 'as'=>'editors']);
Route::get('forms',['uses'=>'RutasController@getFormsPage', 'as'=>'forms']);

//Rutas que necesitan autentificación--------------------------------------------------------
//Route::get('profile.php',['middleware'=>'UsuarioController@validarUsuario', 'uses'=>'RutasController@getProfilePage']);
Route::get('profile',['uses'=>'RutasController@getProfilePage', 'as' =>'profile']);
Route::get('admin',['uses'=>'RutasController@getAdminPage', 'as'=>'admin']);
Route::get('director',['uses'=>'RutasController@getDirectorPage', 'as'=>'director']);

