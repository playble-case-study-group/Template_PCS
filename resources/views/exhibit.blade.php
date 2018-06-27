@extends('layouts.app')

@section('content')
    <display :groups="{{ $groups }}" :gallery="{{ $gallery }}" :exhibition="{{ $exhibition }}"></display>
@endsection