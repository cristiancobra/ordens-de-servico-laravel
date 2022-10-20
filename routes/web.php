<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [DashboardController::class, 'index'])
	->name('dashboard');

Route::resource('/customers', CustomerController::class)
	->names('customer');

Route::get('/orders/finish/{order}', [OrderController::class, 'ajaxUpdate'])
	->name('order.finish');

Route::get('/orders/filter', [OrderController::class, 'filterOrders'])
	->name('order.filter');

Route::resource('/orders', OrderController::class)
	->names('order');

Route::resource('/products', ProductController::class)
	->names('product');