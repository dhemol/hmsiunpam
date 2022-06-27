<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // Route Faq
        return view('/dashboard/faq/index', [
            "faqs" => Faq::all(),
            "title" => "Faq | HMSI UNPAM"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Route Faq Create
        return view('/dashboard/faq/create', [
            "faqs" => Faq::all(),
            "title" => "Faq Create | HMSI UNPAM"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFaqRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFaqRequest $request)
    {
        // Route Faq Store
        $validatedData = $request->validate([
            'question' => 'required|string|max:255',
            'slug' => 'required||unique:faqs',
            'answer' => 'required'
        ]);

        Faq::create($validatedData);

        return redirect('/dashboard/faq')->with('success', 'Faq has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        // Route Show Faq
        return view('/dashboard/faq/show', [
            "faq" => $faq,
            "title" => "Faq Show | HMSI UNPAM"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        // Route Edit Faq
        return view('/dashboard/faq/edit', [
            "faq" => $faq,
            "title" => "Faq Edit | HMSI UNPAM"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFaqRequest  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        // Route Faq Update
        $rules = [
            'question' => 'required|string|max:255',
            'answer' => 'required'
        ];

        if ($request->slug != $faq->slug) {

            $rules['slug'] = 'required|unique:faqs';
        }

        $validatedData = $request->validate($rules);
        $faq->update($validatedData);
        return redirect('/dashboard/faq')->with('success', 'Faq has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        // Route Faq Destroy
        Faq::destroy($faq->id);

        return redirect('/dashboard/faq')->with('success', 'Faq has been deleted');
    }
}
