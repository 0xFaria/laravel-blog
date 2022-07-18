<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Models\Category;
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

Route::get('/', [PostController::class, "index"])->name("home");

    // return view('posts', [
    //     "posts" => Post::all()
    // ]););

Route::get("posts/{post:slug}", [PostController::class, "show"]); // posso fazer uma validacao com regex do que vai ser recebido no wildcard
//. whereAlpha(), whereNumber() alguns helpers pra nao ter q escrever regex

Route::get("categories/{category:slug}", function (Category $category) {
    return view("posts", [
        "posts" => $category->posts,
        "currentCategory" => $category,
        "categories" => Category::all()
    ]);
});

Route::get("authors/{author:username}", function (User $author) {
    return view("posts", [
        "posts" => $author->posts,
        "categories" => Category::all()
    ]);
});
