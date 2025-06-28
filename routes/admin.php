<?php

use App\Http\Controllers\Admin\MenuController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin',   'namespace' => 'App\Http\Controllers\Admin' , 'middleware' => 'auth'], function () {
    Route::resource('menus', MenuController::class);
});
