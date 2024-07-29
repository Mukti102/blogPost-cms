@extends('layouts.main')
@section('title', $title)
@section('whatsApp', $whatsApp->whatsApp)

@section('contents')
    <div class="mt-20 md:px-0 px-2">
        <div class="w-max mx-auto my-5">
            <h1 class="font-bold dark:text-white text-3xl">All Posts of {{ $title }} category</h1>
        </div>
        <div class="w-full p-5 justify-center flex gap-4 flex-wrap">
            @foreach ($blogs as $blog)
                @include('components.card', ['Blog' => $blog])
            @endforeach
        </div>
    </div>
    {{-- balloon whatsapp --}}
    @include('components.whatsapp', ['whatsApp' => $whatsApp->whatsApp])
@endsection
