<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\LeaderController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SectorController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin',   'namespace' => 'App\Http\Controllers\Admin' , 'middleware' => 'auth'], function () {
    Route::resource('menus', MenuController::class);
    Route::resource('pages', PageController::class);
    Route::resource('sectors', SectorController::class);
    Route::resource('leaders', LeaderController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('histories', HistoryController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('users', UserController::class);
});
