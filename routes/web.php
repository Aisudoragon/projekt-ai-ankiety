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
})->name('index');

Route::redirect('/', '/index');

Route::get('/browse', [FormsController::class, 'index'])->name('browse');

Route::middleware('auth')->group(function () {
    Route::get('/manage', [FormsController::class, 'manage'])->name('manage');
    Route::get('/manage/statistics/{id}', [FormsController::class, 'statistics'])->name('manage.statistics');
    Route::delete('/manage/delete/{id}', [FormsController::class, 'destroy'])->name('manage.destroy');

    Route::get('/create', function () {
        return view('create');
    })->name('create');
    Route::post('/create/new', [FormsController::class, 'create'])->name('create.new');

    Route::middleware('admin')->group(function () {
        Route::get('/admin', [UsersController::class, 'admin'])->name('admin');
        Route::get('/admin/users', [UsersController::class, 'adminUsers'])->name('admin.users');
        Route::get('/admin/users/{id}', [UsersController::class, 'adminUser'])->name('admin.user');
        Route::post('/admin/users/update', [UsersController::class, 'adminUserUpdate'])->name('admin.update.user');

        Route::get('/admin/forms', [FormsController::class, 'adminForms'])->name('admin.forms');
        Route::delete('/admin/forms/delete/{id}', [FormsController::class, 'destroy'])->name('admin.forms.delete');
    });

    Route::get('/profile', [UsersController::class, 'index']);
    Route::delete('/profile/delete/{id?}', [UsersController::class, 'destroy'])->name('profile.destroy');

    Route::post('/update/email', [UsersController::class, 'updateEmail'])->name('update.email');
    Route::post('/update/login', [UsersController::class, 'updateLogin'])->name('update.login');
    Route::post('/update/password', [UsersController::class, 'updatePassword'])->name('update.password');

    Route::post('/fill/{id}', [ChoicesController::class, 'submitForm'])->name('fill');
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

Route::get('/logout', [AuthController::class, 'logout']);
