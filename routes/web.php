<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\iniciarSesionController;
use App\Http\Controllers\RegistrarUsuarioController;
use App\Http\Controllers\RecuperarPasswordController;
use App\Http\Controllers\UsuarioController;


Route::get('/', [HomeController::class, 'index'])->name('home');

// Ruta para la página de contacto
Route::get('/about', [AboutController::class, 'index'])->name('about');


Route::get('/productos', [ProductoController::class, 'index'])->name('productos');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productosDetalle');

Route::get('/registrarUsuario', [RegistrarUsuarioController::class, 'index'])->name('registrarUsuario');

Route::get('/recuperarPassword', [RecuperarPasswordController::class, 'index'])->name('recuperarPassword');

Route::get('login',[LoginController::class, 'showLoginForm'])->name('login');
Route::post('login',[LoginController::class, 'login']);
Route::post('logout',[LoginController::class, 'logout'])->name('logout');

Route::get('/create', [UsuarioController::class, 'create'])->name('create');
Route::post('/store', [UsuarioController::class, 'store'])->name('store');
