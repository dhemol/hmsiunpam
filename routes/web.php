<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Ini adalah Route yang mengarahkan ke view Tampilan Umum

//Halaman Tampilan Umum 
Route::get('/', [PagesController::class, 'home']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/event', [PagesController::class, 'event']);
Route::get('/post', [PagesController::class, 'post']);
Route::get('/post/{posts:slug}', [PagesController::class, 'show']);
Route::get('/category', [PagesController::class, 'categories']);
Route::get('/category/{category:slug}', [PagesController::class, 'category']);
Route::get('/author/{author:username}', [PagesController::class, 'author']);
Route::get('/faq', [PagesController::class, 'faq']);
Route::get('/contact', [PagesController::class, 'contact']);

// Ini adalah Route yang mengarahkan ke view Dashboard
// Route Dashboard
Route::get('/dashboard', [PagesController::class, 'index'])->middleware('auth');
// Route Data Admin
Route::resource('/dashboard/admin', AdminController::class)->middleware('can:superadmin');
Route::get('/dashboard/admin/{status:slug}', [AdminController::class, 'status'])->middleware('can:superadmin');
Route::get('/dashboard/admin/{role:slug}', [AdminController::class, 'role'])->middleware('can:superadmin');
Route::get('/dashboard/admin/{field:slug}', [AdminController::class, 'field'])->middleware('can:superadmin');
Route::get('/dashboard/admin/{department:slug}', [AdminController::class, 'department'])->middleware('can:superadmin');
Route::get('/dashboard/adminPDF', [AdminController::class, 'export'])->middleware('can:superadmin');

// Route Data Field (Bidang)
Route::resource('/dashboard/field', FieldController::class)->except('show')->middleware('can:admin');

// Route Data Department
Route::resource('/dashboard/department', DepartmentController::class)->except('show')->middleware('can:admin');

// Route Data Anggota
Route::resource('/dashboard/member', MemberController::class)->middleware('can:admin');
Route::get('/dashboard/member/{status:slug}', [MemberController::class, 'status'])->middleware('can:admin');
Route::get('/dashboard/member/{role:slug}', [MemberController::class, 'role'])->middleware('can:admin');
Route::get('/dashboard/member/{field:slug}', [MemberController::class, 'field'])->middleware('can:admin');
Route::get('/dashboard/member/{department:slug}', [MemberController::class, 'department'])->middleware('can:admin');
Route::get('/dashboard/memberPDF', [MemberController::class, 'export'])->middleware('can:admin');

// Route Data Arsip
Route::get('/download', [ArchiveController::class, 'download'])->middleware('can:admin');
Route::resource('/dashboard/archive', ArchiveController::class)->middleware('can:admin');

// Route Data Agenda
Route::get('/dashboard/agenda', [EventController::class, 'home'])->middleware('auth');
Route::resource('/dashboard/event', EventController::class)->middleware('can:admin');
Route::get('/dashboard/eventPDF', [EventController::class, 'export'])->middleware('can:admin');

// Route Data Konten
// Route Data Post
Route::resource('/dashboard/post', PostController::class)->middleware('auth');

// Route Data Kategori
Route::get('/dashboard/kategori', [CategoryController::class, 'home'])->middleware('auth');
Route::resource('/dashboard/category', CategoryController::class)->except('show')->middleware('can:admin');

// // Route Data About
Route::resource('/dashboard/about', AboutController::class)->middleware('can:admin');

// Route Data FAQ
Route::resource('/dashboard/faq', FaqController::class)->except('show')->middleware('can:admin');

// // Route Data Contact
// Route::resource('/dashboard/contact', ContactController::class)->middleware('auth');
// // Route Data Galeri
// Route::resource('/dashboard/galeri', GaleriController::class)->middleware('auth');

// Ini adalah Route yang mengarahkan ke view Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Ini adalah Route yang mengarahkan ke view Register
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
