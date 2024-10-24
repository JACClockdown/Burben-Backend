<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UsersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/me', [AuthController::class, 'me']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group([ 'middleware' => ['jwt']], function(){

    Route::controller(UsersController::class)->group(function() {
        Route::get('/users','index')->name('users.index');
        Route::post('/user','store')->name('users.store');
        Route::get('/user/{id}','me')->name('users.get');
        Route::put('/user/{id}','update')->name('users.update');
        Route::delete('/user/{id}','delete')->name('users.delete');
    });

    

});