@extends('layouts.app')

@section('content')
<div class="postCard">
    <div class="recipe">
        <a class="link" href="/">Go Back</a>
        <h5>{{$post->title}}</h5>
        <p>{{$post->postBody}}</p>
        <span>
            Ingredients: 
            @foreach($recipes as $recipe)
                <div>{{$recipe['title']}}</div>
                <ul>
                    @foreach($recipe['ingredients'] as $ingredient)
                        <li>{{$ingredient}}</li>
                    @endforeach
                </ul>
            @endforeach
        </span>
    </div>
</div>
@endsection
