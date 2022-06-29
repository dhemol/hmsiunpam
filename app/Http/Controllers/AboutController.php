<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('/dashboard/about/index', [
            "abouts" => About::all(),
            "title" => "About | HMSI UNPAM"
        ]);
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
        $validatedData = $request->validate([
            'title' => 'required|string|max:50',
            'slug' =>  'required|string|unique:abouts',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        About::create($validatedData);

        return redirect('/dashboard/about')->with('success', 'About has been created');
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
        return view('/dashboard/about/show', [
            "about" => $about,
            "title" => "About Show | HMSI UNPAM"
        ]);
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
        return view('/dashboard/about/edit', [
            "about" => $about,
            "title" => "About Edit | HMSI UNPAM"
        ]);
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
        $rules = [
            'title' => 'required|string|max:50',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        if ($request->slug != $about->slug) {

            $rules['slug'] = 'required|unique:abouts';
        }

        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->old_image) {
                Storage::delete($request->old_image);
            }
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }
        $about->update($validatedData);
        return redirect('/dashboard/about')->with('success', 'About has been updated');
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
        if ($about->image) {
            Storage::delete($about->image);
        }
        About::destroy($about->id);

        return redirect('/dashboard/about')->with('success', 'About has been deleted');
    }
}
