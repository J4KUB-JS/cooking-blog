@extends('layouts.app')

@section('content')
<div>
    <div class="headingSection">
        <div class="heading">Welcome To FoodKing</div>
            <form action="/search" method="POST" class="searchForm">
                @csrf
                <input placeholder="Type what you want to eat" id="searchPhrase" name="searchPhrase" class="searchInput"/>
                <button class="btnSearch" type="submit">Search</button>
            </form>
    </div>

    <div class="recipes">
        @foreach ($latest_recipes as $recipe)
            <div class="recipe">
                <div>{{$recipe->title}}</div>
                <div>{{$recipe->postBody}}</div>
                <a class="link" href="/recipe/{{$recipe->id}}">Check out &gt;</a>
            </div>
        @endforeach
    </div>
    
</div>
@endsection
