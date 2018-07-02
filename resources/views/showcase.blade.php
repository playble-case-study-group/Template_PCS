@extends('layouts.app')

@section('content')
    <showcase :showcase="{{ $showcase }}" :gallery=" {{ $gallery }}">

    </showcase>
@endsection