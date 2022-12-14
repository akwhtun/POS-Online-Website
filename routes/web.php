<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\UserController;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth_admin'])->group(function () {

    Route::redirect('/', 'loginPage');

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

            //admin change role
            Route::get('ajax/changeRole', [AdminController::class, 'changeRole'])->name('ajax#changeRole');

            //user lists
            Route::get('viewUserList', [AdminController::class, 'viewUserList'])->name('userLists#view');

            //user change role
            Route::get('ajax/userChangeRole', [AdminController::class, 'userChangeRole'])->name('ajax#userChangeRole');

            //user suspend
            Route::get('ajax/userSuspend', [AdminController::class, 'userSuspend'])->name('ajax#userSuspend');

            //user contact
            Route::get('userContact/list', [AdminController::class, 'userContact'])->name('userContact#list');

            //user contact delete
            Route::post('userContact/delete/{id}', [AdminController::class, 'userContactDelete'])->name('userContact#delete');

            //user contact view
            Route::get('userContact/view/{id}', [AdminController::class, 'userContactView'])->name('userContact#view');
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

        //order list
        Route::prefix('orderList')->group(function () {
            Route::get('view', [OrderController::class, 'viewOrderList'])->name('order#list');

            Route::get('ajax/chooseStatus', [OrderController::class, 'chooseOrderStatus'])->name('order#chooseStatus');

            Route::get('ajax/changeStatus', [OrderController::class, 'changeOrderStatus'])->name('order#changeStatus');

            Route::get('vieworderData/{ordercode}', [OrderController::class, 'viewOrderData'])->name('order#data');
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

            Route::get('increaseview', [AjaxController::class, 'increaseViewCount'])->name('ajax#increaseView');
        });

        //cart
        Route::prefix('cart')->group(function () {
            Route::get('getOrderList', [CartController::class, 'orderList'])->name('cart#orderList');

            Route::get('getHistoryList', [CartController::class, 'historyList'])->name('cart#history');
        });

        //contact page
        Route::get('contactPage', [ContactController::class, 'contactPage'])->name('user#contact');

        Route::post('contactSuccess', [ContactController::class, 'contactSuccess'])->name('usre#contactSuccess');

        // pagination
        // Route::get('homePage/fetchPage', [UserController::class, 'fetchPage']);
    });
});