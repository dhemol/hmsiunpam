<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Route About
        $abouts = About::all();
        return view('/dashboard.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Route Tambah About
        return view('/dashboard.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAboutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAboutRequest $request)
    {
        // Route Store About
        $about = new About;
        $about->title = $request->title;
        $about->description = $request->description;
        $about->image = $request->image;
        $about->save();
        return redirect('/dashboard/about/index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        // Route Show About
        return view('/dashboard.about.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        // Route Edit About
        return view('/dashboard.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAboutRequest  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutRequest $request, About $about)
    {
        // Route Update About
        $about->title = $request->title;
        $about->description = $request->description;
        $about->image = $request->image;
        $about->save();
        return redirect('/dashboard/about/index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        // Route Hapus About
        $about->delete();
        return redirect('/dashboard/about/index')->with('success', 'Data Berhasil Dihapus');
    }
}
