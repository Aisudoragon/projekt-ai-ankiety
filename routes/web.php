<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChoicesController;
use App\Http\Controllers\UsersController;

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

Route::get('/browse', [FormsController::class, 'index'])->name('browse');

Route::middleware('auth')->group(function () {
    Route::get('/manage', [FormsController::class, 'manage']);
});

Route::get('/form/{id}', [FormsController::class, 'show'])->name('form');

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/profile', [UsersController::class, 'index']);

Route::post('/update/email', [UsersController::class, 'updateEmail'])->name('update.email');
Route::post('/update/login', [UsersController::class, 'updateLogin'])->name('update.login');
Route::post('/update/password', [UsersController::class, 'updatePassword'])->name('update.password');

Route::get('/logout', [AuthController::class, 'logout']);

Route::post('/fill/{id}', [ChoicesController::class, 'submitForm'])->name('fill');

Route::get('/create', [FormsController::class, 'create'])->name('create');
