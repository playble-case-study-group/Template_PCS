@extends('layouts.app')

@section('content')
    <showcase :exhibits="{{ $exhibits }}" :gallery=" {{ $gallery }}">

    </showcase>
@endsection