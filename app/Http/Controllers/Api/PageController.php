<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($slug) : \Illuminate\Http\JsonResponse
    {
        $item = Page::whereTranslation('slug', $slug, app()->getLocale())->first();
        if (!$item) {
            return response()->json([
                'status' => 'error',
                'message' => __('Page not found')
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $item
        ]);
    }
}
