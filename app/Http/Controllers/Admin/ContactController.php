<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Contact::all();
        return view('admin.contacts.list',get_defined_vars());
    }

    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit',['item'=>$contact]);
    }
    public function update(ContactRequest $request , Contact $contact)
    {
        $contact->is_active = $request->is_active ?? 0;
        $contact->save();
        return redirect()->route('contacts.index')->with('success', 'updated Successfully');
    }
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'deleted Successfully');
    }
}
