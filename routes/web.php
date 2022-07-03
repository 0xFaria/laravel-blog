<?php

use Illuminate\Support\Facades\Route;

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
    return view('posts');
});

Route::get("posts/{post}", function ($slug) { // wildcard route  parametro dinamico passado na rota

    if (!file_exists($path = __DIR__ . "./../resources/posts/{$slug}.html")) {

        return redirect("/");
        // abort(404);   dump and die   quick debug  ddd() dump, die and debug
    }
    // evito ter q ler o arquivo toda vez a cada requisição
    $post = cache()->remember("posts.{$slug}", 3600, fn () =>  file_get_contents($path));


    return view("post", [
        "post" => $post
    ]);
})->where("post", "[A-z_\-]+"); // posso fazer uma validacao com regex do que vai ser recebido no wildcard
// -. whereAlpha(), whereNumber() alguns helpers pra nao ter q escrever regex
