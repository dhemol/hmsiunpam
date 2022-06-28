<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Archive;
use App\Models\Post;
use App\Models\Category;
use App\Models\Event;
use App\Models\About;
use App\Models\User;

class PagesController extends Controller
{
    // Route Home
    public function home()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('index', [

            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(2)->withQueryString(),
            "pengurus" => User::where('role', 'admin')->with(['field', 'department', 'position'])->get(),
            "events" => Event::latest()->filter(request(['searchEvent', 'category']))->get(),
            "title" => "Home | HMSI UNPAM" . $title,
            "active" => "Home | HMSI UNPAM"
        ]);
    }

    // Route About
    public function about()
    {
        return view('about', [
            "abouts" => About::all(),
            "title" => "About | HMSI UNPAM",
            "active" => "About | HMSI UNPAM"
        ]);
    }

    // Route Event
    public function event()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        return view('event', [
            "title" => "Event | HMSI UNPAM" . $title,
            "active" => "Event | HMSI UNPAM",
            "events" => Event::latest()->filter(request(['searchEvent', 'category']))->paginate(10)->withQueryString(),
        ]);
    }

    // Route Event
    public function post()
    {

        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('post', [
            "title" => "All Posts" . $title,
            "active" => "Blog | HMSI UNPAM",
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString(),
        ]);
    }

    public function show(Post $posts)
    {
        return view('post_detail', [
            "title" => "Blog | HMSI UNPAM",
            "active" => "Blog | HMSI UNPAM",
            "posts" => $posts->with('category', 'author')->first(),
        ]);
    }

    public function categories()
    {
        return view('category', [
            "title" => "All Categories",
            "active" => "Blog | HMSI UNPAM",
            "categories" => Category::all()
        ]);
    }

    public function category()
    {
        return view('category', [
            "title" => "All Categories",
            "active" => "Blog | HMSI UNPAM",
            "categories" => Category::all()
        ]);
    }

    // Route FAQ
    public function faq()
    {
        return view('faq', [
            "faqs" => Faq::all(),
            "categories" => Category::all(),
            "title" => "FAQ | HMSI UNPAM",
            "active" => "FAQ | HMSI UNPAM"

        ]);
    }

    // Route Contact
    public function contact()
    {

        return view('contact', [
            "title" => "Contact | HMSI UNPAM",
            "active" => "Contact | HMSI UNPAM"
        ]);
    }

    // Route Dashboard
    public function index()
    {
        return view('dashboard.index', [
            "anggota" => User::where('role', 'anggota')->get(),
            "pengurus" => User::where('role', 'admin')->get(),
            "archives" => Archive::all(),
            "posts" => Post::all(),

        ]);
    }
}
