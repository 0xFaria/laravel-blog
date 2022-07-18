<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

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

        return view("posts", [
            "posts" => Post::latest()->filter(request(["search"]))->get(),
                "categories" => Category::all()
            ]);
    }



    public function show(Post $post) {
            // wildcard route  parametro dinamico passado na rota
//    Post::where("slug",$post)->first();
            // find a post by its slug and pass it to a view called "post

//    $post = Post::findOrFail($id);

            return view("post", [
                "post" => $post
            ]);
        }

 }
