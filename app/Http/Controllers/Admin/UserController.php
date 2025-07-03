<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = User::all();
        return view('admin.users.list',get_defined_vars());
    }

    public function create()
    {
        return view('admin.users.create');
    }
    public function store(UserRequest $request)
    {
        $item = new User();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = Hash::make($request->password);
        $item->save();
        return redirect()->route('users.index')->with('success', 'Added Successfully');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit',['item'=>$user]);
    }
    public function update(UserUpdateRequest $request , User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('users.index')->with('success', 'updated Successfully');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'deleted Successfully');
    }
}
