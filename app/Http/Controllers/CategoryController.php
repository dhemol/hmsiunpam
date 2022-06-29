<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('dashboard/category/home', [
            "categories" => Category::all()
        ]);
    }

    public function index()
    {
        // Route Category
        return view('/dashboard/category/index', [
            "categories" => Category::all(),
            "title" => "Category | HMSI UNPAM"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Route Category Create
        return view('/dashboard/category/create', [
            "title" => "Category Create | HMSI UNPAM"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        // Route Category Store
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'required|string|max:100|unique:categories',
        ]);
        Category::create($validatedData);

        return redirect('/dashboard/category')->with('success', 'Category has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // Route Category Show
        return view('/dashboard/category/show', [
            "category" => $category,
            "title" => "Category Show | HMSI UNPAM"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // Route Category Edit
        return view('/dashboard/category/edit', [
            "category" => $category,
            "title" => "Category Edit | HMSI UNPAM"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // Route Category Update
        $rules = [
            'name' => 'required|string|max:100',
        ];

        if ($request->slug != $category->slug) {

            $rules['slug'] = 'required|unique:events';
        }

        $validatedData = $request->validate($rules);

        $category->update($validatedData);
        return redirect('/dashboard/category')->with('success', 'Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // Route Category Destroy
        Category::destroy($category->id);

        return redirect('/dashboard/category')->with('success', 'Category has been deleted');
    }
}
