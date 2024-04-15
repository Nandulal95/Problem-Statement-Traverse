<?php

use App\Http\Controllers\OpencontextController;
use App\Http\Controllers\UserController;
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
    return view('home');
});

Route::GET('/users/create', [UserController::class,'create'])->name('users.create');
Route::GET('/users/show', [UserController::class,'show'])->name('users.show');
Route::POST('/users/store', [UserController::class,'store'])->name('users.store');

Route::GET('/send/email', [UserController::class,'getEmail'])->name('users.store');
Route::post('/send-email', [UserController::class, 'sendEmail'])->name('send.email');


Route::GET('/opencontext/read', [OpencontextController::class,'read'])->name('users.read');
