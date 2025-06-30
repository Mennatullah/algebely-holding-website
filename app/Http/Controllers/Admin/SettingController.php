<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Setting::all();
        return view('admin.settings.list',get_defined_vars());
    }

    public function create()
    {
        return view('admin.settings.create');
    }
    public function store(SettingRequest $request)
    {
        $item = new Setting();
        $item->key = $request->key;
        $item->value = $request->value;
        $item->is_active = $request->is_active ?? 0;
        $item->save();
        return redirect()->route('settings.index')->with('success', 'Added Successfully');
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit',['item'=>$setting]);
    }
    public function update(SettingRequest $request , Setting $setting)
    {
        $setting->key = $request->key;
        $setting->value = $request->value;
        $setting->is_active = $request->is_active ?? 0;
        $setting->save();
        return redirect()->route('settings.index')->with('success', 'updated Successfully');
    }
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->route('settings.index')->with('success', 'deleted Successfully');
    }
}
