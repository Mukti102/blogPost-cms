@extends('layouts.main')
@section('title', 'Register')
@section('contents')
    <div class="py-20 px-5 md:px-7 ">
        <div
            class="dark:bg-slate-800  bg-slate-50 border-1 dark:border-gray-600 shadow-md border-gray-200 border-[1.2px] md:pb-16 pb-12 pt-5 md:pt-5 rounded-md w-full px-4  md:w-[40%] mx-auto">
            <div class="mx-auto mb-5 w-max">
                <h1 class="font-bold text-gradient text-3xl">Please Register</h1>
            </div>
            <form action="{{ route('register') }}" method="POST" class="max-w-sm mx-auto">
                @csrf
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Name</label>
                    <input type="text" id="name" name="name"
                        class="bg-gray-50 input-shadow border-none border-gray-300 text-gray-700 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                    @error('name')
                        <p class="text-xs my-1 font-medium px-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">
                        Username</label>
                    <input type="text" name="username" id="username"
                        class="bg-gray-50 input-shadow border-none border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                    @error('username')
                        <p class="text-xs my-1 font-medium px-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">
                        Email</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 input-shadow border-none border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                    @error('email')
                        <p class="text-xs my-1 font-medium px-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">
                        Password</label>
                    <input type="password" name="password" id="password"
                        class="bg-gray-50 input-shadow border-none border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                    @error('password')
                        <p class="text-xs my-1 font-medium px-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <button class="w-full py-2 bg-blue-500 text-white font-semibold rounded-md submit-shadow">
                    Register
                </button>
                <p class="mx-auto dark:text-gray-100 w-max mt-2 text-xs">Already have account? <a href="/login"
                        class="text-blue-500">Login
                        Now</a></p>
            </form>
        </div>
    </div>
@endsection
