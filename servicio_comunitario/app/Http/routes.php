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
        return view('index');
    },
    'as' => 'index'
]);

//Lecturas de Formularios ------------------------------------------------------------------------

//Registro

//Login
Route::post('login','UsuarioController@validarUsuario');
//Logout
Route::get('logout',['uses'=>'UsuarioController@cerrarSesion', 'as' =>'logout']);

//Enrutamiento entre páginas, a través de controllers ---------------------------------------
Route::get('register',['uses'=>'RutasController@getRegisterPage', 'as'=>'register']);
Route::get('recupera',['uses'=>'RutasController@getRecuperaPage', 'as'=>'recupera']);
Route::get('login',['uses'=>'RutasController@getLoginPage', 'as'=>'login']);
Route::get('calendar',['uses'=>'RutasController@getCalendarPage', 'as'=>'calendar']);
Route::get('stats',['uses'=>'RutasController@getStatsPage', 'as'=>'stats']);
Route::get('tables',['uses'=>'RutasController@getTablesPage', 'as'=>'tables']);
Route::get('buttons',['uses'=>'RutasController@getButtonsPage', 'as'=>'buttons']);
Route::get('editors',['uses'=>'RutasController@getEditorsPage', 'as'=>'editors']);
Route::get('forms',['uses'=>'RutasController@getFormsPage', 'as'=>'forms']);

//Rutas dependiendo del usuario--------------------------------------------------------
Route::get('profile',['uses'=>'RutasController@getProfilePage', 'as' =>'profile']);
Route::get('admin',['uses'=>'RutasController@getAdminPage', 'as'=>'admin']);
Route::get('director',['uses'=>'RutasController@getDirectorPage', 'as'=>'director']);

//Rutas de los CRUD------------------------------------------------------------------------
//pagina crear usuario
Route::get('createUser', ['uses' => 'RutasController@getCreateUser', 'as' => 'createUser']);
//pagina editar usuarios
Route::get('manageUsers', ['uses' => 'RutasController@getManageUsers', 'as' => 'manageUsers']);
//pagina detalle usuario
Route::get('detailUser/{cedula}', ['uses' => 'RutasController@getDetailUser', 'as' => 'detailUser']);
//pagina crear universidad
Route::get('createUniversity', ['uses' => 'RutasController@getCreateUniversity', 'as' => 'createUniversity']);
//pagina editar universidades
Route::get('manageUniversities', ['uses' => 'RutasController@getManageUniversities', 'as' => 'manageUniversities']);
//pagina detalle universidad
Route::get('detailUniv/{id_universidad}', ['uses' => 'RutasController@getDetailUniv', 'as' => 'detailUniv']);
//pagina crear equipo
Route::get('createTeam', ['uses' => 'RutasController@getCreateTeam', 'as' => 'createTeam']);
//pagina editar equipos
Route::get('manageTeams', ['uses' => 'RutasController@getManageTeams', 'as' => 'manageTeams']);
//pagina detalle equipo
Route::get('detailTeam/{id_universidad}', ['uses' => 'RutasController@getDetailTeam', 'as' => 'detailTeam']);
//pagina inscripcion equipo
Route::get('registrationTeam', ['uses' => 'RutasController@getRegistrationTeam', 'as' => 'registrationTeam']);
//pagina de detalle equipo director
Route::get('manageTeamsD',['uses'=> 'RutasController@getManageTeamsDirector','as'=> 'manageTeamsD']);


//CRUD----------------------------------------------------------------------------------------------
//crear usuario
Route::post('register', ['uses' => 'UsuarioController@registrarUsuario', 'as' => 'register']);
//actualizar usuario
Route::post('updateUser', ['uses' => 'UsuarioController@actualizarUsuario', 'as' => 'updateUser']);
//eliminar usuario
Route::get('deleteUser/{cedula}', ['uses' => 'UsuarioController@eliminarUsuario', 'as' => 'deleteUser']);

//crear universidad
Route::post('createUniversity', ['uses' => 'UniversidadController@crearUniversidad', 'as' => 'createUniversity']);
//actualizar universidad
Route::post('updateUniv', ['uses' => 'UniversidadController@actualizarUniversidad', 'as' => 'updateUniv']);
//eliminar universidad
Route::get('deleteUniv/{id_universidad}', ['uses' => 'UniversidadController@eliminarUniversidad', 'as' => 'deleteUniv']);

//crear equipo
Route::post('createTeam', ['uses' => 'EquipoController@crearEquipo', 'as' => 'createTeam']);

//actualizar equipo
Route::post('updateTeam', ['uses' => 'EquipoController@actualizarEquipo', 'as' => 'updateTeam']);

//eliminar equipo
Route::get('deleteTeam/{id_equipo}', ['uses' => 'EquipoController@eliminarEquipo', 'as' => 'deleteTeam']);

//eliminar usuario de un equipo
Route::get('deleteUserFromTeam/{cedula_usuario}/{id_equipo}', ['uses' => 'EquipoController@eliminarUsuarioDeEquipo', 'as' => 'deleteUserFromTeam']);

//crear fecha limite de inscripcion
Route::post('registrationTeam', ['uses' => 'EquipoController@fijarFechaInscripcion', 'as' => 'registrationTeam']);

//generar pdf nomina
Route::get('pdf/{id_equipo}',['uses' => 'PdfController@nominaEquipo', 'as' => 'pdf']);

// atletas por disciplina 
Route::get('managePlayers', ['uses' => 'RutasController@getManagePlayers', 'as' => 'managePlayers']);

Route::get('managePlayers/{id_disciplina}', ['uses' => 'RutasController@getManagePlayers2', 'as' => 'managePl']);

//rutas de constancia de estudio

Route::get('uploadRegistration/{cedula}' , ['uses' => 'RutasController@getUserData', 'as' => 'uploadRegistration']);

Route::post('uploadRegistrationPlayer' , ['uses' => 'UsuarioController@uploadRegistrationPlayer', 'as' => 'uploadRegistrationPlayer']);

Route::get('viewRegistration/{cedula}' , ['uses' => 'PdfController@viewRegistrationData', 'as' => 'viewRegistration']);

Route::get('deleteRegistration/{cedula}' , ['uses' => 'PdfController@deleteRegistrationData', 'as' => 'deleteRegistration']);


//Recupera contraseña

Route::post('recuperaVerifica',['uses'=>'RutasController@getRecuperaVerificaPage', 'as'=>'recuperaVerifica']);

Route::post('cambiarClave',['uses'=>'UsuarioController@cambiarPassword', 'as'=>'cambiarClave']);
