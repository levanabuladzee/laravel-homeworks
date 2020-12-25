@extends('layout.layout')
@section('content')
    <div style="display: block; text-align: center">
        <form method="post" action="{{route('send')}}" style="display: inline-block; text-align: center; margin: auto">
            <h1>Create Mail</h1>
            <label for="mail">Message</label><br>
            <input type="text" id="mail" name="mail"><br>
            <input type="hidden" name="_token" id="csrf_token" value="{{csrf_token()}}">
            <input type="hidden" name="user_id" id="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
            <button style="display: block; margin: auto; margin-top: 20px; padding: 12px 30px; border-radius: 20px; background-color: #8e44ad; color: #ecf0f1" type="submit">Send</button>
        </form>
    </div>
@endsection
