<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CategoriesController;

Route::get('/', [DashboardController::class, 'index']);
Route::get('/register', [FormController::class, 'showRegisterForm']);
Route::post('/welcome', [FormController::class, 'processRegister']);


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