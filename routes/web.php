<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\AuthController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::redirect('/', '/index');

Route::get('/browse', [FormsController::class, 'index']);

Route::get('/form/{id}', [FormsController::class, 'show'])->name('form');

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [AuthController::class, 'register'])->name('register');
