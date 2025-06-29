<?php

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin',   'namespace' => 'App\Http\Controllers\Admin' , 'middleware' => 'auth'], function () {
    Route::resource('menus', MenuController::class);
    Route::resource('pages', PageController::class);
});
