<?php

namespace App\Http\Controllers\Admin;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Page::all();
        return view('admin.pages.list',get_defined_vars());
    }

    public function create()
    {
        $parents = Page::whereNull('parent_id')->get();
        return view('admin.pages.create',get_defined_vars());
    }
    public function store(PageRequest $request)
    {
        $item = new Page();
        $item->parent_id = $request->parent_id;
        $item->is_active = $request->is_active ?? 0;
        $item->sort = $request->sort;
        $item->translateOrNew('en')->slug = Str::slug(strip_tags($request['title_en']));
        $item->translateOrNew('ar')->slug = str_replace(' ', '-', strip_tags($request['title_ar']));;
        $item->translateOrNew('en')->title =  strip_tags($request['title_en']);
        $item->translateOrNew('ar')->title =  strip_tags($request['title_ar']);
        $item->translateOrNew('en')->description =  strip_tags($request['description_en']);
        $item->translateOrNew('ar')->description =  strip_tags($request['description_ar']);
        $item->translateOrNew('en')->content =  strip_tags($request['content_en']);
        $item->translateOrNew('ar')->content =  strip_tags($request['content_ar']);
        $item->save();
        return redirect()->route('pages.index')->with('success', 'Added Successfully');
    }

    public function edit(Page $page)
    {
        $parents = Page::whereNull('parent_id')->get();
        return view('admin.pages.edit',['parents'=>$parents , 'item'=>$page]);
    }
    public function update(PageRequest $request , Page $page)
    {
        $page->parent_id = $request->parent_id;
        $page->is_active = $request->is_active ?? 0;
        $page->sort = $request->sort;
        $page->translateOrNew('en')->slug = Str::slug(strip_tags($request['title_en']));
        $page->translateOrNew('ar')->slug = str_replace(' ', '-', strip_tags($request['title_ar']));;
        $page->translateOrNew('en')->title =  strip_tags($request['title_en']);
        $page->translateOrNew('ar')->title =  strip_tags($request['title_ar']);
        $page->translateOrNew('en')->description =  strip_tags($request['description_en']);
        $page->translateOrNew('ar')->description =  strip_tags($request['description_ar']);
        $page->translateOrNew('en')->content =  strip_tags($request['content_en']);
        $page->translateOrNew('ar')->content =  strip_tags($request['content_ar']);
        $page->save();
        return redirect()->route('pages.index')->with('success', 'updated Successfully');
    }
    public function destroy(Page $page)
    {
        $childrens = Page::where('parent_id' ,$page->id)->update(['parent_id'=>Null]);
        $page->deleteTranslations();
        $page->delete();
        return redirect()->route('pages.index')->with('success', 'deleted Successfully');
    }
}
