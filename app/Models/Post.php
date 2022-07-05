<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
        return cache()->rememberForever("posts.all", function () {
            return collect(File::files(resource_path("posts")))
                // collect an array adn wrapped in a collection
                ->map(fn ($file)  => YamlFrontMatter::parseFile($file))
                ->map(
                    fn ($document) => new Post(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                        $document->slug
                    )
                )
                ->sortByDesc("date"); // sort the results

        });


        // $files =  File::files(resource_path("posts/"));

        // return array_map(function ($file) {
        //     return $file->getContents();
        // }, $files);
    }



    public static function find($slug)
    {
        // acessar metodo estatico da propria classe
        return static::all()->firstWhere("slug", $slug);

        // if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
        //     throw new ModelNotFoundException(); // model not found
        //     // return redirect("/");  model n tem a responsabilidade de redirecionar
        //     // abort(404);   dump and die   quick debug  ddd() dump, die and debug
        // }
        // // evito ter q ler o arquivo toda vez a cada requisição
        // // olha o key unico, se tiver em cache, já retorna, se nao, executa a função e dps armazena
        // return cache()->remember("posts.{$slug}", 3600, fn () =>  file_get_contents($path));
    }


    public static function findOrFail($slug)
    {
        // acessar metodo estatico da propria classe
        $post = static::find($slug);

        if (!$post) {
            throw new ModelNotFoundException();
        }
    }
}
