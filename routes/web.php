<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ControllerSistemas;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ControllerSistemas::class, 'inicio']);
Route::post('/buscarDonantesPublico', [ControllerSistemas::class, 'buscarDonantesPublico']);

Route::get('/dashboard', function () {
    return view('inicio/contenido_index');
})->middleware(['auth', 'verified'])->name('dashboard');
// Módulo Donantes
Route::get('/donantes',[ControllerSistemas::class, 'donantes'])->middleware(['auth', 'verified']);
Route::get('/nuevoRegistroDonante',[ControllerSistemas::class, 'nuevoRegistroDonante']);
Route::post('/guardarNuevoDonante',[ControllerSistemas::class, 'guardarNuevoDonante']);
Route::get('/eliminarDonante/{id}',[ControllerSistemas::class, 'eliminarDonante']);
Route::get('/estadoDonante/{id}',[ControllerSistemas::class, 'estadoDonante']);
Route::get('/editarRegistroDonante/{id}',[ControllerSistemas::class, 'editarRegistroDonante']);
Route::post('/guardarEditarDonante',[ControllerSistemas::class, 'guardarEditarDonante']);

// Módulo Búsqueda
Route::get('/buscarDonantes',[ControllerSistemas::class, 'buscarDonantes'])->middleware(['auth', 'verified']);
Route::post('/buscarPorSangre',[ControllerSistemas::class, 'buscarPorSangre']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Login para donantes
Route::get('/donante/login', [ControllerSistemas::class, 'loginDonante'])->name('donante.login');
Route::post('/donante/login', [ControllerSistemas::class, 'autenticarDonante']);
Route::get('/donante/logout', [ControllerSistemas::class, 'logoutDonante'])->name('donante.logout');
// Panel del donante
Route::get('/donante/panel', [ControllerSistemas::class, 'panelDonante'])->name('donante.panel');
Route::post('/donante/actualizar', [ControllerSistemas::class, 'actualizarDonante']);
Route::post('/donante/registrar-donacion', [ControllerSistemas::class, 'registrarDonacion']);

//accseso admin al panel de donante

// Acceso administrativo al panel del donante
Route::get('/donante/panel-admin/{id}', [ControllerSistemas::class, 'panelDonanteAdmin']);

// Registrar donación (solo para admins)
Route::post('/donante/registrar-donacion', [ControllerSistemas::class, 'registrarDonacion']);


require __DIR__.'/auth.php';