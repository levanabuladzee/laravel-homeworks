@extends('layout.layout')
@section('content')
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
                <th>Brand</th>
                <th>Model</th>
                <th>Color</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Action</th>
                <th>
                    <form method="get" action="{{route('phones.create')}}">
                        <button>ADD PHONE</button>
                    </form>
                </th>
            </tr>
            @foreach($phones as $phone)
            <tr>
                <td>{{$phone->id}}</td>
                <td>{{$phone->brand}}</td>
                <td>{{$phone->model}}</td>
                <td>{{$phone->color}}</td>
                <td>{{$phone->stock}}</td>
                <td>{{$phone->price}}$</td>
                <td>
                    <form method="get" action="{{route('phones.edit', $phone->id)}}">
                        <button>EDIT</button>
                    </form>
                    <form method="post" action="{{route('phones.delete', $phone->id)}}">
                        @csrf
                        @method('DELETE')
                        <button>DELETE</button>
                    </form>
                </td>
                <td></td>
            </tr>
            @endforeach
        </table>
</div>
@endsection
