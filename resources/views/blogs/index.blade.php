@extends('layouts.main');
@section('whatsApp', $whatsApp->whatsApp)
@section('title', 'Blogs')
@section('contents')
    <section class="w-full mt-20 flex flex-col items-center justify-center  px-5">
        <main class="w-full  flex mt-0 md:mt-7 gap-2  justify-between">
            <div class="w-[100%] justify-center md:flex gap-5 flex-wrap">
                @include('components.caraosel', ['blogs' => $caraosel])
                @foreach ($Blogs as $Blog)
                    @include('components.card', ['blog' => $Blog])
                @endforeach
            </div>
        </main>
        <div class="w-full px-10 my-2 dark:text-white">
            {{ $Blogs->links('vendor.pagination.tailwind') }}
        </div>
    </section>
    {{-- balloon whatsapp --}}
    @include('components.whatsapp', ['whatsApp' => $whatsApp->whatsApp])
    @include('components.footer')
@endsection
