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
use App\Models\Position;
use App\Models\FIeld;
use App\Models\Department;
use App\Models\Contact;

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
            "pengurus" => User::where('role', 'admin')->filter(request(['searchAdmin', 'field', 'department', 'position']))->get(),
            "events" => Event::with(['category'])->get(),
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

    public function submitcontact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'message' => 'required'
        ]);
        $data = $request->all();
        $data['created_at'] = now();
        $data['updated_at'] = now();
        Contact::create($data);
        return redirect()->back()->with('success', 'Message Sent');
    }

    // Route Dashboard
    public function index()
    {
        return view('dashboard.index', [
            "anggota" => User::where('role', 'anggota')->latest()->filter(request(['field', 'department', 'position']))->paginate(5)->withQueryString(),
            "pengurus" => User::where('role', 'admin')->with(['field', 'department', 'position'])->get(),
            "archives" => Archive::all(),
            "contacts" => Contact::all(),
            "post" => Post::all(),
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(5)->withQueryString(),

        ]);
    }

    public function profileSuperadmin(User $superadmin)
    {
        return view('dashboard/profile/profileSuperadmin', [
            "superadmin" => $superadmin,
            'fields' => Field::all(),
            'departments' => Department::all(),
            'positions' => Position::all(),
        ]);
    }
    public function profileAdmin(User $admin)
    {
        return view('dashboard/profile/profileAdmin', [
            "admin" => $admin,
            'fields' => Field::all(),
            'departments' => Department::all(),
            'positions' => Position::all(),
        ]);
    }
    public function profileAnggota(User $anggota)
    {
        return view('dashboard/profile/profileAnggota', [
            "anggota" => $anggota,
            'fields' => Field::all(),
            'departments' => Department::all(),
            'positions' => Position::all(),
        ]);
    }
}
