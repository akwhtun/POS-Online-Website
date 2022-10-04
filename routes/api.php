<?php

use App\Http\Controllers\API\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('users/getList', [APIController::class, 'getUserList']);

Route::get('categories/getList', [APIController::class, 'getCategoryList']);

Route::get('categories/get/{id}', [APIController::class, 'getOne']);

Route::post('categories/create', [APIController::class, 'createCategory']);

Route::post('categories/delete', [APIController::class, 'deleteCategory']);

Route::post('categories/update', [APIController::class, 'updateCategory']);