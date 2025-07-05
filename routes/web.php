<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Auth::routes();
require base_path('/routes/admin.php');
require base_path('/routes/api.php');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('{any}', [HomeController::class, 'root'])->where('any', '.*');
