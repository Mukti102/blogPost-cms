@extends('dashboard.index')
@section('content')
    @include('components.postsTable', ['blogs' => $blogs])
@endsection