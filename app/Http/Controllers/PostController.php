<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Admin;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

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
        return view('/dashboard.post.create');
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
        $post = new Post;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->slug = $request->slug;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->images = $request->images;
        $post->published_at = $request->published_at;
        $post->save();
        return redirect()->route('/dashboard.post.index')->with('success', 'Post berhasil ditambahkan');
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
            "title" => "Edit Post",
            "post" => $post
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
        $post->title = $request->title;
        $post->author = $request->author;
        $post->slug = $request->slug;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->images = $request->images;
        $post->published_at = $request->published_at;
        $post->save();
        return redirect()->route('/dashboard.post.index')->with('success', 'Post berhasil diubah');
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
        $post->delete();
        return redirect()->route('/dashboard.post.index')->with('success', 'Post berhasil dihapus');
    }
}
