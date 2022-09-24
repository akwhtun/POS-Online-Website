<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'loginPage');

Route::middleware(['auth_admin'])->group(function () {
    //login, register
    Route::get('/loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');

    Route::get('/registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');
});


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
            //password change
            Route::get('changePasswordPage', [AdminController::class, 'changePasswordPage'])->name('changePasswordPage');

            Route::post('changePassword', [AdminController::class, 'changePassword'])->name('changePassword');

            // profile detail
            Route::get('viewAccountDetail', [AdminController::class, 'viewAccountDetail'])->name('accountDetail');

            Route::get('editAccountDetail', [AdminController::class, 'editAccountDetail'])->name('editAccountDetail');

            Route::post('updateAccountDetail/{id}', [AdminController::class, 'updateAccountDetail'])->name('updateAccountDetail');

            //admin lists
            Route::get('viewAdminList', [AdminController::class, 'viewAdminList'])->name('adminLists#view');

            //admin delete
            Route::get('deleteAdminList/{id}', [AdminController::class, 'deleteAdminList'])->name('adminLists#delete');

            Route::get('editRole/{id}', [AdminController::class, 'editRole'])->name('adminLists#editRole');

            Route::post('updateRole/{id}', [AdminController::class, 'updateRole'])->name('adminLists#updateRole');
        });


        //pizza crud
        Route::prefix('pizzas')->group(function () {

            Route::get('list', [ProductController::class, 'list'])->name('pizza#list');

            Route::get('add', [ProductController::class, 'add'])->name('pizza#add');

            Route::post('create', [ProductController::class, 'create'])->name('pizza#create');

            Route::get('delete/{id}', [ProductController::class, 'delete'])->name('pizza#delete');

            Route::get('view/{id}',  [ProductController::class, 'view'])->name('pizza#view');

            Route::get('edit/{id}',  [ProductController::class, 'edit'])->name('pizza#edit');

            Route::post('update',  [ProductController::class, 'update'])->name('pizza#update');
        });
    });

    //User Home
    Route::group(['prefix' => 'user', 'middleware' => 'auth_user'], function () {

        //user page
        Route::get('homePage', [UserController::class, 'homePage'])->name('user#home');

        Route::get('filter/{id}', [UserController::class, 'filter'])->name('user#filter');

        // profile detail
        Route::get('viewAccountDetail', [UserController::class, 'viewAccountDetail'])->name('user#accountDetail');

        Route::get('editAccountDetail', [UserController::class, 'editAccountDetail'])->name('user#editAccountDetail');

        Route::post('updateAccountDetail/{id}', [UserController::class, 'updateAccountDetail'])->name('user#updateAccountDetail');

        Route::get('changePasswordPage', [UserController::class, 'changePasswordPage'])->name('user#changePasswordPage');

        Route::post('changePassword', [UserController::class, 'changePassword'])->name('user#changePassword');

        //pizza detail
        Route::prefix('pizzas')->group(function () {
            Route::get('detail/{id}', [ProductController::class, 'viewDetail'])->name('pizza#detail');
        });

        //ajax
        Route::prefix('ajax')->group(function () {
            Route::get('pizzas/getList', [AjaxController::class, 'getList'])->name('ajaxPizza#list');

            Route::get('pizzas/orderPizza', [AjaxController::class, 'orderPizza'])->name('ajaxPizza#order');

            Route::get('order', [AjaxController::class, 'orderItemList'])->name('ajaxPizza#orderItem');

            Route::get('orderSuccess', [AjaxController::class, 'orderSuccess'])->name('ajaxPizza#orderSuccess');

            Route::get('cart/clear', [AjaxController::class, 'clearCart'])->name('ajax#clearCart');

            Route::get('cartList/remove', [AjaxController::class, 'listRemove'])->name('ajax#listRemove');
        });

        //cart
        Route::prefix('cart')->group(function () {
            Route::get('getOrderList', [CartController::class, 'orderList'])->name('cart#orderList');

            Route::get('getHistoryList', [CartController::class, 'historyList'])->name('cart#history');
        });
    });
});

// Route::middleware(['auth_user'])->group(function () {


//     Route::prefix('user')->group(function () {
//     });



//     //password change

//     //user
//     Route::prefix('user')->group(function () {

//         //ajax

//
//     });
// });