@extends('dashboard.index')
@section('content')
    {{-- error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- alert --}}
    @if (session('success'))
        <div id="alert-3"
            class="flex w-1/2 mx-auto items-center md:p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
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
    <form action="/dashboard/users/{{ $user->id }}" enctype="multipart/form-data" method="POST"
        class="md:w-[80%] w-full mx-auto gap-3 bg-gray-50 border-gray-200 border-[1.2px] rounded-md shadow-md py-10 md:gap-8 px-2 flex md:flex-grow flex-col">
        @csrf
        @method('put')
        {{-- photo profile --}}
        <div class="md:w-max w-full  mx-auto gap-1 flex flex-col items-center">
            <div class="md:w-32 md:h-32 w-20 h-20 rounded-full bg-black overflow-hidden">
                @if ($user->photo_profile)
                    <img src="{{ asset('storage/' . $user->photo_profile) }}" class="w-full h-full object-cover"
                        alt="">
                @endif
            </div>
            <div class="text-gray-700 mt-2 rounded-full dark:text-white font-medium px-10 py-0">
                <span class="md:text-lg text-sm text-center w-full">{{ $user->name }}</span>
            </div>
            <div class="text-gray-500 mt-0  rounded-full w-[500px]  justify-center dark:text-white py-0  font-light flex">
                <div class="flex gap-1 w-max">
                    @if ($user->bio != null)
                        <span class="md:text-sm text-xs text-start text-black w-max mx-1">" {{ $user->bio }} "</span>
                    @else
                        <span class="md:text-sm text-xs text-start text-black w-max mx-1">No bio</span>
                    @endif
                </div>
            </div>
            <div class="">
                <button type="button" onclick="editProfile()" class="text-gray-500 md:text-sm text-xs no-underline">Edit
                    Profile</button>
                <input id="file_input" type="file" name="photo_profile" class="hidden">
                {{-- old profile --}}
                <input type="hidden" value="{{ $user->photo_profile }}" name="old_profile">
            </div>
        </div>
        <div class="flex-1 px-5 md:0 mt-3">
            <div class="md:flex block gap-5 my-4">
                <div class="flex-1">
                    <label for="name" class="text-sm">Name</label>
                    <input type="text" value="{{ $user->name }}" name="name"
                        class="block w-full rounded-sm mt-1 border-0 text-sm bg-gray-200 h-9">
                </div>
                <div class="flex-1 my-2">
                    <label for="username" class="text-sm">Username</label>
                    <input type="text" name="username" value="{{ $user->username }}"
                        class="text-sm block w-full rounded-sm mt-1 border-0 bg-gray-200 h-9">
                </div>
            </div>
            <div class="md:flex block gap-5 my-4">
                <div class="md:w-1/2 w-full">
                    <label for="email" class="text-sm">Email</label>
                    <input type="email" value="{{ $user->email }}" name="email"
                        class="block w-full rounded-sm mt-1 border-0 text-sm  bg-gray-200 h-9">
                </div>
                <div class="md:w-1/2 w-full my-2">
                    <label for="bio" class="text-sm">Bio</label>
                    <input type="bio" value="{{ $user->bio }}" name="bio"
                        class="block w-full rounded-sm mt-1 px-2 border-0 text-sm  bg-gray-200 h-9">
                </div>
            </div>
        </div>
        <div class="w-full flex pl-5">
            <button type="submit" class="w-max px-5 bg-teal-500 text-white py-1 text-lg rounded-sm">save</button>
        </div>
    </form>
    <script>
        function editProfile(e) {
            document.querySelector('#file_input').click()
        }
    </script>
@endsection
