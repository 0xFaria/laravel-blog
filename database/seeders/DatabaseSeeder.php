<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        só nao preciso usar o truncate se eu tiver feito o migrate fresh sempre antes de fazer o seed
//         especifica oq pode usar coisas aleatorias, exceto oq eu colocar aqui
//        User::factory()->create([
//            "name" => "John doe"
//        ]);
         Post::factory(5)->create();

//        User::truncate();
//        Post::truncate();
//        Category::truncate();
//        $user =  \App\Models\User::factory()->create();
//
//         $personal =  Category::create([
//             "name" => "Personal",
//             "slug" => "personal"
//         ]);
//
//        $family =Category::create([
//            "name" => "Family",
//            "slug" => "family"
//        ]);
//
//       $work =  Category::create([
//            "name" => "Work",
//            "slug" => "work"
//        ]);
//
//        Post::create([
//            "user_id" => $user->id,
//            "category_id"=> $personal->id,
//            "title" => "My Family Post",
//            "slug" => "my-first-post",
//            "excerpt" => "Lorem ipsum dolar sit amet.",
//            "body" => "<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, </p>"
//        ]);
//
//        Post::create([
//            "user_id" => $user->id,
//            "category_id"=> $family->id,
//            "title" => "My Family Post",
//            "slug" => "my-first-post",
//            "excerpt" => "Lorem ipsum dolar sit amet.",
//            "body" => "<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, </p>"
//        ]);
//
//        Post::create([
//            "user_id" => $user->id,
//            "category_id"=> $work->id,
//            "title" => "My Family Post",
//            "slug" => "my-first-post",
//            "excerpt" => "Lorem ipsum dolar sit amet.",
//            "body" => "<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words,</p>"
//        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
