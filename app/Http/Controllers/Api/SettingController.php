<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $items = Setting::whereIsActive(1)->get();
        return response()->json([
            'status' => 'success',
            'data' => $items
        ]);
    }
}
