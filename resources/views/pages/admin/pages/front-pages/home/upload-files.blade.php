@extends('pages.admin.components.layouts.app')

@section('content')
    <div class="p-6">

        <!-- Header -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Upload Banner</h1>
                <p class="text-sm text-gray-500">Upload multiple image / video banner</p>
            </div>

            <a href="{{ route('front_page.homes.index') }}"
                class="px-4 py-2 bg-gray-200 text-gray-700 text-sm rounded-lg hover:bg-gray-300">
                Back
            </a>
        </div>

        <form action="{{ route('front_page.homes.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-2xl shadow-sm">

            @csrf
            <!-- Upload Area -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Upload Files
                </label>

                <div id="drop-area"
                    class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center cursor-pointer hover:border-blue-500 transition">

                    <input type="file" name="files[]" id="fileInput" class="hidden" multiple accept="image/*,video/*">

                    <p class="text-gray-500 text-sm">
                        Drag & Drop files here or
                        <label class="text-blue-600 font-medium">Browse</label>
                    </p>

                    <p class="text-xs text-gray-400 mt-2">
                        Allowed: JPG, PNG, JPEG, MP4, MOV
                    </p>
                </div>
            </div>

            <!-- Preview -->
            <div id="preview-container" class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">
                    Save Banner
                </button>
            </div>

        </form>
    </div>
@endsection
@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const dropArea = document.getElementById('drop-area');
            const fileInput = document.getElementById('fileInput');
            const previewContainer = document.getElementById('preview-container');

            if (!dropArea || !fileInput) return;

            dropArea.addEventListener('click', () => {
                fileInput.click();
            });

            fileInput.addEventListener('change', handleFiles);

            dropArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropArea.classList.add('border-blue-500');
            });

            dropArea.addEventListener('dragleave', () => {
                dropArea.classList.remove('border-blue-500');
            });

            dropArea.addEventListener('drop', (e) => {
                e.preventDefault();
                dropArea.classList.remove('border-blue-500');
                fileInput.files = e.dataTransfer.files;
                handleFiles();
            });

            function handleFiles() {

                previewContainer.innerHTML = "";

                Array.from(fileInput.files).forEach(file => {

                    const fileType = file.type;

                    if (!fileType.startsWith('image/') && !fileType.startsWith('video/')) {
                        alert('File harus berupa image atau video');
                        fileInput.value = "";
                        return;
                    }

                    const reader = new FileReader();

                    reader.onload = function(e) {

                        const wrapper = document.createElement('div');
                        wrapper.className = "relative border rounded-lg overflow-hidden";

                        if (fileType.startsWith('image/')) {

                            wrapper.innerHTML = `
                        <img src="${e.target.result}" class="w-full h-40 object-cover">
                        <span class="absolute top-2 left-2 bg-blue-600 text-white text-xs px-2 py-1 rounded">
                            Image
                        </span>
                    `;

                        } else {

                            wrapper.innerHTML = `
                        <video class="w-full h-40 object-cover" controls>
                            <source src="${e.target.result}">
                        </video>
                        <span class="absolute top-2 left-2 bg-purple-600 text-white text-xs px-2 py-1 rounded">
                            Video
                        </span>
                    `;
                        }

                        previewContainer.appendChild(wrapper);
                    }

                    reader.readAsDataURL(file);

                });

            }

        });
    </script>
@endpush
