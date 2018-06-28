@extends('layouts.app')

@section('content')
    <exhibit :groups="{{ $groups }}" :gallery="{{ $gallery }}" :exhibition="{{ $exhibition }}"></exhibit>
@endsection