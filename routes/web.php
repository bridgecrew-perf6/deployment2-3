<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\templateController;
use Auth\VerificationController;
use Illuminate\Support\Facades\Auth;

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



//DESPLIEGUES


//despliegues
Route::resource('despliegues','App\Http\Controllers\DespliegueController')->middleware('auth','example');
Route::get('notificacion','App\Http\Controllers\DespliegueController@nd')->middleware('auth','example');
Route::delete('/despliegues/{despliegue}/delete',[App\Http\Controllers\DespliegueController::class,'destroy'])->name('despliegues.delete')->middleware('auth','example');
Route::get('markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAsRead');
//capas
Route::resource('capas','App\Http\Controllers\CapaController')->middleware('auth')->middleware('auth','example');
Route::delete('/capas/{capa}/delete',[App\Http\Controllers\CapaController::class,'destroy'])->name('capas.delete')->middleware('auth')->middleware('auth','example');


//ambientes
Route::resource('ambientes','App\Http\Controllers\AmbienteController')->middleware('auth')->middleware('auth','example');
Route::delete('/ambientes/{ambiente}/delete',[App\Http\Controllers\AmbienteController::class,'destroy'])->name('ambientes.delete')->middleware('auth')->middleware('auth','example');

//desarrolladores
Route::resource('desarrolladores','App\Http\Controllers\DesarrolladorController')->middleware('auth','example');
Route::delete('/desarrolladores/{desarolladore}/delete',[App\Http\Controllers\DesarrolladorController::class,'destroy'])->name('desarrolladores.delete')->middleware('auth','example');

//devops
Route::resource('devops','App\Http\Controllers\DevopsController')->middleware('auth','example');
Route::delete('/devops/{devop}/delete',[App\Http\Controllers\DevopsController::class,'destroy'])->name('devops.delete')->middleware('auth','example');

//Proyecto
Route::resource('proyectos','App\Http\Controllers\ProyectoController')->middleware('auth','example');
Route::delete('/proyectos/{proyecto}/delete',[App\Http\Controllers\ProyectoController::class,'destroy'])->name('proyectos.delete')->middleware('auth','example');

//Rama
Route::resource('ramas','App\Http\Controllers\RamaController')->middleware('auth','example');
Route::delete('/ramas/{rama}/delete',[App\Http\Controllers\RamaController::class,'destroy'])->name('ramas.delete')->middleware('auth','example');

//servidor
Route::resource('servidores','App\Http\Controllers\ServidorController')->middleware('auth','example');
Route::delete('/servidores/{servidore}/delete',[App\Http\Controllers\ServidorController::class,'destroy'])->name('servidores.delete')->middleware('auth','example');




//index
Route::resource('home','App\Http\Controllers\HomeController')->middleware('auth','example')->middleware('auth', 'is_verify_email');

//informe pdf
Route::get('pdf', 'App\Http\Controllers\PDFController@index')->name('pdf.crear')->middleware('auth','example');
Route::post('apdf', 'App\Http\Controllers\PDFController@informe')->name('pdf.informe')->middleware('auth','example');

//informe acta pdf
Route::get('acta/{act}', 'App\Http\Controllers\PDFController@acta')->name('acta.informe')->middleware('auth','example');

//informe paz y salvo pdf
Route::get('paz/{pa}', 'App\Http\Controllers\PDFController@paz')->name('paz.informe')->middleware('auth','example');




//informe excel
Route::get('xlsx', 'App\Http\Controllers\ExcelController@index')->name('excel.crear')->middleware('auth','example');
Route::post('excel', 'App\Http\Controllers\ExcelController@DespExport')->name('excel.informe')->middleware('auth','example');


//login
Route::get('login', 'App\Http\Controllers\Auth\LoginController@mostrarLogin')->name('login.index');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout.login');

//Profile
Route::get('perfi/{perf}', 'App\Http\Controllers\ProfileController@mostrarperfil')->name('profile.index')->middleware('auth','example');
Route::get('perfil/{perfi}/edit', 'App\Http\Controllers\ProfileController@editarperfil')->middleware('auth','example');
Route::put('image/{perfi}', 'App\Http\Controllers\ProfileController@updateimg')->middleware('auth','example');
Route::put('perfil/{perfi}', 'App\Http\Controllers\ProfileController@updateperfil')->middleware('auth','example');
Route::put('password/{perfi}', 'App\Http\Controllers\ProfileController@passwordperfil')->middleware('auth','example');


//registro de usuarios
Route::get('register', 'App\Http\Controllers\RegistroController@create')->name('register.index');
Route::post('register', 'App\Http\Controllers\RegistroController@store')->name('register.store');
Route::get('validate','App\Http\Controllers\RegistroController@validateuseremail');

//Verificación de email
Route::get('account/verify/{token}',[App\Http\Controllers\RegistroController::class, 'verifyAccount'])->name('user.verify'); 



//INVENTARIO--USUARIOS
Route::resource('inventarios','App\Http\Controllers\InventarioController')->middleware('auth','example');
Route::get('crearin/{creari}/create','App\Http\Controllers\InventarioController@crear')->middleware('auth','example')->name('creari.index');
//INVENTARIO--EQUIPOS
Route::post('creares','App\Http\Controllers\InventarioController@almacenar')->middleware('auth','example')->name('creares.store');
Route::delete('/inventarios/{inventario}/delete',[App\Http\Controllers\InventarioController::class,'destroy'])->name('inventarios.delete')->middleware('auth','example');
//INVENTARIO--OBSERVACIONES
Route::get('observer/{observe}','App\Http\Controllers\InventarioController@mostrarobs')->middleware('auth','example')->name('observe.show');
Route::get('observer/{observe}/edit','App\Http\Controllers\InventarioController@editareq')->middleware('auth','example')->name('eq.edit');
Route::post('observer/{observe}','App\Http\Controllers\InventarioController@actualizareq')->middleware('auth','example')->name('eq.update');
Route::delete('/observer/{observe}/delete',[App\Http\Controllers\InventarioController::class,'eliminar'])->name('eq.delete')->middleware('auth','example');
Route::get('observer/{observe}/enable', 'App\Http\Controllers\InventarioController@enable')->middleware('auth','example');
//INVENTARIO--MAQUINA
Route::get('crearma/{crearm}/create','App\Http\Controllers\InventarioController@crearmaquina')->middleware('auth','example')->name('crearma.index');
Route::post('crearma','App\Http\Controllers\InventarioController@almacenarmaquina')->middleware('auth','example')->name('crearma.store');
Route::get('crearma/{crearm}/edit','App\Http\Controllers\InventarioController@editarmaquina')->middleware('auth','example')->name('crearma.edit');

Route::post('crearma/{crearm}','App\Http\Controllers\InventarioController@actualizarmaquina')->middleware('auth','example')->name('crearma.update');
Route::delete('/crearma/{crearm}/delete',[App\Http\Controllers\InventarioController::class,'eliminarmaquina'])->name('crearma.delete')->middleware('auth','example');




//EQUIPOS
Route::resource('pc','App\Http\Controllers\EquipoController')->middleware('auth','example');
Route::delete('/pc/{p}/delete',[App\Http\Controllers\EquipoController::class,'destroy'])->name('pc.delete')->middleware('auth','example');


//CARGOS
Route::resource('cargos','App\Http\Controllers\CargoController')->middleware('auth','example');
Route::delete('/cargos/{cargo}/delete',[App\Http\Controllers\CargoController::class,'destroy'])->name('cargos.delete')->middleware('auth','example');

//TEMA
Route::put('theme/{them}', 'App\Http\Controllers\HomeController@editartema')->middleware('auth','example');
Route::put('dark/{dar}', 'App\Http\Controllers\HomeController@darkmode')->middleware('auth','example');

