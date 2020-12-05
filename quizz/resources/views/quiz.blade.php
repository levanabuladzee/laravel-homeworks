@extends('layout.layout')
@section('content')

    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/quiz') }}" class="text-sm text-gray-700 underline">Home</a>
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
            <form method="post" enctype="multipart/form-data" action="{{route('quiz.save')}}">
                <h1>Questions</h1>
                @foreach($questions as $question)
                    <div class="container">
                        <h2>{{$question->question}}</h2>
                        @foreach($question -> answers as $answer)
                            <div>
                                {{$answer->answer}}
                            </div>
                        @endforeach
                        <select name="{{$question->id}}">
                            @foreach($question->answers as $answer)
                                <option value="{{$answer->id}}">{{$answer->answer}}</option>
                            @endforeach
                        </select>
                    </div>
                @endforeach
                <input type="hidden" name="_token" id='csrf_toKen' value="{{ csrf_toKen() }}">
                <div>
                    <button style="display: block; margin: auto; margin-top: 20px; padding: 12px 30px; border-radius: 20px; background-color: #2980b9; color: #ecf0f1" type="submit">Submit</button>
                </div>
            </form>
        @else
            <p>No questions found</p>
        @endif
    </div>

@endsection
