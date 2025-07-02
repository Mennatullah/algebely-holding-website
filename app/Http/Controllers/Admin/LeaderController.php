<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeaderRequest;
use App\Models\Leader;
use Illuminate\Support\Facades\Storage;

class LeaderController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Leader::all();
        return view('admin.leaders.list',get_defined_vars());
    }

    public function create()
    {
        return view('admin.leaders.create');
    }
    public function store(LeaderRequest $request)
    {
        $item = new Leader();
        $item->is_active = $request->is_active ?? 0;
        $item->sort = $request->sort;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $fileoriginname =time().'-'.strtolower(preg_replace('/\s+/', '-', $file->getClientOriginalName()));
            $filename = $request->file('image')->storeAs('images/leaders', $fileoriginname,'public');
            $item->image = $filename;
        }
        $item->translateOrNew('en')->name =  strip_tags($request['name_en']);
        $item->translateOrNew('ar')->name =  strip_tags($request['name_ar']);
        $item->translateOrNew('en')->position =  strip_tags($request['position_en']);
        $item->translateOrNew('ar')->position =  strip_tags($request['position_ar']);
        $item->save();
        return redirect()->route('leaders.index')->with('success', 'Added Successfully');
    }

    public function edit(Leader $leader)
    {
        return view('admin.leaders.edit',['item'=>$leader]);
    }
    public function update(LeaderRequest $request , Leader $leader)
    {
        $leader->is_active = $request->is_active ?? 0;
        $leader->sort = $request->sort;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $fileoriginname =time().'-'.strtolower(preg_replace('/\s+/', '-', $file->getClientOriginalName()));
            $filename = $request->file('image')->storeAs('images/leaders', $fileoriginname,'public');
            $leader->image = $filename;
        }
        $leader->translateOrNew('en')->name =  strip_tags($request['name_en']);
        $leader->translateOrNew('ar')->name =  strip_tags($request['name_ar']);
        $leader->translateOrNew('en')->position =  strip_tags($request['position_en']);
        $leader->translateOrNew('ar')->position =  strip_tags($request['position_ar']);
        $leader->save();
        return redirect()->route('leaders.index')->with('success', 'updated Successfully');
    }
    public function destroy(Leader $leader)
    {
        if(isset($leader->image)){
            Storage::delete($leader->image);
        }
        $leader->deleteTranslations();
        $leader->delete();
        return redirect()->route('leaders.index')->with('success', 'deleted Successfully');
    }
}
