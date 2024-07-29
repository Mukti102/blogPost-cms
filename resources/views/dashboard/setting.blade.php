@extends('dashboard.index')
@section('content')
    {{-- alert --}}
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
    <form action="setting/1" enctype="multipart/form-data" method="POST"
        class="w-full gap-3 border-[1.2px] border-gray-100 shadow-md pb-5 md:gap-8 px-2 flex md:flex flex-col">
        @csrf
        @method('put')
        {{-- Logo --}}
        <div class="w-max mx-auto gap-1 flex flex-col items-center">
            <div class="md:w-32 w-32 h-32 md:h-32 rounded-full overflow-hidden">
                @if ($setting->logo)
                    <img src="{{ asset('storage/' . $setting->logo) }}" class="w-full h-full object-cover"
                        alt="Profile Picture">
                @endif
            </div>
        </div>
        <div class="flex-1 px-5 md:0 mt-10">
            <div class="flex gap-5 my-4">
                <div class="md:w-[49%] w-full">
                    <label for="whatsApp" class="text-sm">Nomor WhatsApp</label>
                    <input type="text" value="{{ $setting->whatsApp }}" placeholder="081336920627" name="whatsApp"
                        class="block w-full rounded-sm mt-1 border-0 text-sm bg-gray-200 h-9">
                </div>
            </div>
            <div class="flex gap-5 my-4">
                <div class="md:w-1/2 w-full">
                    <label for="logo" class="text-sm">Logo</label>
                    <input type="file" id="fileImage" name="logo" onchange="previewChange()"
                        class="block w-full rounded-sm mt-1 border-0 text-sm bg-gray-200 h-9">
                    {{-- old logo --}}
                    <input type="hidden" name="oldLogo" value="{{ $setting->logo }}">
                    @if ($setting->logo)
                        <img class="md:w-32 w-20 h-20 mt-2 object-cover md:h-32"
                            src="{{ asset('storage/' . $setting->logo) }}" id="previewImage" alt="ll">
                    @endif
                </div>
            </div>
        </div>
        <div class="w-full flex pl-5">
            <button type="submit"
                class="w-max text-sm px-5 bg-teal-500 text-white py-1 md:text-lg rounded-sm">Save</button>
        </div>
    </form>
    <script>
        const previewChange = () => {
            const fileImage = document.querySelector('#fileImage');
            const previewImage = document.querySelector('#previewImage');
            const oFReader = new FileReader();
            oFReader.readAsDataURL(fileImage.files[0]);

            oFReader.onload = function(oFREvent) {
                previewImage.src = oFREvent.target.result;
            };
        }
    </script>
@endsection
