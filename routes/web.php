<?php

use App\Models\EduLink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FormSkpdController;
use Modules\QnA\Http\Controllers\QnAController;

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

// Route::get('/', function () {
//     return view('index');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/edulink', [App\Http\Controllers\EduLinkController::class, 'index'])->name('edulink');
Route::middleware(['auth:sanctum', 'verified'])->resource('/profile', UserController::class);
Route::post('/chat', [QnAController::class, 'generateResponse']);


Route::get('/jadwal', function () {
    return view('home');
})->middleware(['auth']);
Route::get('/pengajuan', function () {
    return view('home');
})->middleware(['auth']);
