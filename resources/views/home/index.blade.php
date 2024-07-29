@extends('layouts.main')
@section('title', 'Home')
@section('contents')
    @php
        use App\Models\Question;
        $questions = Question::all();
    @endphp
    <section class="container px-3 md:px-0  dark:text-white text-black dark:cursor-none">
        <div class="w-full  h-screen flex justify-center text-center items-center">
            <div data-aos="fade-right" class="md:m-0 mb-28 text">
                <div class="w-full text-center mx-auto">
                    <h1
                        class="font-bold leading-10 md:leading-[60px] text-2xl md:text-3xl w-full py-1 md:text-[60px] dark:text-white">
                        Join The Conversation And share
                        <span
                            class="bg-gradient-to-tr from-emerald-600 to-blue-600 text-transparent bg-clip-text">Thoughts.</span>
                    </h1>
                </div>
                <div class="flex flex-col gap-0 mt-8 w-[90%] md:w-[55%] mx-auto">
                    <p class="text-gray-700 leading-5 dark:text-gray-300 font-normal md:text-[1rem] text-xs">We Value Your
                        Opinion
                        and
                        want to hear from you and let's discuss the topics that matter most to you and share your unique
                        perspective on the world of education and innovation</p>
                </div>
            </div>
            <div
                class="cursor z-40 mix-blend-difference pointer-events-none fixed dark:w-5 rounded-full dark:h-5 bg-black dark:bg-white">
            </div>
        </div>

        <!-- Recent Blog Section -->
        <div class="w-full text dark:cursor-auto flex justify-center text-center items-center">
            <div class="md:w-[55%] w-full">
                <h2 class="text-[2rem]">Recent <span
                        class="after:w-full after:bottom-1 relative after:absolute after:right-0 after:h-[2.5px] after:bg-sky-500 after:block">Blog</span>
                </h2>
                <p class="dark:text-gray-300 text-gray-500 text-[10px] md:text-sm w-[85%] my-2 mx-auto">Lorem ipsum dolor
                    sit amet, consectetur adipisicing elit. Vitae et, architecto tempora fugiat quod magni!</p>
            </div>
        </div>

        <!-- Cards Section -->
        <section class="w-full mt-5 block gap-5">
            <div class="swiper-container md:flex justify-center">
                <div class="swiper-wrapper gap-3 justify-center w-full block md:flex ">
                    @foreach ($blogs as $blog)
                        {{-- <div class="swiper-slide"> --}}
                        @include('components.card', ['blog' => $blog])
                        {{-- </div> --}}
                    @endforeach
                </div>

                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>

                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <a href="/blogs"
                class="w-max rounded-full flex gap-2 items-center bg-sky-600 px-5 py-1 text-white mx-auto mt-5">
                <button class="text-sm md:text-base">See All</button>
                <svg fill="#fff" width="16px" height="16px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.707,18.707a1,1,0,0,1-1.414-1.414L19.586,13H2a1,1,0,0,1,0-2H19.586L15.293,6.707a1,1,0,0,1,1.414-1.414l6,6a1,1,0,0,1,0,1.414Z" />
                </svg>
            </a>
        </section>

        <!-- Frequently Asked Questions Section -->
        <section class="w-full md:px-10 my-40 md:flex block gap-10">
            <div>
                <x-undraw />
            </div>
            <div class="flex-1">
                <h2 class="text-[1.9rem] md:block hidden my-8">Pertanyaan Yang Sering Di <span
                        class="dark:bg-sky-500 bg-sky-500 text-white px-1">Tanyakan?</span></h2>
                <h4 class="text-lg font-semibold md:hidden my-8">Pertanyaan Yang Sering Di <span
                        class="dark:bg-sky-500 bg-sky-500 text-white px-1">Tanyakan?</span></h4>
                @foreach ($questions as $question)
                    <div class="cursor-pointer my-2">
                        <details
                            class="w-full outline-none  md:my-4 shadow-md border-[1px] dark:border-none border-gray-100 dark:bg-gray-200 text-gray-900 rounded-md">
                            <summary
                                class="rounded-md outline-none items-center flex justify-between text-xs px-5 shadow-dark w-full md:text-lg py-2 ">
                                <span class="capitalize">{{ $question->question }}</span>
                                <x-dropdown-icon />
                            </summary>
                            <p class="p-5 md:text-base text-xs">{{ $question->answer }}</p>
                        </details>
                    </div>
                @endforeach
        </section>

        <!-- WhatsApp Balloon -->
        @include('components.whatsapp', ['whatsApp' => $whatsApp->whatsApp])
        @include('components.footer')
    </section>

    <script>
        const cursor = document.querySelector('.cursor');
        document.addEventListener('mousemove', function(e) {
            cursor.style.left = `${e.clientX}px`;
            cursor.style.top = `${e.clientY}px`;
        });

        // Swiper JS Initialization
        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                // when window width is >= 640px
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                // when window width is >= 768px
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30
                }
            }
        });
    </script>
@endsection
