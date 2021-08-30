<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->name('admin.')->middleware(['auth','verified', 'verify_user_activated', 'is_admin', 'update_default_password'])->group(function(){

    Route::get('home', [\App\Http\Controllers\Admin\AdminController::class, 'homeAdmin'])->name('home');
    Route::get('administradores', [\App\Http\Controllers\Admin\AdminController::class, 'listAdmin'])->name('listAllAdmins');
    Route::get('detalhes-admin/{user}', [\App\Http\Controllers\Admin\AdminController::class, 'showAdmin'])->name('detailsAdmin');
    Route::get('novo-admin', [\App\Http\Controllers\Admin\AdminController::class, 'createNewAdmin'])->name('createUserAdmin');
    Route::get('nova-senha', [\App\Http\Controllers\Admin\AdminController::class, 'updatePassword'])->name('defineNewPassword');

    Route::get('funcoes', [\App\Http\Controllers\Admin\RolesController::class, 'index'])->name('roles');
    Route::get('criar-funcao', [\App\Http\Controllers\Admin\RolesController::class, 'create'])->name('roles_create');

});

Route::prefix('/')->name('user.')->middleware(['auth:sanctum', 'verified', 'is_user_default'])->group(function(){

    Route::get('{username}', [\App\Http\Controllers\User\UsersController::class, 'profile'])->middleware('verify_uri_username')->name('home');

});

