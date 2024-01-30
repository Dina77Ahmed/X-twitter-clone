<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
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

// HomeController
Route::get('/', HomeController::class)->name('home');


// IdeaController
Route::resource('ideas', IdeaController::class)
   ->middleware('auth')
   ->except('create');


// CommentController
Route::scopeBindings()->group(function () {
   Route::middleware('auth')->group(function () {
      Route::resource('ideas.comments', CommentController::class)
         ->except(['show', 'index', 'create']);
   });
});


// AuthController
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'check'])->name('login.check');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// End AuthController


// UserController
Route::resource('users', UserController::class)
   ->middleware('auth')
   ->except(['create', 'store']);

// Follow Routes

Route::post('/users/{user}/follow',[UserController::class,'follow'])->name('user.follow');
Route::post('/users/{user}/unfollow',[UserController::class,'unfollow'])->name('user.unfollow');