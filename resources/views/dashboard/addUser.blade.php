@extends('dashboard.index')
@section('content')
    <div class="py-20 md:px-0 px-7">
        <div>
            <div class="mx-auto mb-5 w-max">
                <h1 class="font-bold text-black text-2xl">Tambahkan user baru</h1>
            </div>
            <form action="/dashboard/users" method="POST" class="max-w-sm mx-auto">
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
                    Tambahkan
                </button>
            </form>
        </div>
    </div>
@endsection
