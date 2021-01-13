@extends('layout.navbar_layout')
@section('content')

    <div class="d-flex flex-column p-2 justify-content-center align-items-center mt-lg-5">
            @foreach($questions as $question)
                <div class="card mb-4" style="width: 64rem;">
                    @can('delete_question', $question)
                        <div class="d-flex flex-row justify-content-end align-items-center">
                            <form method="get" action="{{route('edit_question', $question)}}">
                                <button style="border-radius: 4px" type="submit" class="btn btn-primary btn-sm m-1" data-toggle="modal" data-target="myModal-{{$question->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </button>
                            </form>
                            <form method="post" action="{{route('delete_question', $question)}}">
                                @method('DELETE')
                                @csrf
                                <button style="border-radius: 4px" type="submit" class="btn btn-danger btn-sm m-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endcan
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
