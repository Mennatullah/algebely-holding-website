<?php

namespace App\Http\Controllers\Admin;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Sector::all();
        return view('admin.sectors.list',get_defined_vars());
    }

    public function create()
    {
        $parents = Sector::whereNull('parent_id')->get();
        return view('admin.sectors.create',get_defined_vars());
    }
    public function store(SectorRequest $request)
    {
        $item = new Sector();
        $item->parent_id = $request->parent_id;
        $item->is_active = $request->is_active ?? 0;
        $item->sort = $request->sort;
        $item->link = $request->link;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $fileoriginname =time().'-'.strtolower(preg_replace('/\s+/', '-', $file->getClientOriginalName()));
            $filename = $request->file('image')->storeAs('images/sectors', $fileoriginname,'public');
            $item->image = $filename;
        }
        $item->translateOrNew('en')->slug = Str::slug(strip_tags($request['title_en']));
        $item->translateOrNew('ar')->slug = str_replace(' ', '-', strip_tags($request['title_ar']));;
        $item->translateOrNew('en')->title =  strip_tags($request['title_en']);
        $item->translateOrNew('ar')->title =  strip_tags($request['title_ar']);
        $item->translateOrNew('en')->description =  strip_tags($request['description_en']);
        $item->translateOrNew('ar')->description =  strip_tags($request['description_ar']);
        $item->translateOrNew('en')->content =  strip_tags($request['content_en']);
        $item->translateOrNew('ar')->content =  strip_tags($request['content_ar']);
        $item->save();
        return redirect()->route('sectors.index')->with('success', 'Added Successfully');
    }

    public function edit(Sector $sector)
    {
        $parents = Sector::whereNull('parent_id')->get();
        return view('admin.sectors.edit',['parents'=>$parents , 'item'=>$sector]);
    }
    public function update(SectorRequest $request , Sector $sector)
    {
        $sector->parent_id = $request->parent_id;
        $sector->is_active = $request->is_active ?? 0;
        $sector->sort = $request->sort;
        $sector->link = $request->link;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $fileoriginname =time().'-'.strtolower(preg_replace('/\s+/', '-', $file->getClientOriginalName()));
            $filename = $request->file('image')->storeAs('images/sectors', $fileoriginname,'public');
            $sector->image = $filename;
        }
        $sector->translateOrNew('en')->slug = Str::slug(strip_tags($request['title_en']));
        $sector->translateOrNew('ar')->slug = str_replace(' ', '-', strip_tags($request['title_ar']));;
        $sector->translateOrNew('en')->title =  strip_tags($request['title_en']);
        $sector->translateOrNew('ar')->title =  strip_tags($request['title_ar']);
        $sector->translateOrNew('en')->description =  strip_tags($request['description_en']);
        $sector->translateOrNew('ar')->description =  strip_tags($request['description_ar']);
        $sector->translateOrNew('en')->content =  strip_tags($request['content_en']);
        $sector->translateOrNew('ar')->content =  strip_tags($request['content_ar']);
        $sector->save();
        return redirect()->route('sectors.index')->with('success', 'updated Successfully');
    }
    public function destroy(Sector $sector)
    {
        $childrens = Sector::where('parent_id' ,$sector->id)->update(['parent_id'=>Null]);
        $sector->deleteTranslations();
        $sector->delete();
        return redirect()->route('sectors.index')->with('success', 'deleted Successfully');
    }
}
