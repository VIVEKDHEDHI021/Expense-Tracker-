<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalControoler;
use App\Http\Controllers\workerinfo;    
use App\Models\User;
use App\Models\Expense;
use App\Models\worker;


Route::view('/', 'register');
Route::view('/login', 'login');
Route::view('/transaction/add-expense', 'add-expense');
Route::view('/transaction/add-income', 'add-income');
Route::view('/worker', 'worker');
Route::view('/worker_money', 'worker_money');
Route::view('/workerprofile', 'workerprofile');
Route::view('/workerlist', 'workerlist');



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/transaction/add-expense', [CalControoler::class, 'addExpense']);
Route::post('/transaction/add-income', [CalControoler::class, 'addIncome']);
Route::get('/dashboard', [CalControoler::class, 'index'])->middleware('auth');
Route::get('/profile', [CalControoler::class, 'profile'])->middleware('auth');
Route::get('/workerdisplay',[CalControoler::class, 'workerdisplay']);
Route::post('/worker', [workerinfo::class, 'workerdetail']);
Route::post('/worker_money', [workerinfo::class, 'addmoney']);
Route::get('/worker_money', [workerinfo::class, 'worker_money']);
Route::get('/workerdisplay', [workerinfo::class, 'showTransaction']);
Route::get('/workerprofile', [workerinfo::class, 'workerprofile']);
Route::get('/workerprofile/{id}', [workerinfo::class, 'workerprofile']);
Route::delete('/transaction/{id}', [CalControoler::class, 'distroy']);
Route::delete('/WorkerTransaction/{id}', [workerinfo::class, 'distroy']);
Route::delete('/deleteworker/{id}', [workerinfo::class, 'deleteworker']);
Route::get('/workerlist', [workerinfo::class, 'workerlist']);
