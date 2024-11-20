<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RegistrarUsuarioController;
use App\Http\Controllers\RecuperarPasswordController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\RegistrarCompraController;
use App\Http\Controllers\customerSupport;
use App\Http\Controllers\usuarioDashboardController;

//=====================Page navigations=====================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [NavigationController::class, 'showAboutPage'])->name('about');
Route::get('/passwordRestore', [NavigationController::class, 'showPasswordRestorePage'])->name('passwordRestore');
Route::get('/customerRegistration', [NavigationController::class, 'showCustomerRegistrationPage'])->name('customerRegistration');
Route::get('/orderRequest',[RegistrarCompraController::class, 'showOrderRequestPage'])->name('orderRequest');


Route::get('/termsandConditions',[NavigationController::class, 'showTermsandConditionsPage'])->name('termsandConditions');
Route::get('/privacyPolicy',[NavigationController::class, 'showPrivacyPolicyPage'])->name('privacyPolicy');
Route::get('/securityandPrivacy',[NavigationController::class, 'showSecurityandPrivacyPage'])->name('securityandPrivacy');

//-----------------------------------------------------------



// Ruta para la página de contacto


Route::get('/productos', [ProductoController::class, 'index'])->name('productos');
Route::post('/productos', [ProductoController::class, 'filtrarPorCategoria'])->name('filtrarProductos');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productosDetalle');


Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact',[ContactController::class, 'store'])->name('enviarContacto');


Route::get('/recuperarPassword', [RecuperarPasswordController::class, 'index'])->name('recuperarPassword');

Route::get('login',[LoginController::class, 'showLoginForm'])->name('login');
Route::post('login',[LoginController::class, 'login']);
Route::post('logout',[LoginController::class, 'logout'])->name('logout');

Route::get('/registro', [UsuarioController::class, 'registro'])->name('registro');
Route::post('/crearusuario', [UsuarioController::class, 'crearusuario'])->name('crearusuario');


Route::get('/get-paises', [UbicacionController::class, 'getPaises'])->name('getPaises');
Route::get('/get-departamentos', [UbicacionController::class, 'getDepartamentos'])->name('getDepartamentos');
Route::get('/get-provincias', [UbicacionController::class, 'getProvincias'])->name('getProvincias');
Route::get('/get-distritos', [UbicacionController::class, 'getDistritos'])->name('getDistritos');
Route::post('/direccionNueva', [UbicacionController::class, 'newDirection'])->name('direccionNueva');

//para el carrito de compras
Route::post('/cart/add', [CartController::class, 'add'])->name('add');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('clear');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('remove');
Route::post('/cart/increaseQuantity', [CartController::class, 'increaseQuantity'])->name('increaseQuantity');
Route::post('/cart/decreaseQuantity', [CartController::class, 'decreaseQuantity'])->name('decreaseQuantity');
Route::get('/cart/count', [CartController::class, 'countCart'])->name('countCart');

Route::get('/api/direcciones', [UbicacionController::class, 'obtenerDirecciones']);
Route::post('/crearCompra', [RegistrarCompraController::class, 'crearOrdenCompra'])->name('crearCompra');


//Perfil usuario
Route::get('/verPerfil',[usuarioDashboardController::class,'mostrarDashboard'])->name('verPerfil');
Route::get('/verDirecciones',[usuarioDashboardController::class,'mostrarDirecciones'])->name('verDirecciones');
Route::get('/verPedidos',[usuarioDashboardController::class,'mostrarPedidos'])->name('verPedidos');
Route::post('/mostrar-orden-compra', [UsuarioDashboardController::class, 'mostrarOrdenCompra'])->name('mostrarOrdenCompra');
Route::post('/mostrar-orden-compra/pdf',[usuarioDashboardController::class,'generarPdf'])->name('generarPdf');


Route::put('/usuario/actualizar', [usuarioDashboardController::class, 'update'])->name('updateUsu');
Route::post('/verDirecciones/actualizar', [usuarioDashboardController::class, 'actualizarDir'])->name('direccionActualizar');


Route::get('/api/direccion/{id}', [UbicacionController::class, 'getDireccion']);
Route::post('/direccion-actualizar', [UbicacionController::class, 'updateDirection'])->name('direccionActualizar');

