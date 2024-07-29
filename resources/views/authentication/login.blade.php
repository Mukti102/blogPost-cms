@extends('layouts.main')
@section('title', 'Login')
@section('contents')
    <div class="py-20 px-5 md:px-7 ">
        {{-- alert succes --}}
        @if (session('success'))
            <div id="alert-3"
                class="flex w-1/2 mx-auto items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    register success
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        {{-- alert gagal --}}
        @if (session()->has('failed'))
            <div id="alert-2"
                class="flex w-1/2 mx-auto items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <span class="sr-only">Succes</span>
                <div class="ms-3 text-sm font-medium">
                    login failed
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

        <div
            class="dark:bg-slate-800  bg-slate-50 border-1 dark:border-gray-600 shadow-md border-gray-200 border-[1.2px] md:pb-16 pb-12 pt-3 md:pt-5 rounded-md w-full px-4  md:w-[40%] mx-auto">
            <div class="mx-auto w-max  my-10">
                <h1 class="font-bold text-gradient md:text-3xl text-2xl">Please Login</h1>
            </div>
            <form class="max-w-sm mx-auto" action="login" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="username"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <input autofocus type="text" id="username" name="username"
                        class="bg-gray-50 placeholder:font-medium  input-shadow border-none border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        required placeholder="Username" />
                    @error('username')
                        <p class="text-xs my-1 font-medium px-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">
                        Password</label>
                    <input type="password" name="password" id="password"
                        class="bg-gray-50 placeholder:font-medium input-shadow border-none border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        required placeholder="Password" />
                    @error('password')
                        <p class="text-xs my-1 font-medium px-1 text-red-500">{{ $message }}</p>
                    @enderror
                    <div class="text-end px-1">
                        <a href="{{ route('password.request') }}" class="text-xs text-blue-400 capitalize">lupa password</a>
                    </div>
                </div>
                <button class="w-full py-2 bg-blue-500 text-white font-semibold rounded-md submit-shadow">
                    Login
                </button>
                <div class="flex w-full py-2 ">
                    <p class="mx-auto w-max dark:text-gray-200 text-xs">Now Registered? <a href="/register"
                            class="text-blue-400">Register Now</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
