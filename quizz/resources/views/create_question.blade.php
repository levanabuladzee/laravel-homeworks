@extends('layout.layout')
@section("content")

    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/questions') }}" class="text-sm text-gray-700 underline">Home</a>
                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                <form id="logout-form" action="{{route('logout')}}" method="post">
                    {{csrf_field()}}
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
            @endif
        </div>
    @endif

<div style="margin: 32px">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li style="color: #e2452f">{{$error}}</li>
        @endforeach
    @endif
</div>
    <div style="display: block; text-align: center">
        <form method="post" action="{{route('questions.save')}}" style="display: inline-block; text-align: center; margin: auto">
            @csrf
            <h1>Create Question</h1>
            <label for="question">Question</label><br>
            <input type="text" name="question" placeholder="Question">
            </br>
            <label for="answer_1">Answer 1</label><br>
            <input type="text" name="answer_1" placeholder="Answer 1">
            </br>
            <label for="answer_2">Answer 2</label><br>
            <input type="text" name="answer_2" placeholder="Answer 2">
            </br>
            <label for="answer_3">Answer 3</label><br>
            <input type="text" name="answer_3" placeholder="Answer 3">
            </br>
            <label for="answer_4">Answer 4</label><br>
            <input type="text" name="answer_4" placeholder="Answer 4">
            </br>
            <label for="is_correct">Correct</label>
                                <select name="is_correct">
                                    <option value=1>1</option>
                                    <option value=2>2</option>
                                    <option value=3>3</option>
                                    <option value=4>4</option>
                                </select>
            <button style="display: block; margin: auto; margin-top: 20px; padding: 12px 30px; border-radius: 20px; background-color: #2980b9; color: #ecf0f1" type="submit">Add</button>
        </form>
    </div>
@endsection
