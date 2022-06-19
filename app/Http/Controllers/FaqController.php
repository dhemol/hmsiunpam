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
        $faqs = Faq::all();
        return view('/dashboard.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Route Tambah Faq
        return view('/dashboard.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFaqRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFaqRequest $request)
    {
        // Route Store Faq
        $faq = new Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        return redirect('/dashboard/faq/index')->with('success', 'Data Berhasil Ditambahkan');
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
        return view('/dashboard.faq.show', compact('faq'));
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
        return view('/dashboard.faq.edit', compact('faq'));
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
        // Route Update Faq

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        return redirect('/dashboard.faq.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        // Route Delete Faq
        $faq->delete();
        return redirect('/dashboard.faq.index');
    }
}
