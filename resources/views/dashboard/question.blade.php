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
    <div class="relative overflow-x-auto  shadow-md sm:rounded-lg border-[1.2px] border-slate-300 py-2">
        <div class="flex justify-between gap-2 items-center py-2 md:px-4 px-1">
            <a data-modal-target="static-modal" data-modal-toggle="static-modal" type="button"
                class="text-white bg-blue-700 no-underline cursor-pointer hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium md:rounded-lg text-xs flex justify-center items-center md:text-sm md:px-5 md:py-2 px-3 py-1 rounded-sm me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Tambah</a>
            <x-modal-create-question />
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-100 uppercase bg-gray-800 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pertanyaan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jawaban
                    </th>
                    <th scope="col" class="px-6 text-center py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($questions->count())
                    @foreach ($questions as $question)
                        <tr
                            class="odd:bg-white  odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="px-8 py-2 text-sm text-start">
                                {{ $loop->index + 1 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $question->question }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $question->answer }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button data-modal-target="edit-modal" data-modal-toggle="edit-modal">
                                    @include('dashboard.partials.buttons.edit', [
                                        'href' => '#',
                                    ])
                                </button>
                                <x-modal-edit-question :question="$question" />
                                <form method="post" action="{{ url('/Questions/' . $question->id) }}" class="inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit">
                                        @include('dashboard.partials.buttons.delete.delete')
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th colspan="4">
                            <h1 class="p-5 w-full text-center  mx-auto">Post Not Found</h1>
                        </th>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

@endsection
