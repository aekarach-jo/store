<?php

use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [UserController::class, 'onLogout']);

    // Route::get('/store', function () {
    //     return view('/stores/store');
    // });

    Route::post('/createStore', [StoreController::class, 'onCreateStore']);

    Route::get('/store', [StoreController::class, 'ShowStore'])->name('ShowStore');

    Route::get('/storeAllData', [StoreController::class, 'StoreData']);

    Route::post('/updateStore', [StoreController::class, 'UpdateStore']);

    Route::get('/deleteStore/{id}', [StoreController::class, 'DestroyStore']);

    Route::get('/getStoreById/{id}', [StoreController::class, 'StoreIdData']);

    Route::get('/product', function () {
        return view('/products/product');
    });
});


Route::get('/login', function () {
    return view('/users/login');
})->name('login');

Route::post('userLogin', [UserController::class, 'onLogin']);

Route::post('/createAccount', [UserController::class, 'onCreateUser']);

Route::get('/register', function () {
    return view('/users/register');
});
