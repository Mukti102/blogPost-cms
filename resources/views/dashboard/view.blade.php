@extends('dashboard.index')
@section('content')
    <div class="w-[90%] mx-auto  mt-20">
        {{-- user --}}
        <div class="flex items-center gap-3">
            <div>
                <div class="relative w-12 h-12 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                    <svg class="absolute w-12 h-10 text-gray-400 " fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
                        </path>
                    </svg>
                </div>

            </div>
            <div class="">
                <h1 class="text-sm font-semibold">By {{ $blog->user->name }}</h1>
                <h5 class="text-xs text-gray-600">Published {{ $blog->created_at->diffForHumans() }}</h5>
            </div>
        </div>
        {{-- category --}}
        <div class="mt-5">
            @include('components.category', ['category' => $blog->category->name])
        </div>
        {{-- content --}}
        <div class="text-slate-700 text-lg mt-5">
            <h1 class="text-black  font-bold text-3xl">{{ $blog->title }}</h1>
            <div class="w-full h-[350px] overflow-hidden my-5">
                @if ($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}" class="w-full h-full object-cover"
                        alt='{{ $blog->image }}'>
                @else
                    <img src="https://source.unsplash.com/500x350/?{{ $blog->category->name }}}"
                        class="w-full h-full object-cover" alt="">
                @endif
            </div>
            <div class="text-sm">
                <article
                    class="prose  prose-td:border-[1.5px] prose-td:border-gray-400 prose-td:border-separate prose-td:border-spacing-2">
                    {!! $blog->content !!}
                </article>
            </div>
        </div>
    </div>
@endsection
