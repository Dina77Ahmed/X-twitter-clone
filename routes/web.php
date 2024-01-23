<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
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

Route::get('/',HomeController::class)->name('home');


Route::resource('ideas', IdeaController::class)
   ->middleware('auth')
   ->except('ideas.index');

   
Route::scopeBindings()->group(function(){
      Route::middleware('auth')->group(function () {
          Route::resource('ideas.comments', CommentController::class);
      });
   });


Route::get('/register',[AuthController::class,'register'])->name('register');

Route::post('/register',[AuthController::class,'store'])->name('register.store');


Route::get('/login',[AuthController::class, 'login'])->name('login');

Route::post('/login',[AuthController::class, 'check'])->name('login.check');


Route::post('/logout',[AuthController::class, 'logout'])->name('logout');




