<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Response;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('/dashboard/archive/index', [
            "archives" => Archive::all(),
            "title" => "Archive | HMSI UNPAM"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/dashboard/archive/create', [
            "archive" => new Archive,
            "title" => "Archive Create | HMSI UNPAM"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|string|max:50',
            'slug' => 'required||unique:archives',
            'perihal' => 'required',
            'nomor_surat' => 'required',
            'type' => 'required',
            'file' => 'required|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,zip,rar,7z'
        ]);
        $validatedData['file'] = $request->file('file')->store('Archives', 'public');
        Archive::create($validatedData);

        return redirect('/dashboard/archive')->with('success', 'Faq has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function show(Archive $archive)
    {
        //
        return view('/dashboard/archive/show', [
            "archive" => $archive,
            "title" => "Archive | HMSI UNPAM"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function edit(Archive $archive)
    {
        //
        return view('/dashboard/archive/edit', [
            "archive" => $archive,
            "title" => "Archive Edit | HMSI UNPAM"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archive $archive)
    {
        //
        $rules = [
            'title' => 'required|string|max:50',
            'perihal' => 'required',
            'nomor_surat' => 'required',
            'type' => 'required',
            'file' => 'required|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,zip,rar,7z'
        ];

        if ($request->slug != $archive->slug) {

            $rules['slug'] = 'required|unique:archives';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('file')) {
            if ($request->old_file) {
                Storage::delete($request->old_file);
            }
            $validatedData['file'] = $request->file('file')->store('Archives', 'public');
        }

        $archive->update($validatedData);
        return redirect('/dashboard/archive')->with('success', 'Archive has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archive $archive)
    {
        //
        if ($archive->file) {
            Storage::delete($archive->file);
        }
        Archive::destroy($archive->id);

        return redirect('/dashboard/archive')->with('success', 'Archive Has Been Deleted');
    }
}
