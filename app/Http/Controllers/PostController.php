<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
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
    public function home()
    {
        // Route Post
        return view(
            '/dashboard.post.home',
            [
                "posts" => Post::where('user_id', auth()->id())->latest()->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString(),
                "title" => "Blog | HMSI UNPAM",
                "active" => "Blog | HMSI UNPAM"
            ]
        );
    }

    public function index()
    {
        // Route Post
        return view(
            '/dashboard.post.index',
            [
                "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString(),
                "title" => "Blog | HMSI UNPAM",
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
            'title' => 'required|max:100',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 50);

        if (Post::create($validatedData)->where('user_id', auth()->id())->exists()) {
            return redirect('/dashboard/blog')->with('success', 'Post berhasil ditambahkan');
        } else {
            return redirect('/dashboard/post')->with('success', 'Post Has Been Added');
        }
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
            'title' => 'required|max:100',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->old_image) {
                Storage::delete($request->old_image);
            }
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 50);

        Post::where('id', $post->id)->update($validatedData);
        return redirect('/dashboard/blog')->with('success', 'Post Has Been Updated');
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

        return redirect('/dashboard/blog')->with('success', 'Post Has Been Deleted');
    }
}
