@extends('layout.layout')
@section('content')

<div style="display: block; text-align: center">
    <form method="post" action="{{route('post.login')}}" style="display: inline-block; text-align: center; margin: auto">
        @csrf
        <h1>Login</h1>
        <label for="name">Username</label><br>
        <input type="text" name="name">
        </br>
        <label for="password">Password</label><br>
        <input type="password" name="password">
        <button style="display: block; margin: auto; margin-top: 20px; padding: 12px 30px; border-radius: 20px; background-color: #2980b9; color: #ecf0f1" type="submit">Login</button>
    </form>
</div>

@endsection
