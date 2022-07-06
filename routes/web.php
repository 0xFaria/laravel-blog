<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
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

Route::get('/', function () {
    // $posts = array_map(function ($file) {
    //     $document =  YamlFrontMatter::parseFile($file);
    //     return new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }, $files);


    // foreach ($files as $file) {
    //     $document =  YamlFrontMatter::parseFile($file);

    //     $posts[] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     );
    // }

    return view("posts", ["posts" => Post::all()]);


    // return view('posts', [
    //     "posts" => Post::all()
    // ]);

});

Route::get("posts/{post:slug}", function (Post $post) { // wildcard route  parametro dinamico passado na rota
//    Post::where("slug",$post)->first();
    // find a post by its slug and pass it to a view called "post

//    $post = Post::findOrFail($id);

    return view("post", [
        "post" => $post
    ]);
}); // posso fazer uma validacao com regex do que vai ser recebido no wildcard
//. whereAlpha(), whereNumber() alguns helpers pra nao ter q escrever regex
