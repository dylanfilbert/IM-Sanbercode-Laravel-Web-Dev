<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AuthController;

Route::get('/',[HomeController::class,'home']);

// CRUD
// C=> Create Data
Route::get('/categories/create',[CategoriesController::class,'create']);
Route::post('/categories',[CategoriesController::class,'store']);

// R => Read Data
Route::get('/categories',[CategoriesController::class,'index']);
Route::get('/categories/{id}',[CategoriesController::class,'show']);

// U => Update Data
Route::get('/categories/{id}/edit',[CategoriesController::class, 'edit']);
Route::put('/categories/{id}',[CategoriesController::class, 'update']);

//D => Delete Data
Route::delete('/categories/{id}',[CategoriesController::class, 'destroy']);



// CRUD Product
// C
Route::get('/product/create', [ProductController::class,'create']);
Route::post('/product', [ProductController::class,'store']);

// R
Route::get('/product', [ProductController::class,'index']);
Route::get('/product/{id}', [ProductController::class,'show']);

// U 
Route::get('/product/{id}/edit', [ProductController::class,'edit']);
Route::put('/product/{id}', [ProductController::class,'update']);

// D
Route::delete('/product/{id}', [ProductController::class,'destroy']);

// Auth
// Register
Route::get('/register', [AuthController::class,'formregister']);
Route::post('/register', [AuthController::class,'register']);

// Login
Route::get('/login', [AuthController::class,'formlogin']);
Route::post('/login', [AuthController::class,'login']);


