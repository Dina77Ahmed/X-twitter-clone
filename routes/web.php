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
// Route::get('users/{user}',[UserController::class, 'show'])->middleware('auth');
// Follow Routes
Route::post('/users/{user}/follow',[UserController::class,'follow'])->name('user.follow');
Route::post('/users/{user}/unfollow',[UserController::class,'unfollow'])->name('user.unfollow');

// feed Route
Route::get('user/feed',[UserController::class,'feed'])
->middleware('auth')->name('feed');


// love Route
Route::middleware('auth')->group(function(){
   Route::post('idea/{idea}/like',[IdeaController::class, 'like'])->name('idea.like');
   Route::post('idea/{idea}/dislike',[IdeaController::class, 'dislike'])->name('idea.dislike');
});














