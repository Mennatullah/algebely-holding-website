<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HistoryRequest;
use App\Models\History;

class HistoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : \Illuminate\Http\JsonResponse
    {
        $items = History::whereIsActive(1)->get();
        return response()->json([
            'status' => 'success',
            'data' => $items
        ]);
    }
}
