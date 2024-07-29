@extends('dashboard.index')
@section('content')
    @include('components.publishYet', ['blogs' => $publishYet])
@endsection
