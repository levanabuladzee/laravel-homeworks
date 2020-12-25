@extends('layout.layout')
@section('content')
    <div style="display: block; text-align: center">
        <form method="post" action="{{route('posts.save')}}" style="display: inline-block; text-align: center; margin: auto">
            <h1>Create Post</h1>
            <label for="post-title">Post Title</label><br>
            <input type="text" id="post-title" name="title"><br>
            <label for="post-text">Post Text</label><br>
            <input type="text" id="post-text" name="post_text">
            </br>
            <label for="likes">Likes</label><br>
            <input type="number" id="likes" name="likes">
            <input type="hidden" name="_token" id="csrd_token" value="{{csrf_token()}}">
            <input type="hidden" name="user_id" id="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
            <button style="display: block; margin: auto; margin-top: 20px; padding: 12px 30px; border-radius: 20px; background-color: #8e44ad; color: #ecf0f1" type="submit">Submit</button>
        </form>
    </div>
@endsection
