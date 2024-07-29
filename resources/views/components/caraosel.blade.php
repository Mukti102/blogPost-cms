<div id="controls-carousel" class="relative w-full md:w-[60%]" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-[330px] rounded-sm overflow-hidden md:rounded-lg md:h-96">
        <!-- Item 1 -->
        @foreach ($blogs as $blog)
            <div class="hidden duration-700 ease-in-out carousel-item" data-carousel-item>
                <img class="h-full w-full object-cover"
                    src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=2622&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <div
                    class="w-full h-full flex bg-black justify-between flex-col py-2 md:py-4 bg-opacity-30 md:px-14 px-3 text-white absolute top-0">
                    <div class="w-max absolute left-1 top-3 md:left-5 md:top-3 flex my-1 flex-wrap">
                        <div
                            class="flex md:h-10 h-8 w-8 md:w-10 bg-red-300 border-[1.3px] border-white rounded-full overflow-hidden border-1 shadow-md gap-2 mt-2 ml-3 items-center">
                            <img class="w-full object-cover h-full"
                                src="https://tse1.mm.bing.net/th?id=OIP.hyLsJh3chqROf-s7RoNsEAHaHX&pid=Api&P=0&h=180"
                                alt="Rounded avatar">
                        </div>
                    </div>
                    <div class="h-[80%] flex items-center text-lg md:text-3xl">
                        <h4 class="md:hidden">{{ Illuminate\Support\Str::limit($blog->excerpt, 100) }}</h4>
                        <h2 class="hidden md:block">{{ Illuminate\Support\Str::limit($blog->excerpt, 100) }}</h2>
                    </div>
                    <div class="flex justify-between">
                        <div class="text-xs font-medium mb-3 text-gray-200 md:text-sm">
                            <span class="text-sm">{{ $blog->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="flex right-1 z-50 bottom-5 absolute">
                        <!-- Slider controls -->
                        <button type="button"
                            class="top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex items-center justify-center md:w-7 md:h-7 w-5 h-5 rounded-full dark:bg-opacity-60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#fff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title></title>
                                        <g id="Complete">
                                            <g id="arrow-left">
                                                <g>
                                                    <polyline data-name="Right" fill="none" id="Right-2"
                                                        points="7.6 7 2.5 12 7.6 17" stroke="#fff"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    </polyline>
                                                    <line fill="none" stroke="#fff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" x1="21.5"
                                                        x2="4.8" y1="12" y2="12"></line>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="top-0 rotate-180 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex items-center justify-center md:w-7 md:h-7 w-5 h-5 rounded-full dark:bg-opacity-60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#fff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title></title>
                                        <g id="Complete">
                                            <g id="arrow-left">
                                                <g>
                                                    <polyline data-name="Right" fill="none" id="Right-2"
                                                        points="7.6 7 2.5 12 7.6 17" stroke="#fff"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    </polyline>
                                                    <line fill="none" stroke="#fff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" x1="21.5"
                                                        x2="4.8" y1="12" y2="12"></line>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
