@extends('layouts.app')

@section('content')
<div class="dashboard-wrapper">
        <div class="dashboard-card">
            <div style="display: flex; justify-content: space-between;">
                <h1>Dashboard</h1>
                <a href="addPage"><button class="add-button">Add</button></a>
            </div>
            
            <table class="dashboard-table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th style="display: flex; justify-content:end;">Actions</th>
                </tr>
                @foreach ($recipes as $recipe)
                    <tr>
                        <td class="post-id">{{$recipe['id']}}.</td>
                        <td>
                            <a class="post-title" href="/recipe/{{$recipe['id']}}">
                                {{$recipe['title']}}
                            </a>
                        </td>
                        <td style="display: flex; justify-content:end;">
                            <a href="/remove/{{$recipe['id']}}">
                                <button class="remove-button">Remove</button>   
                            </a>
                            <a href="editPage/{{$recipe['id']}}">
                                <button class="edit-button">Edit</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <br>
            {{$recipes->links()}}
        </div>
</div>
@endsection
