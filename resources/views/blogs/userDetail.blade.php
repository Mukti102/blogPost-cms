@extends('layouts.main')
@section('whatsApp', $whatsApp->whatsApp)
@section('contents')
    <div class="my-32 px-2 md:px-0">
        @csrf
        @method('put')
        <div class="w-full mb-10 h-96 p-10 dark:text-gray-300  flex justify-center">
            <div class="flex justify-center items-center flex-col">
                <div class="md:w-32 md:h-32 w-20 h-20 my-5 bg-black overflow-hidden dark:bg-gray-800 rounded-full">
                    @if ($user->photo_profile != null)
                        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $user->photo_profile) }}"
                            alt="">
                    @else
                        <svg class="absolute md:w-32 md:h-28 w-12 h-10 dark:text-gray-900 " fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                    @endif
                </div>
                <div class="text-center">
                    <span class="md:text-3xl text-xl my-3 font-semibold">{{ $user->name }}</span>
                    <span class="text-xs block mt-1 mb-4 md:my-5 text-gray-600 dark:text-gray-400">" {{ $user->bio }}
                        "</span>
                    <h5 class="text-sm">{{ $blogs->count() }} Postingan</h5>
                </div>
            </div>
        </div>
        <div class="flex gap-5 justify-center py-5 flex-wrap">
            @foreach ($blogs as $blog)
                @include('components.card', ['blogs' => $blog])
            @endforeach
        </div>
    </div>
    {{-- balloon whatsapp --}}
    @include('components.whatsapp', ['whatsApp' => $whatsApp->whatsApp])
    @include('components.footer')
@endsection
