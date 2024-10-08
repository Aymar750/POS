<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionController;

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
Route::get('/', function () { return view('home'); });

Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);
Route::post('register', [RegisterController::class,'register']);

Route::get('password/forget', function () { return view('pages.forgot-password'); })->name('password.forget');
Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');

Route::group(['middleware' => 'auth'], function() {
    // Logout route
    Route::get('/logout', [LoginController::class,'logout']);
    Route::get('/clear-cache', [HomeController::class,'clearCache']);

    // Dashboard route (accessible to all roles)
    Route::get('/dashboard', function () { return view('pages.dashboard'); })->name('dashboard');

    // Routes for Super Admin
    Route::group(['middleware' => 'role:Super Admin'], function() {
        Route::get('/users', [UserController::class,'index']);
        Route::get('/user/get-list', [UserController::class,'getUserList']);
        Route::get('/user/create', [UserController::class,'create']);
        Route::post('/user/create', [UserController::class,'store'])->name('create-user');
        Route::get('/user/{id}', [UserController::class,'edit']);
        Route::post('/user/update', [UserController::class,'update']);
        Route::get('/user/delete/{id}', [UserController::class,'delete']);
        
        Route::get('/roles', [RolesController::class,'index']);
        Route::get('/role/get-list', [RolesController::class,'getRoleList']);
        Route::post('/role/create', [RolesController::class,'create']);
        Route::get('/role/edit/{id}', [RolesController::class,'edit']);
        Route::post('/role/update', [RolesController::class,'update']);
        Route::get('/role/delete/{id}', [RolesController::class,'delete']);
        
        Route::get('/permission', [PermissionController::class,'index']);
        Route::get('/permission/get-list', [PermissionController::class,'getPermissionList']);
        Route::post('/permission/create', [PermissionController::class,'create']);
        Route::get('/permission/update', [PermissionController::class,'update']);
        Route::get('/permission/delete/{id}', [PermissionController::class,'delete']);
    });

    // Routes for Gestionnaire
    Route::group(['middleware' => 'role:Gestionnaire'], function() {
        Route::get('/inventory', 'InventoryController@index')->name('inventory');
        // ici routes réservées au Gestionnaire
    });

    // Routes for Vendeur
    Route::group(['middleware' => 'role:Vendeur'], function() {
        Route::get('/pos', 'PosController@index')->name('pos');
        // ici routes réservées au Vendeur
    });

    // Get permissions
    Route::get('get-role-permissions-badge', [PermissionController::class,'getPermissionBadgeByRole']);

    // Basic demo routes
    include('modules/demo.php');
    // Inventory routes
    include('modules/inventory.php');
    // Accounting routes
    include('modules/accounting.php');
});

Route::get('/register', function () { return view('pages.register'); });
Route::get('/login-1', function () { return view('pages.login'); });
