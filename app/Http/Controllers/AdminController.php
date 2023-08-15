<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Recipe;
use Exception;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        return view('dashboard', [
            'recipes' => Post::where('userId', Auth::id())->simplePaginate(10)
        ]);
    }
    
    public function addPage(){
        return view('add');
    }
    public function processAdd(Request $request){

        try {
            $newPost = new Post();
            $newPost->title = $request->title;
            $newPost->userId = Auth::id();
            $newPost->postBody = $request->textBody;
            $newPost->save();

            $newRecipe = new Recipe();
            $newRecipe->title = '';
            $newRecipe->ingredients = $request->ingredients;
            $newRecipe->postId = $newPost->id;
            $newRecipe->save();

            return redirect('dashboard');
        } catch (Exception $e) {
            return response(redirect(url('/noPage')), 404);
        }

    }

    public function editPage($postID){
            $post = Post::where('id', $postID)->with('recipes')->get()->first();
            $recipe = $post->recipes;
            return view('edit', [
                'post' => $post,
                'recipe' => $recipe,
            ]);
        
    }
    public function processEdit(Request $request){
        
            $post = Post::where('id', $request->postId)->with('recipes')->get()->first();
            $recipe =  Recipe::where('id', $post->recipes[0]->id)->get()->first();

            $post->title = $request->title;
            $post->postBody = $request->textBody;
            $post->save();

            $recipe->ingredients = $request->ingredients;
            $recipe->save();

            return redirect('dashboard');
    }

    public function remove($postID){

        Post::where('id', $postID)->delete();

        return redirect('/dashboard');
    }
}
