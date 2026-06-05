<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalControoler;
use App\Models\User;
use App\Models\Expense;


Route::view('/', 'register');
Route::view('/login', 'login');
Route::view('/transaction/add-expense', 'add-expense');
Route::view('/transaction/add-income', 'add-income');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/transaction/add-expense', [CalControoler::class, 'addExpense']);
Route::post('/transaction/add-income', [CalControoler::class, 'addIncome']);
Route::get('/dashboard', [CalControoler::class, 'index'])->middleware('auth');
