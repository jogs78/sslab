<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//jefe
Route::get('/jefe','JefeController@homej')->name('homej');
//jefe->guardarEstadias
Route::post('guardarestadias', 'JefeController@guardarestadias')->name('guardarestadias');
//jefe->validarAsistencia
Route::post('jefe/validar-asistencia/{asistencia}', 'JefeController@validarAsistencia')->name('validarAsistencia');
//jefe->MostrarCalendario
Route::get('/jefe/{proyecto}', 'JefeController@mostrar_calendario')->name('mostrarcalendario');
//jefe->ModificarEstadias
Route::put('/jefe/{proyecto}', 'JefeController@modificar_estadia')->name('modificarestadia');
//jefe->MostrarEstadia
Route::get('/jefe/{proyecto}', 'JefeController@mostrar_estadia')->name('mostrarestadia');
//jefe->eliminarEstadias
Route::delete('/jefe/{project}', 'JefeController@eliminar_estadia')->name('eliminarestadia');
//jefe->guardarAsistencias
Route::post('guardarasistencias', 'JefeController@guardarasistencias')->name('guardarasistencias');
//jefe->guardarFaltas
Route::post('guardarfaltas', 'JefeController@guardarfaltas')->name('guardarfaltas');
//jefe->guardarHoExtras 
Route::post('guardarhextras', 'JefeController@guardarhextras')->name('guardarhextras');
 //jefe->guardarPermisos 
Route::post('guardarpermisos', 'JefeController@guardarpermisos')->name('guardarpermisos');
//jefe->MostrarEstadia
Route::get('/jefe/proyecto/{proyecto}/ver-horas', 'JefeController@verHoras')->name('verHoras');
//jefe->registrarIncidencia
Route::post('/jefe/proyecto/{proyecto}/registrar-incidencia', 'JefeController@registrarIncidencia')->name('registrarIncidencia');
//jefe->HorariosDeTodos
Route::get('/horarios', 'ProyectoController@mostrar_horarios')->name('verhorarios');





//Revisor
Route::get('/revisor','RevisorController@homev')->name('homev');
//revisor->MostrarCalendario
Route::get('/revisor/{proyecto}', 'RevisorController@mostrar_calendario')->name('mostrarcalendario');
//jefe->MostrarEstadia
Route::get('/revisor/proyecto/{proyecto}/ver-horas', 'RevisorController@verHoras')->name('verHoras');







//prestador
Route::get('/prestador','PrestadorController@homep')->name('homep');
//prestador->insertarAsistencia
Route::post('prestador/insertar-asistencia', 'PrestadorController@insertarAsistencia')->name('insertarAsistencia');
Route::get('/pdf','PrestadorController@pdf')->name('pdf');








//Responsable
Route::get('/responsable','ResponsableController@homes')->name('homes');
//responsable->MostrarCalendario
Route::get('/responsable/{proyecto}', 'ResponsableController@mostrar_calendario')->name('mostrarcalendario');
//responsable->MostrarEstadia
Route::get('/responsable/proyecto/{proyecto}/ver-horas', 'ResponsableController@verHoras')->name('verHoras');
//responsable->validarAsistencia
Route::post('responsable/validar-asistencia/{asistencia}', 'ResponsableController@validarAsistencia')->name('validarAsistencia');
//responsable->registrarIncidencia
Route::post('/responsable/proyecto/{proyecto}/registrar-incidencia', 'ResponsableController@registrarIncidencia')->name('registrarIncidencia');


//Proyecto
Route::get('/proyecto/{proyecto}/avance', 'ProyectoController@avanceToPDF')->name('avanceToPDF');
//Proyecto horario
Route::get('/proyecto/{proyecto}/horario', 'ProyectoController@avanceToPDF')->name('mostrarhorario');
//Proyecto horario
Route::get('/proyecto/{proyecto}/ver-horario', 'ProyectoController@mostrar_horario')->name('verhorario');