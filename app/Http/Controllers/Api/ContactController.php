<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param ApiContactRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ApiContactRequest $request ) : \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();
        if ($request->hasFile('cv')) {
            $file = $request->file('image');
            $fileoriginname =time().'-'.strtolower(preg_replace('/\s+/', '-', $file->getClientOriginalName()));
            $cvPath = $request->file('cv')->storeAs('uploads/cvs', $fileoriginname,'public');
            $data['cv'] = $cvPath;
        }
        $item = Contact::create($data);
        return response()->json([
            'status' => 'success',
            'data' => $item
        ]);
    }

}
