

@extends('layouts.app')

@section('content')
  <form style="display: flex; justify-content: center; width:100%; margin-top:100px" action="/processEdit" method="post">
    @csrf

    <div style="display: flex; flex-direction: column; background:#fff; max-width: 600px; border: 2px solid #000; border-radius: 30px; padding: 2rem">
      <a href="/dashboard">Go Back</a>
      <div>
        <h3>Post Data</h3>
        <label for="title">Title</label>
        <input value="{{$post->title}}" style="display: block" name="title" id="title">
        <input value="{{$post->id}}" name="postId" id="postId" type="hidden">

        <label for="textBody">textBody</label>
        <textarea name="textBody" id="textBody" rows="10" cols="60">
          {{$post->postBody}}
        </textarea>
      </div>

      <div>
        <h5>Recipe Data</h5>
        <label for="ingredients">Ingredients</label>
        <textarea name="ingredients" id="ingredients" rows="10" cols="60">
          {{$recipe[0]->ingredients}}
        </textarea>
      </div>

      <div style="display: flex; justify-content: center">
        <button style="width: 50%;" type="submit">Add</button>
      </div>
    </div>
  </form>
@endsection