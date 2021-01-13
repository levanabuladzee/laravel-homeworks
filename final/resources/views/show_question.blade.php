@extends('layout.navbar_layout')
@section('content')

    <div class="d-flex flex-column p-2 justify-content-center align-items-center mt-lg-3">
        <div class="d-flex flex-column p-2 justify-content-center align-items-center mt-lg-3">
            <div class="card mb-4" style="width: 64rem;">
                <ul class="list-group list-group-flush d-flex flex-row pl-3">
                    <li class="list-group-item">
                        <div class="d-flex flex-row justify-content-center">
                            <h2>{{$question->title}}</h2>
                        </div>
                        <div class="d-flex flex-row justify-content-center">
                            <span style="font-size: 10px">{{$question->created_at}}</span>
                        </div>
                        <div class="d-flex flex-row justify-content-center mt-3">
                            <form method="get" action="{{route('user_question', $question->user)}}">
                                <p style="font-size: 12px">by <button style="font-size: 12px; height: 20px; padding: 0 4px; border-radius: 12px" type="submit" class="btn btn-danger btn-sm">{{$question->user->name}}</button>
                            </form>
                        </div>
                        <p class="mt-1" style="text-align: center">{{$question->body}}</p>
                        <div class="d-flex flex-row justify-content-center align-items-center">
                        @foreach($question->tags as $tag)
                            <a href="{{route('questions_by_tags', $tag->id)}}"><span class="badge rounded-pill bg-light text-dark">#{{$tag->name}}</span></a>
                        @endforeach
                        </div>
                        <div class="d-flex flex-row justify-content-center mt-lg-4">
                            <h4>Answers</h4>
                        </div>
                        <div class="d-flex flex-row justify-content-center mt-lg-2">
                            <form method="post" action="{{route('post_answer', $question)}}">
                                @csrf
                                <div class="input-group mb-3">
                                    <input id="answer" name="answer" type="text" class="form-control" placeholder="Write Answer" aria-label="Write Answer" aria-describedby="basic-addon2" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-success" type="submit">Answer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <span style="color: #e2452f">{{$error}}</span>
                                    @endforeach
                                @endif
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center mt-lg-2">
                            @foreach($question->answers as $answer)
                                <div class="card bg-light mb-3" style="width: 50rem;">
                                    <div class="card-header">
                                        <div class="d-flex flex-row justify-content-between align-items-center">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                </svg>
                                                {{$answer->user->name}}
                                            </div>
                                            @can('deleteAnswer', $answer)
                                                <form method="post" action="{{route('delete_answer', $answer)}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button style="border-radius: 4px" type="submit" class="btn btn-danger btn-sm m-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{$answer->body}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection
