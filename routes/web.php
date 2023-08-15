<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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

// --- User Routes ---
Route::get('/', [UserController::class, 'index']);
Route::post('/search', [UserController::class, 'search']);
Route::get('/recipe/{postID}', [UserController::class, 'getRecipe']);

// --- Admin Routes ---
Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware('auth');
Route::get('/addPage', [AdminController::class, 'addPage'])->middleware('auth');
Route::post('/processAdd', [AdminController::class, 'processAdd'])->middleware('auth');
Route::get('/editPage/{postID}', [AdminController::class, 'editPage'])->middleware('auth');
Route::post('/processEdit', [AdminController::class, 'processEdit'])->middleware('auth');
Route::get('/remove/{postID}', [AdminController::class, 'remove'])->middleware('auth');
