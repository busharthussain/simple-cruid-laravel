<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{
    WebsiteController, PostController,UserController
};
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/subscribe', [WebsiteController::class, 'subscribe']);
Route::post('publish/post', [PostController::class, 'publishPost']);
Route::post('create/users', [UserController::class, 'create']);
Route::get('show/users', [UserController::class, 'show']);
Route::get('search/users', [UserController::class, 'index']);
Route::get('delete/users', [UserController::class, 'destroy']);
Route::post('edit/users', [UserController::class, 'update']);
