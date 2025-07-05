<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\HistoryController;
use App\Http\Controllers\Api\LeaderController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\SectorController;
use App\Http\Controllers\Api\SettingController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api',   'namespace' => 'App\Http\Controllers\Api' ], function () {
    Route::get('menus', [MenuController::class,'index']);
    Route::get('pages/{slug}', [PageController::class,'show']);
    Route::get('sectors', [SectorController::class,'index']);
    Route::get('leaders', [LeaderController::class,'index']);
    Route::get('settings', [SettingController::class,'index']);
    Route::get('histories', [HistoryController::class,'index']);
    Route::post('contacts', [ContactController::class,'index']);
});
