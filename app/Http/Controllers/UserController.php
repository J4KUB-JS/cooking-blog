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
        ]);
    }

    public function apiIndex(){
        $getAll = request('all');
        if($getAll == 1){
            return [
                'count' => sizeof(Post::all()),
                'latest_recipes' => Post::all()
            ];
        }else{
            return [
                'count' => sizeof(Post::paginate(10)),
                'latest_recipes' => Post::paginate(10)
            ];
        }
    }
    
    public function search(Request $request){

        return view('home',
        [
            'latest_recipes' => Post::where('title', 'LIKE', '%'.$request['searchPhrase'].'%')->limit(10)->get()
        ]
        );
    }

    public function apiSearch(){
        $temp = Post::where('title', 'LIKE', '%'.request('searchPhrase').'%')->limit(10)->get();
        return [
            'count' => sizeof($temp),
            'recipes' => $temp
        ];
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

        return view('post', [
            'post' => $post,
            'recipes' => $recipes,
        ]);
    }

    public function apiGetRecipe($postID){
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

        return [
            'post' => $post,
            'recipes' => $recipes,
        ];
    }
}
