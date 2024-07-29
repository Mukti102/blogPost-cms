@extends('layouts.main')
@section('title', $blog->title)
@section('whatsApp', $whatsApp->whatsApp)
@section('contents')
    <div class="md:w-full w-full px-0  md:mx-auto  mt-[4.1rem]">
        {{-- user --}}
        <div class="md:hidden hidden items-center  gap-3">
            <div>
                <div class="relative w-14 h-14 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                    <svg class="absolute w-14 h-12 text-gray-400 " fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="">
                <h1 class="text-lg dark:text-gray-200 font-semibold">By {{ $blog->user->name }}</h1>
                <h5 class="text-sm text-gray-600 dark:text-gray-400">Published {{ $blog->created_at->diffForHumans() }}</h5>
            </div>
        </div>

        {{-- category --}}
        <div class="mt-5 md:hidden  hidden">
            @include('components.category', ['category' => $blog->category->name])
        </div>


        {{-- thumbanil dekstop --}}
        <div class="w-full h-[300px] md:h-[500px] overflow-hidden my-5">
            @if ($blog->image !== null)
                <img src="{{ asset('storage/' . $blog->image) }}" class="w-full h-full object-cover" alt="">
            @else
                <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=2622&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="w-full h-full object-cover" alt="">
            @endif
        </div>

        {{-- content --}}
        <div
            class="text-slate-700 font-roboto  w-full px-3 md:w-[75%] mx-auto dark:text-gray-200 md:text-lg text-[13px] mt-5">
            <div class="flex flex-col justify-center my-10 items-center">
                <h1 class="text-black dark:text-gray-50 text-center md:my-5 my-2 font-bold text-2xl md:text-4xl">
                    {{ $blog->title }}</h1>
                <a href="/category/{{ $blog->category->slug }}"
                    class="md:text-sm text-sky-500 font-semibold text-xs">{{ $blog->category->name }} .
                    {{ $blog->created_at->format('d F o') }}</a>
            </div>
            <article
                class="prose max-w-none md:prose-xl prose-xs dark:text-white dark:prose-blockquote:text-white prose-blockquote:font-semibold">
                {!! $blog->content !!}
            </article>
            <div class="flex gap-2">
                @foreach ($blog->tags as $tag)
                    <div class="text-xs px-5 bg-slate-200 dark:text-gray-800  w-max rounded-full py-1">{{ $tag->name }}
                    </div>
                @endforeach
            </div>



            {{-- comment section --}}
            {{-- <div class="my-10">
                <div>
                    <h5 class="text-2xl font-semibold">Discussion</h5>
                </div>
                <div class="my-4">
                    <form action="" method="post">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            comments</label>
                        <textarea id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write your thoughts here..."></textarea>
                        <div class="flex justify-end my-2">
                            <button type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Send</button>
                        </div>
                    </form>
                </div>
                <ul class="my-2">
                    <Li>
                        <div class="flex items-center gap-3">
                            <div>
                                <div class="relative w-6 h-6 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                    <svg class="absolute w-6 h-5 text-gray-400 " fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd">
                                        </path>
                                    </svg>
                                </div>

                            </div>
                            <div class="leading-tight">
                                <h1 class="text-xs font-semibold">By {{ $blog->user->name }}</h1>
                            </div>
                        </div>
                        <div class="mt-2 pl-0">
                            <h2 class="text-sm font-medium">
                            </h2>
                        </div>
                    </Li>
                </ul>
            </div> --}}
        </div>


        {{-- author --}}
        <div
            class="w-full flex  md:flex-row flex-col items-center md:items-start justify-center  md:gap-5 gap-3 md:py-44 py-20  border-b-[1px] border-gray-300 dark:border-gray-700  mt-0">
            <div>
                <div class="relative  md:w-20 md:h-20 w-14 h-14 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                    @if ($blog->user->photo_profile)
                        <img class="md:h-full w-full h-full object-cover"
                            src="{{ asset('storage/' . $blog->user->photo_profile) }}" alt="">
                    @else
                        <svg class="absolute md:w-20 md:h-16 w-12 h-10 text-gray-400 " fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                    @endif
                </div>
            </div>
            <div class="text-center md:pt-3 pt-0 md:text-start">
                <a class="no-underline md:text-lg text-sm text-gray-800 font-semibold dark:text-white"
                    href="/{{ $blog->user->name }}"
                    class="text-black dark:text-gray-100 md:text-base text-sm font-semibold">{{ $blog->user->name }}</a>
                <h5 class="md:text-sm text-[10px] my-0 md:my-1 text-gray-600 dark:text-gray-400">
                    {{ $blog->user->bio }}</h5>
            </div>
        </div>
    </div>


    {{-- recomendation --}}
    <h3 class="text-center font-light text-md md:text-2xl dark:text-gray-100 mt-10">Recomendasi Untuk mu </h3>
    <div class="w-full justify-center overflow-x-auto py-10 px-5 hidden md:flex gap-5">
        @foreach ($recomendation as $recomend)
            @include('components.card', ['blog' => $recomend])
        @endforeach
    </div>

    {{--  --}}
    <div class="md:hidden mx-2 mt-5 flex">
        @include('components.recomend', ['blogs' => $recomendation])
    </div>

    {{-- balloon whatsapp --}}
    @include('components.whatsapp', ['whatsApp' => $whatsApp->whatsApp])
    @include('components.footer')
@endsection
