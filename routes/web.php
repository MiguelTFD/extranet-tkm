<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\OrdenCompraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\UsuarioDashboardController;

//Navigations Page endpoints====================================================

Route::get(
    '/',
    [HomeController::class, 'index']
)->name('home');

Route::get(
    '/about',
    [NavigationController::class, 'showAboutPage']
)->name('about');

Route::get(
    '/contact',
    [NavigationController::class, 'showContactPage']
)->name('contact');

Route::get(
    '/products',
    [NavigationController::class, 'showProductsPage']
)->name('products');
//listo
Route::get(
    '/passwordRestore',
    [NavigationController::class, 'showPasswordRestorePage']
)->name('passwordRestore');
//listo

Route::get(
    '/cart/checkout',
    [NavigationController::class, 'showCartPage']
)->name('checkout');
Route::get(
    '/userRegistration',
    [NavigationController::class, 'showUserRegistrationPage']
)->name('userRegistration');
//listo
Route::get(
    '/userLogin',
    [NavigationController::class, 'showUserLoginPage']
)->name('login');

Route::get(
    '/termsAndConditions',
    [NavigationController::class, 'showTermsAndConditionsPage']
)->name('termsAndConditions');

Route::get(
    '/privacyPolicy',
    [NavigationController::class, 'showPrivacyPolicyPage']
)->name('privacyPolicy');

Route::get(
    '/securityAndPrivacy',
    [NavigationController::class, 'showSecurityAndPrivacyPage']
)->name('securityAndPrivacy');


/*----------------------------------------------------------------------------*/


//Products endpoints============================================================

Route::get('/api/categories',
    [ProductoController::class, 'getCategories']
);

Route::get('/api/products',
    [ProductoController::class, 'getProducts']
);

Route::post('/api/filter-products', 
    [ProductoController::class, 'filterProductsByCategory']); 

Route::post('/api/productDetail', 
    [ProductoController::class, 'getProductInfo']); 

/*----------------------------------------------------------------------------*/


//Emails endpoints=============================================================

Route::post(
    '/sendContactEmail',
    [EmailController::class, 'sendContactEmail']
)->name('sendContactEmail');

Route::post(
    '/orderRequestEmail/{id}',
    [EmailController::class, 'sendOrderRequestEmail']
)->name('orderRequestEmail');


/*----------------------------------------------------------------------------*/


//User endpoints===============================================================

Route::post(
    'userLogin', 
    [LoginController::class, 'userLogin']
)->name('userLogin');

Route::post(
    'userLogout', 
    [LogoutController::class, 'userLogout']
)->name('userLogout');

Route::post(
    '/createUser', 
    [UsuarioController::class, 'createNewUser']
)->name('createUser');

/*----------------------------------------------------------------------------*/


Route::get('/get-paises', [UbicacionController::class, 'getPaises'])->name('getPaises');
Route::get('/get-departamentos', [UbicacionController::class, 'getDepartamentos'])->name('getDepartamentos');
Route::get('/get-provincias', [UbicacionController::class, 'getProvincias'])->name('getProvincias');
Route::get('/get-distritos', [UbicacionController::class, 'getDistritos'])->name('getDistritos');
Route::post('/direccionNueva', [UbicacionController::class, 'newDirection'])->name('direccionNueva');

//para el carrito de compras
Route::post('/cart/add', [CartController::class, 'add'])->name('add');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('clear');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('remove');
Route::post('/cart/increaseQuantity', [CartController::class, 'increaseQuantity'])->name('increaseQuantity');
Route::post('/cart/decreaseQuantity', [CartController::class, 'decreaseQuantity'])->name('decreaseQuantity');
Route::get('/cart/count', [CartController::class, 'countCart'])->name('countCart');

Route::get('/api/direcciones', [UbicacionController::class, 'obtenerDirecciones']);

Route::post(
    '/newOrderRequest', 
    [OrdenCompraController::class, 'createOrderRequest']
)->name('newOrderRequest');


//Perfil usuario

Route::middleware(['auth:usuario'])->group(function(){
    //listo
    //listo
    Route::put(
        '/updateUser', 
        [UsuarioController::class, 'updateUser']
    )->name('updateUser');
    //listo 
    Route::get(
        '/getUserAddress', 
        [UsuarioController::class, 'getUserAddress']
    )->name('getUserAddress');
    //listo
    Route::get(
        '/getUserOrders', 
        [UsuarioController::class, 'getUserOrders']
    )->name('getUserOrders');
    //listo 
    Route::post(
        '/getOrder', 
        [UsuarioController::class, 'getOrder']
    )->name('getOrder');
    //Listo
    Route::post(
        '/getOrder/generatePdf', 
        [UsuarioController::class, 'generatePdf']
    )->name('generatePdf');
    
    Route::post(
        '/getUserAddress/actualizar', 
        [UsuarioDashboardController::class, 'actualizarDir']
    )->name('direccionActualizar');

    Route::get(
        '/api/direccion/{id}', 
        [UbicacionController::class, 'getDireccion']
    );

//Auth
Route::get(
    '/showUserProfile', 
    [UsuarioController::class, 'showUserProfilePage']
)->name('showUserProfile');

Route::get(
    '/showOrderRequest',
    [NavigationController::class, 'showOrderRequestPage']
)->name('showOrderRequest');


    
    Route::post(
        '/direccion-actualizar', 
        [UbicacionController::class, 'updateDirection']
    )->name('direccionActualizar');
});
