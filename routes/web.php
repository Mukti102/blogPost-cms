<?php

use App\Http\Controllers\blogsController;
use App\Http\Controllers\DashboardBlogsController;
use App\Http\Controllers\DashboardCategory;
use App\Http\Controllers\DetailUserController;
use App\Http\Controllers\EditorControllerUpload;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\usersPostController;
use App\Models\Blogs;
use App\Models\Category;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// auth middleware
Route::group(['middleware' => ["web", "auth"]], function () {
    Route::group(['middleware' => 'isAdmin'], function () {
        Route::resource('/dashboard/userPosts', usersPostController::class);
        Route::resource('/dashboard/category', DashboardCategory::class);
        Route::resource('setting', SettingController::class)->name('index', 'setting');
        Route::resource('Questions', QuestionController::class);
        Route::delete('Question/{id}', [QuestionController::class, 'destroyquest']);
        Route::put('/dashboard/users/switch/{user}', [UsersController::class, 'switchRole']);
        Route::put('/dashboard/userPosts/publish/{blog}', [DashboardBlogsController::class, 'publish']);
    });
    Route::resource('/dashboard/blogs', DashboardBlogsController::class);
    Route::get('/dashboard', function () {
        $blogs = Blogs::where('user_id', auth()->user()->id)->get();
        return view('dashboard.home', [
            'allBlogs' => $blogs,
            'unpublished' => $blogs->where('status', 0)->count(),
            'published' => $blogs->where('status', 1)->count()
        ]);
    });
    Route::resource('/dashboard/users', UsersController::class);
    Route::get('/dashboard/{user:name}', function (User $user) {
        return view('dashboard.userDetail', [
            'user' => $user
        ]);
    });
});

Route::get('/', function () {
    $whatsApp = Settings::first();
    $blogs = Blogs::latest()->limit(3)->get();
    return view('home.index', ['whatsApp' => $whatsApp, 'blogs' => $blogs]);
});

Route::resource('/blogs', blogsController::class);
Route::get('/category/{category:slug}', function (Category $category) {
    return view('blogs.categories', [
        'title' => $category->name,
        'blogs' => $category->blogs,
        'whatsApp' => Settings::first()
    ]);
});
Route::resource('/login', LoginController::class);
Route::post('/logout', [LogoutController::class, 'logout']);
Route::post('/upload', [EditorControllerUpload::class, 'upload'])->name('upload');
Route::get('{user:name}', function (User $user) {
    $blogs = Blogs::where('user_id', $user->id)->latest()->get();
    return view('blogs.userDetail', [
        'user' => $user,
        'blogs' => $blogs,
        'whatsApp' => Settings::first()
    ]);
});
