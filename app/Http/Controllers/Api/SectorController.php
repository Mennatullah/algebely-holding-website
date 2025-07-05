<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectorRequest;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SectorController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : \Illuminate\Http\JsonResponse
    {
        $items = Sector::whereIsActive(1)->get();
        return response()->json([
            'status' => 'success',
            'data' => $items
        ]);
    }
}
