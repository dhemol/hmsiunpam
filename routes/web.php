<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FaqController;
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

// Homepage PagesController
Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/visimisi', 'visimisi');
    Route::get('/struktural', 'struktural');
    Route::get('/event', 'event');
    Route::get('/post', 'post');
    Route::get('/post/{posts:slug}', 'show');
    Route::post('/post/{posts:slug}', 'comments');
    Route::delete('/post/{posts:slug}/{comments:id}', 'destroyComment');
    Route::get('/category', 'categories');
    Route::get('/category/{categories:slug}', 'category');
    Route::get('/author/{author:username}', 'author');
    Route::get('/faq', 'faq');
    Route::get('/contact', 'contact');
    Route::post('/contact', 'submitcontact');
    Route::get('/dashboard', 'index')->middleware('auth');
    Route::get('/dashboard', 'anggota')->middleware('auth');
    Route::get('/dashboard/profile/{superadmin:username}', 'profileSuperadmin')->middleware('auth');
    Route::get('/dashboard/profile/{admin:username}', 'profileAdmin')->middleware('auth');
    Route::get('/dashboard/profile/{anggota:username}', 'profileAnggota')->middleware('auth');
});


// Homepage AdminController
Route::controller(AdminController::class)->group(function () {
    Route::resource('/dashboard/admin', AdminController::class)->middleware('can:superadmin');
    Route::get('/dashboard/admin/{field:slug}', 'field')->middleware('can:superadmin');
    Route::get('/dashboard/admin/{department:slug}', 'department')->middleware('can:superadmin');
    Route::get('/dashboard/admin/{position:slug}', 'position')->middleware('can:superadmin');
    Route::get('/dashboard/adminPDF', 'export')->middleware('can:superadmin');
});

// Homepage ArchiveController
Route::controller(ArchiveController::class)->group(function () {
    Route::resource('/dashboard/archive', ArchiveController::class)->middleware('can:admin');
    Route::get('/download', 'download')->middleware('can:admin');
});

// Homepage ContactController
Route::controller(ContactController::class)->group(function () {
    Route::resource('/dashboard/contact', ContactController::class)->except(['edit'])->middleware('can:admin');
});

// Homepage FieldController
Route::controller(FieldController::class)->group(function () {
    Route::resource('/dashboard/field', FieldController::class)->except('show')->middleware('can:admin');
});

// Homepage DepartmentController
Route::controller(DepartmentController::class)->group(function () {
    Route::resource('/dashboard/department', DepartmentController::class)->except('show')->middleware('can:admin');
});

// Homepage PositionController
Route::controller(PositionController::class)->group(function () {
    Route::resource('/dashboard/position', PositionController::class)->except('show')->middleware('can:admin');
});

// Homepage MemberController
Route::controller(MemberController::class)->group(function () {
    Route::resource('/dashboard/member', MemberController::class)->middleware('can:admin');
    Route::get('/dashboard/member/{field:slug}', 'field')->middleware('can:admin');
    Route::get('/dashboard/member/{department:slug}', 'department')->middleware('can:admin');
    Route::get('/dashboard/member/{position:slug}', 'position')->middleware('can:admin');
    Route::get('/dashboard/memberPDF', 'export')->middleware('can:admin');
});

// select2
// Route::get('/fields', [FieldController::class, 'select'])->name('fields.select');
Route::get('/departments', [DepartmentController::class, 'select']);

// Data Konten
// Homepage PostController
Route::controller(PostController::class)->group(function () {
    Route::resource('/dashboard/post', PostController::class)->middleware('auth');
    Route::get('/dashboard/blog', 'home')->middleware('auth');
});
// Homepage EventController
Route::controller(EventController::class)->group(function () {
    Route::get('/dashboard/agenda', 'home')->middleware('auth');
    Route::resource('/dashboard/event', EventController::class)->middleware('can:admin');
    Route::get('/dashboard/eventPDF', 'export')->middleware('can:admin');
});
// Homepage CategoryController
Route::controller(CategoryController::class)->group(function () {
    Route::get('/dashboard/kategori', 'home')->middleware('auth');
    Route::resource('/dashboard/category', CategoryController::class)->except('show')->middleware('can:admin');
});
// Homepage AboutController
Route::controller(AboutController::class)->group(function () {
    Route::resource('/dashboard/about', AboutController::class)->middleware('can:admin');
});
// Homepage FaqController
Route::controller(FaqController::class)->group(function () {
    Route::resource('/dashboard/faq', FaqController::class)->except('show')->middleware('can:admin');
});

// Homepage LoginController
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});

// Homepage RegisterController
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'create')->middleware('guest');
    Route::post('/register', 'store');
});
