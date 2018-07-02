@extends('layouts.app')

@section('content')
    <display :exhibit="{{ json_encode($exhibit) }}">

    </display>
@endsection