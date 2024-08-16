<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //Read method
    public function index(Request $request)
    {

        //sort 
        $sort = $request->sort;
        if ($sort == "name") {
            $contact = Contact::orderBy('name', 'ASC')->get();
        } elseif ($sort == "date") {
            $contact = Contact::orderBy('created_at', 'DESC')->get();
        } else {
            $contact = Contact::all();
        }
        
        //search
        $search = $request->search;
        if ($search) {
            $contact = Contact::where('name', 'Like', '%' . $search . '%')
                ->orWhere('email', 'Like', '%' . $search . '%')->get();
        }

        return view('contact.index', compact('contact'));
    }

    //Create method
    public function create()
    {
        return view('contact.create');
    }

    //Store method
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->save();
        return redirect()->route('contacts.index')->with('success', 'Contact Create Successfully...');
    }

    //Show method
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contact.show', compact('contact'));
    }

    //Edit method
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contact.edit', compact('contact'));
    }

    //Update method
    public function update(Request $request, $id)
    {

        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->save();
        return redirect()->route('contacts.index')->with('success', 'Contact Updated Successfully...');
    }

    //Delete method
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact Deleted Successfully...');
    }
}
