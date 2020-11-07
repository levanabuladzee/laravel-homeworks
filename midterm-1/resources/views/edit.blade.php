@extends('home')
@section('content')
    <div style="margin: 32px">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <li style="color: #e74c3c">{{$error}}</li>
            @endforeach
        @endif
    </div>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endif
            </div>
        @endif

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Position</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            <form method="post" action="{{route('applicants.update', $applicant->id)}}">
                @csrf
                @method('PUT')
                <tr>
                    <td>{{$applicant->id}}</td>
                    <td><input type="text" id="name" name="name" value="{{old('name', $applicant->name)}}"></td>
                    <td><input type="text" id="surname" name="surname" value="{{old('surname', $applicant->surname)}}"></td>
                    <td><input type="text" id="position" name="position" value="{{old('position', $applicant->position)}}"></td>
                    <td><input type="text" id="phone" name="phone" value="{{old('phone', $applicant->phone)}}"></td>
                    <td><button type="submit">EDIT</button></td>
                </tr>
            </form>
        </table>
    </div>
@endsection
