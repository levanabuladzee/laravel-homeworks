@extends('layout.layout')
@section('content')

    <div class="d-flex flex-column p-2 justify-content-center align-items-center mt-lg-3">
        <h1 class="mb-4">Register</h1>
        <form class="d-flex flex-column justify-content-center align-items-center" method="post" action="{{route('post_register')}}">
            @csrf
            <div class="form-outline mb-4">
                <input name="name" type="text" id="name" class="form-control" placeholder="Username" value="{{old('name')}}" />
            </div>

            <div class="form-outline mb-4">
                <input name="email" type="email" id="email" class="form-control" placeholder="Email Address" value="{{old('email')}}" />
            </div>

            <div class="form-outline mb-4">
                <input name="password" type="password" id="password" class="form-control" placeholder="Password" />
            </div>

            <div class="form-outline mb-4">
                <input name="confirm_password" type="password" id="confirm_password" class="form-control" placeholder="Confirm Password" />
            </div>

            <button type="submit" class="btn btn-danger btn-block mb-4">Register</button>

            <div class="text-center">
                <p>Already a member? <a href="{{route('login')}}">Login</a></p>
            </div>
        </form>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <li style="color: #e2452f">{{$error}}</li>
            @endforeach
        @endif
    </div>

@endsection
