<?php

use App\Http\Controllers\Admin\LeaderController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin',   'namespace' => 'App\Http\Controllers\Admin' , 'middleware' => 'auth'], function () {
    Route::resource('menus', MenuController::class);
    Route::resource('pages', PageController::class);
    Route::resource('leaders', LeaderController::class);
    Route::resource('settings', SettingController::class);
});
