<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Route Contact
        return view('/dashboard/contact/index', [
            "contacts" => Contact::all(),
            "title" => "Contact | HMSI UNPAM"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Route Tambah Contact
        return view('/dashboard/contact/create', [
            "contacts" => Contact::all(),
            "title" => "Tambah Contact | HMSI UNPAM"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        // Route Store Contact
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email',
            'no_hp' => 'required|min:8|max:14|regex:/^[0-9]+$/',
            'subject' => 'required|string',
            'message' => 'required|text'
        ]);

        Contact::create($validatedData);
        return redirect('/dashboard/contact')->with('success', 'Contact has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        // Route Show Contact
        return view('/dashboard/contact/show', [
            "contact" => $contact,
            "title" => "Contact | HMSI UNPAM"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        // Route Edit Contact
        return view('/dashboard/contact/edit', [
            "contact" => $contact,
            "title" => "Edit Contact | HMSI UNPAM"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        // Route Update Contact
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email',
            'no_hp' => 'required|min:8|max:14|regex:/^[0-9]+$/',
            'subject' => 'required|string',
            'message' => 'required|text'
        ]);

        $contact->update($validatedData);
        return redirect('/dashboard/contact')->with('success', 'Contact has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        // Route Delete Contact
        $contact->delete($contact->id);
        return redirect('/dashboard/contact')->with('success', 'Contact has been deleted');
    }
}
