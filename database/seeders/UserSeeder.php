<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create()->each(function ($user){
            Post::factory(5)->create([
                "userId" => $user->id
            ])
            ->each(function ($post){
                Recipe::factory(rand(1,3))->create([
                    "postId" => $post->id
                ]);
            });
        });
    }
}
