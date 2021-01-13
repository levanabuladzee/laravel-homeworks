@extends('layout.navbar_layout')
@section('content')

    <div class="d-flex flex-column p-2 justify-content-center align-items-center mt-lg-3">
        <div class="d-flex flex-column p-2 justify-content-center align-items-center mt-lg-3">
            @foreach($questions as $question)
                <div class="card mb-4" style="width: 64rem;">
                    <ul class="list-group list-group-flush d-flex flex-row pl-3">
                        <div class="d-flex flex-column justify-content-around align-items-center m-3">
                            <form method="post" action="{{route('upvote_question', $question->id)}}">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="btn btn-light btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                                        <path d="M7.247 4.86l-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                    </svg>
                                </button>
                            </form>
                            <span>{{$question->vote}}</span>
                            <form method="post" action="{{route('downvote_question', $question->id)}}">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="btn btn-light btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <li class="list-group-item">
                            <div class="d-flex flex-row justify-content-between">
                                <a href="{{route('show_question', $question)}}"><h5>{{$question->title}}</h5></a>
                                <span style="font-size: 10px">{{$question->created_at}}</span>
                            </div>
                            <form method="get" action="{{route('user_question', $question->user)}}">
                                <p style="font-size: 12px">by <button style="font-size: 12px; height: 20px; padding: 0 4px; border-radius: 12px" type="submit" class="btn btn-danger btn-sm">{{$question->user->name}}</button>
                            </form>
                            <p class="mt-3" style="text-overflow: ellipsis; overflow: hidden; width: 57rem; white-space: nowrap">{{$question->body}}</p>
                            @foreach($question->tags as $tag)
                                <a href="{{route('questions_by_tags', $tag->id)}}"><span class="badge rounded-pill bg-light text-dark">#{{$tag->name}}</span></a>
                            @endforeach
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

@endsection
