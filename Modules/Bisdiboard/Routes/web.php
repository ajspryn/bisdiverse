<?php

use Modules\Bisdiboard\Http\Controllers\TaskController;
use Modules\Bisdiboard\Http\Controllers\CommentController;
use Modules\Bisdiboard\Http\Controllers\ProjectController;

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

Route::prefix('bisdiboard')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', 'BisdiboardController@index');
    Route::resource('/project', ProjectController::class);
    Route::resource('/task', TaskController::class);
    Route::resource('/comment', CommentController::class);
});
