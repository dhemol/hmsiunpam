<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ContactController;
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
// Route Data Anggota
Route::resource('/dashboard/member', MemberController::class)->middleware('auth');
// Route Data Arsip
// Route::resource('/dashboard/arsip', ArsipController::class)->middleware('auth');
// Route Data Agenda
Route::get('/dashboard/event', [EventController::class, 'index'])->middleware('auth');
Route::post('/dashboard/eventAjax', [EventController::class, 'ajax'])->middleware('auth');

// Route Data Konten
// Route Data Post
Route::resource('/dashboard/post', PostController::class)->middleware('auth');
// // Route Data Event
// Route::resource('/dashboard/event', EventController::class)->middleware('auth');
// // Route Data About
// Route::resource('/dashboard/about', AboutController::class)->middleware('auth');
// // Route Data FAQ
// Route::resource('/dashboard/faq', FaqController::class)->middleware('auth');
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
