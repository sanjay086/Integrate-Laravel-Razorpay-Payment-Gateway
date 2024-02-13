<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RazorpayController;
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

Route::get('/', [ProductController::class,'index'])->name('products.index');
Route::get('products/create', [ProductController::class,'create'])->name('products.create');
Route::POST('products/store', [ProductController::class,'store'])->name('products.store');
Route::get('products/{id}/edit', [ProductController::class,'edit']);
Route::PUT('products/{id}/update', [ProductController::class,'update']);
Route::delete('products/{id}/delete', [ProductController::class,'destroy']);
Route::get('products/{id}/show', [ProductController::class,'show']);

//Here is Login and Register code


//Route::get('login', [AuthController::class,'index1'])->name('login');
//Route::get('register', [AuthController::class,'register_view'])->name('register');

Route::get('/login',[CustomAuthController::class,'login'])->middleware('alreadyLoggedIn');
Route::get('/registration',[CustomAuthController::class,'registration'])->middleware('alreadyLoggedIn');
Route::POST('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');
Route::POST('/login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
Route::get('/dashboard',[CustomAuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout',[CustomAuthController::class,'logout']);

// Email Function

Route::get('/sendmail',[MailController::class,'sendmail']);

// Implementation of  Razorpay Payment Getway

Route::get('/payment',[RazorpayController::class,'formPage'])->name('payment');
Route::POST('/make-order',[RazorpayController::class,'makeOrder'])->name('make-order');
Route::get('/success',[RazorpayController::class,'success'])->name('success');