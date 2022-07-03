<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }



    public static function all()
    {
        $files =  File::files(resource_path("posts/"));

        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
    }



    public static function find($slug)
    {
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException(); // model not found
            // return redirect("/");  model n tem a responsabilidade de redirecionar
            // abort(404);   dump and die   quick debug  ddd() dump, die and debug
        }
        // evito ter q ler o arquivo toda vez a cada requisição
        return cache()->remember("posts.{$slug}", 3600, fn () =>  file_get_contents($path));
    }
}
