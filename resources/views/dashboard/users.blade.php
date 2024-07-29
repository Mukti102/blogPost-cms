@extends('dashboard.index')
@section('content')
    @if (session('success'))
        <div id="alert-3"
            class="flex w-1/2 mx-auto items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
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
    <div class="relative overflow-x-auto  shadow-sm py-3 sm:rounded-lg border-[1.2px] border-gray-200">
        <div class="flex justify-between gap-2 py-2 px-4">
            <a href="/dashboard/users/create" type="button"
                class="text-white bg-blue-700 no-underline hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">+
                Tambah</a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-[10px] md:text-xs text-gray-100 uppercase bg-gray-900 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-3 py-3">
                        No
                    </th>
                    <th scope="col" class="md:px-6 md:py-4 px-0 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6  hidden md:table-cell py-3">
                        Username
                    </th>
                    <th scope="col" class="px-2 py-3 hidden md:table-cell">
                        email
                    </th>
                    <th scope="col" class="px-2 py-3">
                        Posts
                    </th>
                    <th scope="col" class="px-2 py-3">
                        admin
                    </th>
                    <th scope="col" class="px-6 text-center py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($users->count())
                    @foreach ($users as $user)
                        <tr
                            class="odd:bg-white  odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 md:text-xs text-[10px] border-b dark:border-gray-700">
                            <td class="md:px-3 md:py-3 px-1 py-1 text-center">
                                {{ $loop->index + 1 }}
                            </td>
                            <th scope="row"
                                class="md:px-6 md:py-4 px-0 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ Illuminate\Support\Str::limit($user->name, $limit = 25) }}
                            </th>
                            <td class="md:px-6 md:py-4 hidden md:table-cell">
                                {{ $user->username }}
                            </td>
                            <td class="px-2 py-3 hidden md:table-cell">
                                {{ $user->email }}
                            </td>
                            <td
                                class="md:px-2 md:py-5 py-3 px-1 pt-5 justify-center font-semibold flex  items-center gap-2">
                                {{ $blogs->where('user_id', $user->id)->count() }}
                            </td>
                            <td
                                class="md:px-2 table-cell md:py-5 py-3 px-1 pt-5 justify-center font-semibold text-center items-center gap-2">
                                <form id="form" action="/dashboard/users/switch/{{ $user->id }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <label class="inline-flex items-center me-5 cursor-pointer">
                                        <input onclick="submit()" type="checkbox" name="role" id="toggle"
                                            class="sr-only peer" @if ($user->role_id == 1) checked @endif>
                                        <div
                                            class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-red-300 dark:peer-focus:ring-red-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-600">
                                        </div>
                                    </label>
                                </form>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <form method="post" action="/dashboard/users/{{ $user->id }}" class="inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit">
                                        @include('dashboard.partials.buttons.delete.delete')
                                    </button>
                                    {{-- <button type="submit">submit</button> --}}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th class="">
                            <h1 class="p-5 w-full  mx-auto">Post Not Found</h1>
                        </th>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class=" my-2">
        {{ $users->links() }}
    </div>
@endsection
