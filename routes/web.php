<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
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


Route::namespace('Auth')->group(function ($auth) {
    $auth->get('/', [UserController::class, 'login'])->name('login');
    $auth->post('post-login', [UserController::class, 'loginStore'])->name('login.post'); 

});


Route::middleware(['auth'])->group(function ($admin) {
    $admin->get('home', [CompanyController::class, 'homePage'])->name('home');
    $admin->resource('company',CompanyController::class);
    $admin->get('logout', [UserController::class, 'logout'])->name('logout');
});
