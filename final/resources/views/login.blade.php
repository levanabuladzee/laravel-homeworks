@extends('layout.layout')
@section('content')

    <div class="d-flex flex-column p-2 justify-content-center align-items-center mt-lg-3">
        <h1 class="mb-4">Login</h1>
        <form class="d-flex flex-column justify-content-center align-items-center" method="post" action="{{route('post_login')}}">
            @csrf
            <div class="form-outline mb-4">
                <input name="name" type="text" id="name" class="form-control" placeholder="Username" />
            </div>

            <div class="form-outline mb-4">
                <input name="password" type="password" id="password" class="form-control" placeholder="Password" />
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>

            <div class="text-center">
                <p>Not a member? <a href="{{route('register')}}">Register</a></p>
            </div>
        </form>
    </div>

@endsection
