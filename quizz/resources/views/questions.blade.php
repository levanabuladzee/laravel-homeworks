@extends('layout.layout')
@section('content')

    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/questions') }}" class="text-sm text-gray-700 underline">Home</a>
                <a href="{{ url('/questions/create') }}" class="text-sm text-gray-700 underline">Add Question</a>
                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                <form id="logout-form" action="{{route('logout')}}" method="post">
                    {{csrf_field()}}
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
            @endif
        </div>
    @endif

<div style="display: block; text-align: center">
@if(count($questions) > 0)
    <h1>Questions</h1>
    @foreach($questions as $question)
        <div class="container">
            <h2>{{$question->question}}</h2>
            @foreach($question -> answers as $answer)
                <div>

                        @if($answer->is_correct == 1)
                        <p style="color: #2ecc71">{{$answer->answer}}</p>
                        @else
                        {{$answer->answer}}
                            <p></p>
                        @endif
                </div>
            @endforeach
        </div>
    @endforeach
@else
    <p>No questions found</p>
@endif
</div>

@endsection
