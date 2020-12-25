@extends('layout.layout')
@section('content')
    <div style="display: block; text-align: center">
        <form method="post" action="{{route('posts.update', $post->id)}}" style="display: inline-block; text-align: center; margin: auto">
            @method('PUT')
            <h1>Edit Post {{$post->id}}</h1>
            <label for="post-title">Post Title</label><br>
            <input type="text" id="post-title" name="title" value="{{old('title', $post->title)}}"><br>
            <label for="post-text">Post Text</label><br>
            <input type="text" id="post-text" name="post_text" value="{{old('post_text', $post->post_text)}}"><br>
            <label for="post-likes">Male</label><br>
            <input type="number" id="post-likes" name="post-likes" value="{{old('likes', $post->likes)}}"><br>
            <input type="hidden" name="_token" id="csrd_token" value="{{csrf_token()}}"><br>
            <button style="display: block; margin: auto; margin-top: 20px; padding: 12px 30px; border-radius: 20px; background-color: #2c3e50; color: #ecf0f1" type="submit">Submit</button>
        </form>
    </div>
@endsection
