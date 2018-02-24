@extends('layouts.app')

@section('content')
    <slackbot :messages="{{ $chats }}" :channels="{{ $channels }}"></slackbot>

    {{--<chatbot></chatbot>--}}
@endsection