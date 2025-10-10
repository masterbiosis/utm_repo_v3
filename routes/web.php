<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\AsesorempresaController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\DirectortesiController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\LineaController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\SubdirectorController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Mail\MailtestMailable;
use App\Mail\MailTicMailable;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Test

Route::get('/tests', [TestController::class, 'index'])->name('tests.index');
//Route::get('/validar_alumno/{email}', [MailtestMailable::class, 'validar_alumno'])->name('email.validar_alumno');

//////////// EMAIL /////////////////////
Route::get('/validar_alumno/{alumno}', [MailtestMailable::class, 'validar_alumno'])->name('email.validar_alumno');
Route::get('/usuario_directortesis/{directortesi}', [MailTicMailable::class, 'usuarioDirectortesis'])->name('email.usuarioDirectortesis');

//Admin
Route::get('/asignar', [AdminController::class, 'asignar'])->name('admin.asignar');
Route::post('/asignardata', [AdminController::class, 'asignardata'])->name('admin.asignardata');


//Alumnos//
Route::resource('alumnos', AlumnoController::class);

//Carrera//
Route::resource('carreras', CarreraController::class);

//Programa educativo//
Route::resource('programas', ProgramaController::class);

//<<<<<<< HEAD
//Subdirector
Route::resource('subdirectors', SubdirectorController::class);

//Empresas//
Route::resource('empresas', EmpresaController::class);

//Director de Tesis//
Route::resource('directortesis', DirectortesiController::class);

//Ver estudianteas asignados
Route::get('directortesis/{directortesi}/asignados', [DirectortesiController::class, 'alumnosAsignados'])->name('directortesis.asignados');

//Director de Carrera//
Route::resource('directorcarreras', SubdirectorController::class);

//Asesor Empresa
Route::resource('asesorempresas', AsesorempresaController::class);

//Lineas//
Route::resource('lineas', LineaController::class);

//DOCUMENTOS//
Route::resource('documentos', DocumentoController::class);
