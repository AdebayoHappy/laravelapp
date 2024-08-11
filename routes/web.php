<?php

use App\Models\housesfiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HousingController;
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

//All houses
Route::get('/',[HousingController::class, 'index']);
// Route::get('/Houses/{id}', function ($id){
//    return view('house', [
//      'house'=> housesfiles::find($id)
//    ]);
// });

// Storing houses
Route::post('/house',[HousingController::class, 'store'])->middleware('auth');

//show create form
Route::get('/house/create',[HousingController::class, 'create'])->middleware('auth');

//show edit form
Route::get('/house/{house}/edit', [HousingController::class, 'edit'])->middleware('auth');

//submit edit form
Route::put('/house/{house}', [HousingController::class, 'update'])->middleware('auth');

Route::delete('/house/{house}', [HousingController::class, 'delete'])->middleware('auth');

Route::get('/house/manage',[HousingController::class, 'manage'])->middleware('auth');

//show single houses
Route::get('/house/{house}',[HousingController::class, 'show']);


// Show registrattion form
Route::get('/register',[UserController::class, 'register'])->middleware('guest');

// Create new users
Route::post('/users',[UserController::class, 'store']);

// Log user out
Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Manage housing