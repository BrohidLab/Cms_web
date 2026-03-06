@extends('pages.admin.components.layouts.app')

@section('content')
    <div class="p-8 bg-gray-50 min-h-screen">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Tambah Artikel</h1>
            <p class="text-sm text-gray-500 mt-1">Buat dan publish artikel baru</p>
        </div>

        <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white rounded-2xl shadow-sm border p-8 space-y-8 max-w-5xl">

            @csrf

            <!-- Judul -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Judul Artikel
                </label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                    placeholder="Masukkan judul artikel">
                @error('title')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Slug -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Slug
                </label>
                <input type="text" id="slug"
                    class="w-full bg-gray-100 border-gray-200 rounded-xl px-4 py-3 text-gray-500" readonly>
            </div>

            <!-- Label -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Label (pisahkan dengan koma)
                </label>
                <input type="text" name="content_label" value="{{ old('content_label') }}"
                    placeholder="Laravel, Backend, Tutorial"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
            </div>

            <!-- Thumbnail Modern Upload -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    Thumbnail
                </label>

                <div id="uploadBox"
                    class="relative border-2 border-dashed border-gray-300 rounded-2xl p-8 text-center cursor-pointer hover:border-blue-500 transition">

                    <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                        class="absolute inset-0 opacity-0 cursor-pointer">

                    <div id="uploadContent" class="space-y-3">
                        <div class="text-4xl text-gray-400">🖼️</div>
                        <p class="text-gray-600 font-medium">
                            Klik atau drag gambar ke sini
                        </p>
                        <p class="text-sm text-gray-400">
                            PNG, JPG, JPEG (Max 2MB)
                        </p>
                    </div>

                    <img id="preview" class="hidden mx-auto max-h-60 rounded-xl shadow-md">
                </div>
            </div>

            <!-- Content -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Konten Artikel
                </label>
                <textarea name="content" id="editor" rows="10"
                    class="w-full border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none transition">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-4 pt-6 border-t">

                <!-- Close = Simpan Draft -->
                <button type="submit" name="action" value="draft"
                    class="px-6 py-3 rounded-xl border text-gray-600 hover:bg-gray-100 transition">
                    Close
                </button>

                <!-- Publish -->
                <button type="submit" name="action" value="publish"
                    class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold shadow-md transition">
                    🚀 Publish
                </button>

            </div>

        </form>
    </div>
@endsection

@push('style')
    <style>
        .ck-editor__editable_inline {
            min-height: 400px;
        }
    </style>
@endpush

@push('script')
    <!-- Auto Slug -->
    <script>
        document.getElementById('title').addEventListener('keyup', function() {
            let slug = this.value
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-');

            document.getElementById('slug').value = slug;
        });
    </script>

    <!-- Modern Thumbnail Preview -->
    <script>
        const input = document.getElementById('thumbnail');
        const preview = document.getElementById('preview');
        const uploadContent = document.getElementById('uploadContent');

        input.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                uploadContent.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        });
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
