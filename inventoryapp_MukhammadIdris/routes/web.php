<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;

//HOME = index
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/profile', [ProfileController::class, 'getProfile'])->middleware('auth');
Route::match(['post', 'put'], '/profile',[ProfileController::class, 'store'])->middleware('auth');

//Register User
//Route::get('/register', [FormController::class, 'showRegisterForm']);
//Route::post('/welcome', [FormController::class, 'processRegister']);

Route::middleware(['auth', 'admin'])->group(function () {
  // CRUD Categories
// C => Create Data
Route::get('/categories/create', [CategoriesController::class, 'create']);
Route::post('/categories', [CategoriesController::class, 'store']);

// R => Read Data
Route::get('/categories', [CategoriesController::class, 'index']);
Route::get('/categories/{id}', [CategoriesController::class, 'show']);

// U => Update Data
Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit']);
Route::put('/categories/{id}', [CategoriesController::class, 'update']);

// D => Delete Data
Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']);
});

// CRUD Post
Route::resource('/product', PostController::class);

Route::middleware(['guest'])->group(function () {
    // Fitur Auth
//register
Route::get('/register',[AuthController::class, 'formregister']);
Route::post('/register', [AuthController::class, 'register']);

// Login
Route::get('/login', [AuthController::class, 'formlogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');


});



//Logout
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
//Get List Transaction
Route::get('/transaction', [TransactionController::class, 'index']);
Route::get('/transaction/create', [TransactionController::class, 'create']);
Route::post('/transaction', [TransactionController::class, 'store']);

//Admin

Route::get('/transaction/{id}', [TransactionController::class, 'edit']);
Route::put('/transaction/{id}', [TransactionController::class, 'detail']);

});
