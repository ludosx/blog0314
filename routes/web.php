<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;

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

Route::get('/', [BlogController::class, 'loginView'])->middleware('guest')->name('home');
Route::post('/login', [BlogController::class, 'login'])->name('login');
Route::get('/register', [BlogController::class, 'registerView'])->middleware('guest')->name('newregister');
Route::post('/register', [BlogController::class, 'register'])->name('saveregister');
Route::get('/dashboard', [BlogController::class, 'dashboardView'])->middleware('auth')->name('dashboard');
Route::post('/logout', [BlogController::class, 'logout'])->name('logout');
Route::get('/post', [BlogController::class, 'newPost'])->middleware('auth')->name('newpost');
Route::post('/post', [BlogController::class, 'savePost'])->name('savepost');
Route::get('/answerpost', [BlogController::class, 'newAnswer'])->middleware('auth')->name('newanswer');
Route::post('/answerpost', [BlogController::class, 'saveAnswer'])->name('saveanswer');
