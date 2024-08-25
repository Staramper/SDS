<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\VisitaController;
use App\Http\Controllers\DispController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware(['auth', 'role:root'])->namespace('App\Http\Controllers')->group( function ()
// {
// });

Route::get('/nips', [EmployeeController::class, 'nips'])->name('nips');
Route::put('/editar_emp/{id}', [EmployeeController::class, 'updateRFID'])->name('editar_emp');

// Administracion
Route::middleware(['auth', 'role:admin'])->namespace('App\Http\Controllers')->group( function ()
{
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/listar_usuarios', [UserController::class, 'listar'])->name('listar_usuarios');
    Route::post('/crear_usuarios', [UserController::class, 'store'])->name('crear_usuarios');
    Route::put('/editar_usuarios/{id}', [UserController::class, 'update'])->name('editar_usuarios');
    Route::delete('/eliminar_usuarios/{id}', [UserController::class, 'destroy'])->name('eliminar_usuarios');

    Route::get('/empleados', [EmployeeController::class, 'index'])->name('empleados');
    Route::get('/listar_empleados', [EmployeeController::class, 'listar'])->name('listar_empleados');
    Route::post('/crear_empleados', [EmployeeController::class, 'store'])->name('crear_empleados');
    Route::put('/editar_empleados/{id}', [EmployeeController::class, 'update'])->name('editar_empleados');
    Route::delete('/eliminar_empleados/{id}', [EmployeeController::class, 'destroy'])->name('eliminar_empleados');


    Route::get('/listar_disps', [DispController::class, 'listar'])->name('listar_disps');

    Route::get('/disp', [App\Http\Controllers\DispController::class, 'index'])->name('disp');
    Route::post('/disp_key', [App\Http\Controllers\DispController::class, 'store'])->name('disp_key');
    Route::put('/editar_disp/{id}', [App\Http\Controllers\DispController::class, 'update'])->name('editar_disp');

    Route::get('/datos', [VisitaController::class, 'listar'])->name('datos');

    Route::get('/grafico1', [HomeController::class, 'grafico1'])->name('grafico1');
    Route::get('/grafico2', [HomeController::class, 'grafico2'])->name('grafico2');

    // Route::get('/show_user/{id}', [UserController::class, 'show'])->name('show_user');

    // Route::view('/adminUser', 'adminUser')->name('adminUser');

    // Route::view('/producto', 'producto')->name('producto');
});
