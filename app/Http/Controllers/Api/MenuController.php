<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;

class MenuController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : \Illuminate\Http\JsonResponse
    {
        $items = Menu::where([
            'is_active' => 1,
            'parent_id' => null
        ])->with(['childrens' => function ($query) {
            $query->where('is_active', 1)->orderBy('sort', 'asc');
        }])->orderBy('sort', 'asc')->get();
        return response()->json([
            'status' => 'success',
            'data' => $items
        ]);
    }
}
