<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeaderRequest;
use App\Models\Leader;
use Illuminate\Support\Facades\Storage;

class LeaderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : \Illuminate\Http\JsonResponse
    {
        $items = Leader::whereIsActive(1)->get();
        return response()->json([
            'status' => 'success',
            'data' => $items
        ]);
    }
}
