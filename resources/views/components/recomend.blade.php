<div id="controls-carousel" class="relative w-full md:w-[60%]" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <!-- Item 1 -->
        @foreach ($blogs as $blog)
            <a href="/blogs/{{ $blog->id }}" class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=2622&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <div
                    class="w-full h-full flex  bg-black justify-between flex-col py-4 bg-opacity-60 px-14 text-white absolute top-0">
                    <div class="w-max absolute left-1 top-1  md:left-5 md:top-3 flex my-1 flex-wrap">
                        <div
                            class="flex md:h-10 h-8 w-8 md:w-10 bg-red-300 border-[1.3px] border-white rounded-full overflow-hidden border-1 shadow-md gap-2 mt-2 ml-3 items-center">
                            <img class="w-full object-cover h-full "
                                src="https://tse1.mm.bing.net/th?id=OIP.hyLsJh3chqROf-s7RoNsEAHaHX&pid=Api&P=0&h=180"
                                alt="Rounded avatar">
                        </div>
                    </div>
                    <div class="h-[80%] flex items-center text-lg md:text-3xl">
                        <h2 class="hidden md:block">{{ Illuminate\Support\Str::limit($blog->excerpt, 100) }}
                        </h2>
                        <h4 class="md:hidden block">{{ Illuminate\Support\Str::limit($blog->excerpt, 100) }}
                        </h4>
                    </div>
                    <div class="text-xs text-gray-200 md:text-sm">
                        <h2 class="hidden md:block">{{ $blog->created_at->diffForHumans() }}</h2>
                        <h4 class="md:hidden block">{{ $blog->created_at->diffForHumans() }}</h4>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Slider controls -->
    <button type="button"
        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-100 dark:bg-opacity-70 group-hover:bg-white/50 dark:group-hover:bg-gray-200 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button"
        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-100 dark:bg-opacity-70 group-hover:bg-white/50 dark:group-hover:bg-gray-200 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
