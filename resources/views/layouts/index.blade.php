<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body class="antialiased">
    <section class="">
        @yield('contents')
    </section>
</body>
{{-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script> --}}


</html>
