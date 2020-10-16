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
                <th>Brand</th>
                <th>Model</th>
                <th>Color</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <form method="post" action="{{route('phones.save')}}">
                @csrf
                <tr>
                    <td><input type="text" id="phone-brand" name="brand" value=""></td>
                    <td><input type="text" id="phone-model" name="model" value=""></td>
                    <td><input type="text" id="phone-color" name="color" value=""></td>
                    <td><input type="text" id="phone-stock" name="stock" value=""></td>
                    <td><input type="text" id="phone-price" name="price" value=""></td>
                    <td><button type="submit">ADD</button></td>
                </tr>
            </form>
        </table>
</div>
@endsection
