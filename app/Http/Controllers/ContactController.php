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
        $contacts = Contact::all();
        return view('/dashboard.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Route Tambah Contact
        return view('/dashboard.contact.create');
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
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->no_hp = $request->no_hp;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return redirect('/dashboard/contact/index')->with('success', 'Data Berhasil Ditambahkan');
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
        return view('/dashboard.contact.show', compact('contact'));
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
        return view('/dashboard.contact.edit', compact('contact'));
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
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->no_hp = $request->no_hp;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return redirect('/dashboard/contact/index')->with('success', 'Data Berhasil Diubah');
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
        $contact->delete();
        return redirect('/dashboard/contact/index')->with('success', 'Data Berhasil Dihapus');
    }
}
