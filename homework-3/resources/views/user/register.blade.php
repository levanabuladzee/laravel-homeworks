@extends('layout.layout')
@section('content')

<div style="display: block; text-align: center">
    <form method="post" action="{{route('post.register')}}" style="display: inline-block; text-align: center; margin: auto">
        @csrf
        <h1>Register</h1>
        <label for="name">Username</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email">
        </br>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password">
        <button style="display: block; margin: auto; margin-top: 20px; padding: 12px 30px; border-radius: 20px; background-color: #c0392b; color: #ecf0f1" type="submit">Register</button>
    </form>
</div>

@endsection
