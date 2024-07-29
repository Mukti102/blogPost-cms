<nav data-aos="fade-up"
    class="bg-white shadow-md z-50 top-0 sm:px-10 border-gray-200 fixed right-0 left-0 dark:bg-dark dark:border-gray-700">
    <div class="md:max-w-screen-xl w-full flex flex-wrap items-center justify-between mx-auto py-2">
        @if ($whatsApp->logo !== null)
            <a href="#"
                class="flex no-underline text-black dark:text-white items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('storage/' . $whatsApp->logo) }}" class="md:w-12 md:h-12 w-10 h-10" alt="">
            </a>
        @else
            <a href="#"
                class="flex no-underline text-black dark:text-white items-center space-x-3 rtl:space-x-reverse">
                <h1 class="font-bold text-2xl">MB<span class="font-medium">logs</span></h1>
            </a>
        @endif
        <button onclick="toggle()" data-collapse-toggle="navbar-multi-level" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden  focus:outline-none focus:ring-2  dark:text-gray-400 "
            aria-controls="navbar-multi-level" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="w-full  md:block md:w-auto">
            <ul id="ul"
                class="flex transition-all duration-100 right-0 left-0 -top-[1000px] absolute md:static md:text-[15px]  text-2xl gap-5 pt-28 items-center flex-col font-medium p-4 md:p-0 mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white md:h-full h-screen dark:bg-dark md:dark:bg-dark dark:border-gray-700">
                <li class="list-none ">
                    <a href="/"
                        class="block  w-max no-underline py-2 text-black px-3 dark:text-white  rounded md:bg-transparent md:p-0 hover:text-sky-700  md:dark:bg-transparent"
                        aria-current="page">Home</a>
                </li>
                <li class="list-none">
                    <a href="/blogs"
                        class="block w-max no-underline py-2 text-black px-3 dark:text-white  rounded md:bg-transparent md:p-0 hover:text-sky-700  md:dark:bg-transparent"
                        aria-current="page">Blogs</a>
                </li>
                <li class="list-none">
                    @auth
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center justify-between w-full py-2 px-3 text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-sky-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-sky-500 dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Dropdown
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLargeButton">
                                <li class="list-none">
                                    <a href="/dashboard"
                                        class="block no-underline px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                        out</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="/login" id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="block w-max no-underline py-2 text-black px-3 dark:text-white  rounded md:bg-transparent md:p-0 hover:text-sky-700  md:dark:bg-transparent"
                            aria-current="page"><span class="mx-1">Login</span>
                            <svg fill='currentColor' class="hidden" width="22px" height="22px" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22,20a1,1,0,0,1-2,0V4a1,1,0,0,1,2,0ZM3,13H14.586l-2.293,2.293a1,1,0,1,0,1.414,1.414l4-4a1,1,0,0,0,0-1.414l-4-4a1,1,0,1,0-1.414,1.414L14.586,11H3a1,1,0,0,0,0,2Z" />
                            </svg>
                        </a>
                    @endauth
                </li>
                <li class="flex list-none items-center">
                    @include('components.toggle')
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    const state = false
    const ul = document.querySelector('#ul')

    function toggle() {
        ul.classList.toggle('-top-[1000px]')
    }
</script>
