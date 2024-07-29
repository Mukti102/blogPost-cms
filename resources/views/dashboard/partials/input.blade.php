<div class="mr-auto md:mr-4 md:w-56">
    <form action="/dashboard/{{ $props }}" class="relative w-full  min-w-[200px] h-8 md:h-10">
        @csrf
        <input name="search"
            class="peer w-full h-full md:placeholder:text-base placeholder:text-xs input-shadow bg-transparent text-gray-700 outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-2.5 rounded-[4px] placeholder:font-semibold placeholder:font-sans border-blue-gray-200 focus:border-none"
            placeholder="Search...">
    </form>
</div>
