@extends('layout.navbar_layout')
@section('content')

    <div class="d-flex flex-column p-2 justify-content-center align-items-center">
        <div class="d-flex flex-column p-2 justify-content-center align-items-center">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('put_question', $question)}}">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Question Title</label>
                        <input value="{{$question->title}}" type="text" class="form-control" id="title" name="title" placeholder="Title" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Question Body</label>
                        <textarea class="form-control" id="body" name="body" placeholder="Body" rows="4" required>{{$question->body}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Question Tag 1</label>
                        <input value="{{$question->tags[0]->name}}" type="text" class="form-control" id="tag-1" name="tag-1" placeholder="Tag 1" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Question Tag 2</label>
                        <input value="{{$question->tags[1]->name}}" type="text" class="form-control" id="tag-2" name="tag-2" placeholder="Tag 2" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Question Tag 3</label>
                        <input value="{{$question->tags[2]->name}}" type="text" class="form-control" id="tag-3" name="tag-3" placeholder="Tag 3" required />
                    </div>
                    <div class="modal-footer d-flex flex-column justify-content-center align-items-center">
                        <button type="submit" class="btn btn-dark">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
