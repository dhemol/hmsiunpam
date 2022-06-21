<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Admin;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Route Post
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = Admin::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view(
            '/dashboard.post.index',
            [
                "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString(),
                "title" => "Blog | HMSI UNPAM" . $title,
                "active" => "Blog | HMSI UNPAM"
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Route Tambah Post
        return view('/dashboard.post.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // Route Simpan Post
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validatedData);

        return redirect('/dashboard/post')->with('success', 'New Post Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // Route Post
        return view('/dashboard.post.show', [
            "title" => "Blog's Detail",
            "post" => $post,
            "active" => "Blog's Detail | HMSI UNPAM"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // Route Edit Post
        return view('/dashboard.post.edit', [
            "post" => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // Route Update Post
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            if ($request->old_image) {
                Storage::delete($request->old_image);
            }
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::where('id', $post->id)->update($validatedData);
        return redirect('/dashboard/post')->with('success', 'Post Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Route Hapus Post
        if ($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);

        return redirect('/dashboard/post')->with('success', 'Post Has Been Deleted');
    }
}
