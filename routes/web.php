<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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


// Landing Page
Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/cartaTrucada', [App\Http\Controllers\CartesTrucadesController::class, 'index']);


// Admin Page
Route::get('/admin', [App\Http\Controllers\UserController::class, 'index']);

Route::delete('/admin/{user}', [App\Http\Controllers\UserController::class, 'destroy']);

Route::post('/admin', [App\Http\Controllers\UserController::class, 'adminStore']);


// Registro
Route::get('/registro', function () {
    return view('registro');
})->name('registro');

Route::post('/registro', [App\Http\Controllers\UserController::class, 'store']);

// Login
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [App\Http\Controllers\UserController::class, 'login']);

Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout']);


// Usuario
Route::post('/usuari/{user}/edit', [App\Http\Controllers\UserController::class, 'edit']);
Route::put('/usuari/{user}', [App\Http\Controllers\UserController::class, 'update']);
