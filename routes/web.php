<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ProductsController;
use Illuminate\Auth\Events\Login;
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

Route::get('/',[loginController::class,'index'])->name('login');
Route::get('/login',[loginController::class,'index'])->name('login');
Route::post('/login-proses',[loginController::class,'login_proses'])->name('login-proses');
Route::get('/logout',[loginController::class,'logout'])->name('logout');

Route::get('/register',[loginController::class,'register'])->name('register');
Route::post('/register-proses',[LoginController::class,'register_proses'])->name('register-proses');

Route::group(['prefix' => 'admin','middleware' => ['auth'], 'as' => 'admin.'], function(){
    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');

    Route::get('/profile',[HomeController::class,'profile'])->name('profile');
    Route::put('/profile_update/{id}',[HomeController::class,'profile_update'])->name('profile.update');

    Route::get('/user',[HomeController::class,'pengguna'])->name('pengguna');
    Route::get('/create',[HomeController::class,'create'])->name('user.create');
    Route::post('/simpan',[HomeController::class,'simpan'])->name('user.simpan');
    
    Route::get('/edit/{id}',[HomeController::class,'edit'])->name('user.edit');
    Route::put('/update/{id}',[HomeController::class,'update'])->name('user.update');
    
    Route::delete('/hapus/{id}',[HomeController::class,'hapus'])->name('user.hapus');

    Route::get('/products',[ProductsController::class,'products'])->name('products');
    Route::get('/create_products',[ProductsController::class,'create_products'])->name('products.create');
    Route::post('/simpan_products',[ProductsController::class,'simpan_products'])->name('products.simpan');

    Route::get('/edit_products{id}',[ProductsController::class,'edit_products'])->name('products.edit');
    Route::put('/update_products{id}',[ProductsController::class,'update_products'])->name('products.update');

    Route::delete('/hapus_products/{id}',[ProductsController::class,'hapus_products'])->name('products.hapus');

});
    





