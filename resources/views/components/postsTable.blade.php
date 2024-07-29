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
<div class="relative overflow-x-auto  shadow-md sm:rounded-lg">
    <div class="flex justify-between gap-2 items-center py-2 md:px-4 px-1">
        <a href="/dashboard/blogs/create" type="button"
            class="text-white bg-blue-700 no-underline hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium md:rounded-lg text-xs flex justify-center items-center md:text-sm md:px-5 md:py-2 px-3 py-1 rounded-sm me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Tambah</a>
        @include('dashboard.partials.input', ['props' => 'blogs'])
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs bg-slate-600 text-white uppercase dark:bg-gray-700 dark:text-gray-400 pb-4 pt-2">
            <tr class="text-[10px] md:text-xs">
                <th scope="col" class="px-3 md:px-2 md:py-2 text-center">
                    No
                </th>
                <th scope="col" class="px-3 md:px-6 md:py-3">
                    Title
                </th>
                <th scope="col" class="px-3 md:px-6 md:py-3">
                    Category
                </th>
                <th scope="col" class="px-3 md:px-6 md:py-3">
                    Status
                </th>
                <th scope="col" class="px-3 hidden md:table-cell md:px-6 md:text-center py-3">
                    Action
                </th>
            </tr>
        </thead>
        <div id="dropdownDots"
            class="hidden absolute z-10 right-0 mt-2 w-48 rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="dropdownMenuIconButton">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                    role="menuitem">Edit</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                    role="menuitem">Delete</a>
            </div>
        </div>

        <tbody>
            @if ($blogs->count())
                @foreach ($blogs as $blog)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b md:text-sm text-[10px] dark:border-gray-700">
                        <td class="md:px-2 md:py-2 text-center md:text-center">
                            {{ $loop->index + 1 }}
                        </td>
                        <th scope="row"
                            class="py-1 md:px-6 md:py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ Illuminate\Support\Str::limit($blog->title, $limit = 25) }}
                        </th>
                        <td class="md:px-6 md:py-4 md:text-start text-center">
                            {{ $blog->category->name }}
                        </td>
                        <td class="md:px-6 md:py-4 px-0 py-2 flex items-center gap-2">
                            @if ($blog->status == 0)
                                <p class="text-red-700 md:inline hidden">Belum publish</p>
                                <div class="w-2 md:block mx-auto md:m-0 h-2 rounded-full bg-red-700"></div>
                            @else
                                <p class="text-green-600 hidden md:inline">Sudah publish</p>
                                <div class="w-2 h-2 mx-auto md:m-0 md:block rounded-full bg-green-700"></div>
                            @endif
                        </td>
                        <td class="md:px-6 md:table-cell hidden md:py-4 text-center">
                            @include('dashboard.partials.buttons.viewBlog', [
                                'route' => 'blogs',
                                'id' => $blog->id,
                            ])
                            @include('dashboard.partials.buttons.edit', [
                                'href' => '/dashboard/blogs/' . $blog->id . '/edit',
                            ])
                            <form method="post" action="/dashboard/blogs/{{ $blog->id }}" class="inline">
                                @method('delete')
                                @csrf
                                <button type="submit">
                                    @include('dashboard.partials.buttons.delete.delete')
                                </button>
                                {{-- <button type="submit">submit</button> --}}
                            </form>
                        </td>
                        <td class="md:px-6 md:hidden pr-2 text-lg md:py-4 text-center">
                        <td class="md:px-6 md:hidden pr-2 text-lg md:py-4 text-center">
                            <button id="dropdownMenuIconButton{{ $blog->id }}" aria-haspopup="true"
                                aria-expanded="false" data-dropdown-toggle="dropdownDots{{ $blog->id }}"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg focus:bg-gray-50 focus:outline-none dark:text-white"
                                type="button">
                                <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 4 15">
                                    <path
                                        d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                </svg>
                            </button>
                            <div id="dropdownDots{{ $blog->id }}"
                                class="hidden absolute z-10 right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                <div class="py-1" role="menu" aria-orientation="vertical"
                                    aria-labelledby="dropdownMenuIconButton{{ $blog->id }}">
                                    <a href="/dashboard/blogs/{{ $blog->id }}/edit"
                                        class="block px-4 no-underline py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                        role="menuitem">Edit</a>
                                    <form action="/dashboard/blogs/{{ $blog->id }}" method="POST"
                                        class="block px-4 py-2 no-underline text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                        role="menuitem">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>

                        </td>
                    </tr>
                @endforeach
            @else
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th class="" colspan="5">
                        <h1 class="p-5 hidden w-full text-center  mx-auto">Post Not Found</h1>
                        <h4 class="p-5 w-full text-center  mx-auto">Post Not Found</h4>
                    </th>
                </tr>
            @endif
        </tbody>
    </table>
</div>
<div class=" my-2">
    {{ $blogs->links() }}
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownToggle = document.querySelector('[data-dropdown-toggle]');
        const dropdownMenu = document.getElementById(dropdownToggle.getAttribute('data-dropdown-toggle'));

        dropdownToggle.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true' || false;
            this.setAttribute('aria-expanded', !expanded);
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function(event) {
            if (!dropdownMenu.contains(event.target) && dropdownToggle !== event.target) {
                dropdownMenu.classList.add('hidden');
                dropdownToggle.setAttribute('aria-expanded', 'false');
            }
        });
    });
</script>
