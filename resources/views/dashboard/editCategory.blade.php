@extends('dashboard.index')
@section('content')
    <form id="create" action="/dashboard/category/{{ $category->id }}" method="POST" class="max-w-xl mx-auto">
        @method('put')
        @csrf
        <div class="mb-5">
            {{-- name --}}
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" value="{{ $category->name }}" id="title" name="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Name Category" required />
            @error('name')
                <p class="text-xs my-1 font-medium px-1 text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">update</button>
    </form>
@endsection
