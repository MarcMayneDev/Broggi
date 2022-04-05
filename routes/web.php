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
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/admin', [App\Http\Controllers\UserController::class, 'index']);

Route::delete('/admin/{user}', [App\Http\Controllers\UserController::class, 'destroy']);

// Route::get('/admin', function () {
//     return view('admin', ['cicles' => $cicles]);
// })->name('admin');

Route::get('/admin/create', [App\Http\Controllers\UserController::class, 'create']);

Route::get('/registro', function () {
    return view('registro');
})->name('admin');

Route::post('/registro', [App\Http\Controllers\UserController::class, 'store']);
