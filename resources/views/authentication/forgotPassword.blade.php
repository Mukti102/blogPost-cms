@extends('layouts.main')
@section('title', 'Lupa password')
@section('contents')
    <div class="py-20 px-7">
        @if (session('status'))
            <div id="alert-2"
                class="flex w-1/2 mx-auto items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <span class="sr-only">Succes</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('status') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        <div>
            <form class="max-w-sm mx-auto" action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input autofocus type="email" id="username" name="email"
                        class="bg-gray-50  input-shadow border-none border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        required />
                    @error('email')
                        <p class="text-xs my-1 font-medium px-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full py-2 bg-blue-500 text-white font-semibold rounded-md submit-shadow">
                    Send link reset
                </button>
            </form>
        </div>
    </div>
@endsection
