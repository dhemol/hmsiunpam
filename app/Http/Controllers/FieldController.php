<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard/field/index', [
            "fields" => Field::all(),
            "departments" => Department::count(),
            "users" => User::count(),
            "title" => "Field | HMSI UNPAM"
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
        return view('dashboard/field/create', [
            'departments' => Department::all()
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
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:fields',

        ]);

        Field::create($validatedData);

        return redirect('/dashboard/field')->with('success', 'Field has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Field $field)
    {
        //
        return view('dashboard/field/show', [
            "field" => $field,
            "departments" => Department::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit(Field $field)
    {
        //
        return view('dashboard/field/edit', [
            "field" => $field,
            "departments" => Department::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Field $field)
    {
        //
        $rules = [
            'name' => 'required|string|max:255',
        ];

        if ($request->slug != $field->slug) {

            $rules['slug'] = 'required|unique:fields';
        }

        $validatedData = $request->validate($rules);
        $field->update($validatedData);
        return redirect('/dashboard/field')->with('success', 'Field has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(Field $field)
    {
        //
        Field::destroy($field->id);

        return redirect('/dashboard/field')->with('success', 'Field has been deleted');
    }

    public function select(Request $request)
    {
        $fields = [];
        if ($request->has('q')) {
            $search = $request->q;
            $fields = Field::select('id', 'name')->where('name', 'like', '%' . $search . '%')->get();
        } else {
            $fields = Field::limit(10)->get();
        }
        return response()->json($fields);
    }
}
