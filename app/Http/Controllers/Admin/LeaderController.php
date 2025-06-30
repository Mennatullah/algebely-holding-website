<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;

class LeaderController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Menu::all();
        return view('admin.menus.list',get_defined_vars());
    }

    public function create()
    {
        $parents = Menu::whereNull('parent_id')->get();
        return view('admin.menus.create',get_defined_vars());
    }
    public function store(MenuRequest $request)
    {
        $item = new Menu();
        $item->parent_id = $request->parent_id;
        $item->is_active = $request->is_active ?? 0;
        $item->sort = $request->sort;
        $item->translateOrNew('en')->title =  strip_tags($request['title_en']);
        $item->translateOrNew('ar')->title =  strip_tags($request['title_ar']);
        $item->save();
        return redirect()->route('menus.index')->with('success', 'Added Successfully');
    }

    public function edit(Menu $menu)
    {
        $parents = Menu::whereNull('parent_id')->get();
        return view('admin.menus.edit',['parents'=>$parents , 'item'=>$menu]);
    }
    public function update(MenuRequest $request , Menu $menu)
    {
        $menu->parent_id = $request->parent_id;
        $menu->is_active = $request->is_active ?? 0;
        $menu->sort = $request->sort;
        $menu->translateOrNew('en')->title =  strip_tags($request['title_en']);
        $menu->translateOrNew('ar')->title =  strip_tags($request['title_ar']);
        $menu->save();
        return redirect()->route('menus.index')->with('success', 'updated Successfully');
    }
    public function destroy(Menu $menu)
    {
        $childrens = Menu::where('parent_id' ,$menu->id)->update(['parent_id'=>Null]);
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'deleted Successfully');
    }
}
