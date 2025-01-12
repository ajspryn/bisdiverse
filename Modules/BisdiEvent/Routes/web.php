<?php

use Modules\BisdiEvent\Http\Controllers\BisdiEventController;
use Modules\BisdiEvent\Http\Controllers\EventController;

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

Route::prefix('bisdievent')->group(function () {
    Route::get('/', 'BisdiEventController@index');
    Route::resource('/event', EventController::class);
});

Route::prefix('admin')->middleware(['auth:sanctum', 'verified', 'role:0', 'divisi:0', 'jabatan:0'])->group(function () {
    Route::resource('/bisdievent', BisdiEventController::class);
});
