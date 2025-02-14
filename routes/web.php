<?php

use App\Http\Controllers\PaystackController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('callback', [PaystackController::class, 'callback'])->name('callback');
Route::get('success', [PaystackController::class, 'success'])->name('success');
Route::get('cancel', [PaystackController::class, 'cancel'])->name('cancel');