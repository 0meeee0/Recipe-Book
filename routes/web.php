<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [RecipeController::class, 'home'])->name('home');
Route::get('/post', [RecipeController::class, 'post'])->name('post');
Route::get('/create', [RecipeController::class, 'create'])->name('create');
Route::post('/store', [RecipeController::class, 'store'])->name('store');