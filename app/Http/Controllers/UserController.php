<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Recipe;

class UserController extends Controller
{
    public function index(){

        return view('home',
        [
            'latest_recipes' => Post::limit(10)->get()
        ]
        );
    }
    
    public function search(Request $request){

        return view('home',
        [
            'latest_recipes' => Post::where('title', 'LIKE', '%'.$request['searchPhrase'].'%')->limit(10)->get()
        ]
        );
    }

    public function getRecipe($postID){
        $post = Post::where('id', $postID)->with('recipes')->get()->first();

        $recipes = [];

        foreach($post->recipes as $recipe){
            $ingredients = explode('-', $recipe->ingredients);
            unset($ingredients[0]);
            $recipes[] = [
                'title' => $recipe->title,
                'ingredients' => $ingredients
            ];
        }

        // dd($recipes);
        return view('post', [
            'post' => $post,
            'recipes' => $recipes,
        ]);
    }
}
