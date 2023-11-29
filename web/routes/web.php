<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\RequestResponseController;
use App\Http\Controllers\WorkshopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::get('/ws-login', [LoginController::class, 'showWorkshopLogin'])->name('ws-login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/workshops/requests/{id}', [RequestController::class, 'showAsWorkshop'])->name('requests.showAsWorkshop'); // muestra los requests disponibles a los workshops
    Route::get('/workshops/{id}/requests', [RequestController::class, 'indexByWorkshop'])->name('requests.indexByWorkshop'); // muestra los requests aceptados de UN workshop
    Route::resource('/requests', RequestController::class);
    Route::resource('requests.responses', \App\Http\Controllers\RequestResponseController::class)->shallow();
    Route::resource('workshops.responses', \App\Http\Controllers\WorkshopResponseController::class);
    Route::get('/customer/{customer}/requests', [RequestController::class, 'indexByCustomer'])->name('requests.indexByCustomer');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('accept-response/{id}', [RequestResponseController::class, 'acceptResponse'])->name('acceptResponse');
    Route::get('/workshop/{workshop}', [WorkshopController::class, 'show'])->name('showWorkshopAsCustomer'); //muestra un taller (vista para customers)

    Route::get('/workshop-home', [HomeController::class, 'workshopHome'])->name('workshop-home');
});