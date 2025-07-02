<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HistoryRequest;
use App\Models\History;

class HistoryController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = History::all();
        return view('admin.histories.list',get_defined_vars());
    }

    public function create()
    {
        return view('admin.histories.create');
    }
    public function store(HistoryRequest $request)
    {
        $item = new History();
        $item->is_active = $request->is_active ?? 0;
        $item->sort = $request->sort;
        $item->translateOrNew('en')->title =  strip_tags($request['title_en']);
        $item->translateOrNew('ar')->title =  strip_tags($request['title_ar']);
        $item->translateOrNew('en')->description =  strip_tags($request['description_en']);
        $item->translateOrNew('ar')->description =  strip_tags($request['description_ar']);
        $item->save();
        return redirect()->route('histories.index')->with('success', 'Added Successfully');
    }

    public function edit(History $history)
    {
        return view('admin.histories.edit',[ 'item'=>$history]);
    }
    public function update(HistoryRequest $request , History $history)
    {
        $history->is_active = $request->is_active ?? 0;
        $history->sort = $request->sort;
        $history->translateOrNew('en')->title =  strip_tags($request['title_en']);
        $history->translateOrNew('ar')->title =  strip_tags($request['title_ar']);
        $history->translateOrNew('en')->description =  strip_tags($request['description_en']);
        $history->translateOrNew('ar')->description =  strip_tags($request['description_ar']);
        $history->save();
        return redirect()->route('histories.index')->with('success', 'updated Successfully');
    }
    public function destroy(History $history)
    {
        $history->deleteTranslations();
        $history->delete();
        return redirect()->route('histories.index')->with('success', 'deleted Successfully');
    }
}
