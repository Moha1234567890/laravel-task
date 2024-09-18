<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');



//Route::group('admin')
Route::get( '/admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('view.login')->middleware("check.for.login");

Route::post( '/admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('check.login')->middleware("check.for.login");


Route::post( '/products/search', [App\Http\Controllers\HomeController::class, 'search'])->name('products.search');


Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {

    Route::get( '/index', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');
    Route::get(  '/all-products', [App\Http\Controllers\Admins\AdminsController::class, 'allProducts'])->name('products.index');
    

    

    Route::get(  '/create-products', [App\Http\Controllers\Admins\AdminsController::class, 'createProducts'])->name('products.create');
    Route::post(  '/create-products', [App\Http\Controllers\Admins\AdminsController::class, 'insertProducts'])->name('products.insert');

    Route::get(  '/edit-products/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'editProducts'])->name('products.edit');
    Route::post(  '/update-products/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateProducts'])->name('products.update');

    Route::get(  '/delete-products/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteProducts'])->name('products.delete');


   
});

Route::post( '/admin-logout', [App\Http\Controllers\Admins\AdminsController::class, 'adminLogout'])->name('admin.logout');
