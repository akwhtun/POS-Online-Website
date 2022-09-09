<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'loginPage');

//login, register
Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');

Route::get('/registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');


Route::middleware(['auth'])->group(function () {

    //Dashboard
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    //Admin Category
    Route::middleware(['auth_admin'])->group(function () {

        //category crud
        Route::prefix('categories')->group(function () {
            Route::get('list', [CategoryController::class, 'list'])->name('category#list');

            Route::get('add', [CategoryController::class, 'add'])->name('category#add');

            Route::post('create', [CategoryController::class, 'create'])->name('category#create');

            Route::post('delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');

            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');

            Route::post('update', [CategoryController::class, 'update'])->name('category#update');
        });

        //admin
        Route::prefix('admin')->group(function () {
            Route::get('changePasswordPage', [AdminController::class, 'changePasswordPage'])->name('changePasswordPage');

            Route::post('changePassword', [AdminController::class, 'changePassword'])->name('changePassword');

            Route::get('viewAccountDetail', [AdminController::class, 'viewAccountDetail'])->name('accountDetail');
        });
    });

    //User Home
    Route::middleware(['auth_user'])->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('home', function () {
                return view('user.home');
            })->name('user#home');
        });
    });
});