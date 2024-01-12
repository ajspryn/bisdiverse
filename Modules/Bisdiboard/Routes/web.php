<?php

use Modules\Bisdiboard\Entities\BoardTodo;
use Modules\Bisdiboard\Http\Controllers\TaskController;
use Modules\Bisdiboard\Http\Controllers\TodoController;
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

// Route::post('/bisdiboard/todo', 'TodoController@store')->name('todo.store');
// Route::post('/bisdiboard/todo/{{ id }}', 'TodoController@show');
Route::get('/bisdiboard/todo/{id}', function (string $id) {
    $todos = BoardTodo::where('task_id', $id)->get();
    return response()->json($todos);
});
Route::prefix('bisdiboard')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', 'BisdiboardController@index');
    Route::resource('/project', ProjectController::class);
    Route::resource('/task', TaskController::class);
    Route::resource('/comment', CommentController::class);
    Route::resource('/todo', TodoController::class);
});
