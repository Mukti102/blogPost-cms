<div data-aos="fade-up"
    class="md:max-w-[30%] w-full my-5 hover:shadow-xl hover:-translate-y-1  duration-300  transition-all ease-in-out h-80 md:h-96 relative bg-white border border-gray-200 rounded-lg shadow dark:bg-dark dark:border-gray-900">
    <a href="/blogs/{{ $blog->id }}" class="w-full block h-[220px] rounded-md bg-black">
        @if ($blog->image != null)
            <img class="rounded-t-lg  w-full h-full object-cover" src="{{ asset('storage/' . $blog->image) }}"
                alt="" />
        @else
            <img class="rounded-t-lg w-full h-full object-cover"
                src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=2622&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="" />
        @endif
    </a>
    <div class="px-2 py-2 flex flex-col items-center justify-center">
        <div class="w-max absolute left-0 top-0 flex my-1 flex-wrap">
            <div
                class="flex h-8 w-8 bg-red-300 border-[1.3px] border-white rounded-full overflow-hidden border-1 shadow-md gap-2 mt-2 ml-3 items-center">
                @if ($blog->user->photo_profile)
                    <img src="{{ asset('storage/' . $blog->user->photo_profile) }}">
                @else
                    <img class="w-full object-cover h-full "
                        src="https://tse1.mm.bing.net/th?id=OIP.hyLsJh3chqROf-s7RoNsEAHaHX&pid=Api&P=0&h=180"
                        alt="Rounded avatar">
                @endif
            </div>
        </div>
        <div class="w-max  absolute right-2  top-0 flex my-1 flex-wrap">
            @include('components.category', ['category' => $blog->category->slug])
        </div>
        <div class="w-full h-10">
            <a href="/blogs/{{ $blog->id }}" class="no-underline">
                <h5
                    class="mb-2 md:mt-2 hidden md:flex  font-medium tracking-tight text-gray-900 text-sm md:text-lg dark:text-gray-200">
                    {{ Illuminate\Support\Str::limit($blog->title) }}</h5>
                <h5
                    class="mb-2 md:hidden text-sm md:text-lg tracking-tight text-gray-900 dark:text-gray-300 font-medium">
                    {{ $blog->title, 30 }}</h5>
            </a>
        </div>
        <div
            class="w-full dark:text-gray-200 justify-between flex absolute py-5 px-3 text-gray-700 text-[12px]  bottom-0">
            <div>
                <span><a class="text-gray-700 text-[10px] md:text-xs no-underline font-medium dark:text-sky-500"
                        href="/category/{{ $blog->category->slug }}">{{ $blog->category->name }}</a></span>
            </div>
            <div>
                <span class="md:text-xs text-[10px]">{{ $blog->created_at->diffForHumans() }}</span>
            </div>
        </div>
    </div>
</div>
