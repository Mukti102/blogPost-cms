@extends('dashboard.index')
@section('content')
    <form id="create" action="/dashboard/blogs" enctype="multipart/form-data" method="POST" class="max-w-3xl mx-auto">
        @csrf
        {{-- judul --}}
        <div class="mb-5">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" value="{{ old('title') }}" id="title" name="title"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Title Blog" required />
            @error('title')
                <p class="text-xs my-1 font-medium px-1 text-red-500">{{ $message }}</p>
            @enderror
        </div>

        {{-- category --}}
        <div class="mb-5">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a
                category</label>
            <select id="countries" name="category_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($categories as $category)
                    <option value='{{ $category->id }}'>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- gambar --}}
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload
                multiple
                files</label>
            <input name="image" onchange="previewChange()"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="multiple_files" type="file" multiple>
            <img id="img-preview" style="width: 150px;margin:10px 0;">
            @error('image')
                <p class="text-xs my-1 font-medium px-1 text-red-500">{{ $message }}</p>
            @enderror
        </div>

        {{-- content --}}
        <article class="prose prose-sm max-w-none">
            <div class="mb-5">
                @error('content')
                    <p class="text-xs my-1 font-medium px-1 text-red-500">{{ $message }}</p>
                @enderror
                <textarea id="editor" name="content" value="{{ old('content') }}"></textarea>
            </div>

        </article>
        <input type="hidden" id="status" name="status">
        <button type="submit" onclick="save()"
            class="text-white max-w-md bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm md:w-max sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
        <button type="submit" class="hidden" onclick="publish()"
            class="text-white max-w-md bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm md:w-max sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Publish</button>
    </form>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        const status = document.querySelector('#status')
        const save = () => {
            status.value = 0
        }
        const publish = () => {
            status.value = 1
        }

        // preview image 
        const previewChange = () => {
            const image = document.querySelector('#multiple_files');
            const preview = document.querySelector('#img-preview');
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0])

            oFReader.onload = (OFRevent) => {
                preview.src = OFRevent.target.result;
            }
        }

        // ckeditor
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
