@component('mail::message')

    {{$data['postTitle']}}

    Post with id {{$data['postId']}} approved mail.

@component('mail::button', ['url' => ''])
Click
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
