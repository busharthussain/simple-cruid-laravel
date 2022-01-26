<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('products', 'App\Http\Controllers\ProductController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::view('reg',  'auth.register');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::get('/customer', [App\Http\Controllers\Api\CustomerController::class, 'viewCustomer']);
Route::get('get/customers', [App\Http\Controllers\Api\CustomerController::class, 'showCustomersView']);
Route::get('get/all/customers', [App\Http\Controllers\Api\CustomerController::class, 'getCustomers'])->name('customer.show');
Route::post('/save/customer', [App\Http\Controllers\Api\CustomerController::class, 'createCustomer'])->name('create.customer');
Route::post('customer/delete', [App\Http\Controllers\Api\CustomerController::class, 'deleteCustomer'])->name('delete.customer');
Route::get('customer/edit/{id}', [App\Http\Controllers\Api\CustomerController::class, 'editCustomer'])->name('customer.edit');
Route::post('customer/search', [App\Http\Controllers\Api\CustomerController::class, 'searchCustomer'])->name('customer.search');
Route::post('customer/update', [App\Http\Controllers\Api\CustomerController::class, 'updateCustomer'])->name('update.customer');


Route::get('/taylor', [App\Http\Controllers\Api\UserController::class, 'showUser']);
Route::post('/user/save', [App\Http\Controllers\Api\UserController::class, 'saveUser'])->name('signup.user');
Route::post('/login/user', [App\Http\Controllers\Api\UserController::class, 'loginUser'])->name('login.user');
Route::post('/getinfo', [App\Http\Controllers\Api\UserController::class, 'getUserName'])->name('user.info');
Route::post('/user/name', [App\Http\Controllers\Api\UserController::class, 'setUserName'])->name('user.name');
Route::post('/user/image', [App\Http\Controllers\Api\UserController::class, 'setUserImage'])->name('user.image');

Route::get('/profile', [App\Http\Controllers\Api\UserController::class, 'userProfile']);