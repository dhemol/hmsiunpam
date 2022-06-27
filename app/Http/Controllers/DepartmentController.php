<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use App\Models\Field;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard/department/index', [
            "departments" => Department::all(),
            "fields" => Field::all(),
            "users" => User::all(),
            "title" => "Department | HMSI UNPAM"
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
        return view('dashboard/department/create', [
            "departments" => Department::all(),
            "fields" => Field::all(),
            "title" => "Department | HMSI UNPAM"
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
            'slug' => 'required|string|max:255|unique:departments',
            'field_id' => 'required'
        ]);

        Department::create($validatedData);

        return redirect('/dashboard/department')->with('success', 'Department has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
        return view('dashboard/department/show', [
            "department" => $department,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
        return view('dashboard/department/edit', [
            "department" => $department,
            "fields" => Field::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        //
        $rules = [
            'name' => 'required|string|max:255',
            'field_id' => 'required'
        ];

        if ($request->slug != $department->slug) {

            $rules['slug'] = 'required|unique:departments';
        }

        $validatedData = $request->validate($rules);
        $department->update($validatedData);
        return redirect('/dashboard/department')->with('success', 'Department has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
        Department::destroy($department->id);

        return redirect('/dashboard/department')->with('success', 'Department has been deleted');
    }
}
