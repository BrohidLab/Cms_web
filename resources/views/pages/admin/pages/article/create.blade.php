@extends('pages.admin.components.layouts.app')

@section('content')
<div class="p-6">

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Artikel</h1>
        <p class="text-sm text-gray-500">Buat artikel baru untuk website</p>
    </div>

    <form action="{{ route('article.store') }}" 
          method="POST" 
          enctype="multipart/form-data"
          class="bg-white rounded-xl shadow-md p-6 space-y-6">

        @csrf

        <!-- Judul -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Judul Artikel
            </label>
            <input type="text" 
                   name="title"
                   id="title"
                   value="{{ old('title') }}"
                   class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none"
                   placeholder="Masukkan judul artikel">
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Slug Preview -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Slug
            </label>
            <input type="text"
                   id="slug"
                   class="w-full bg-gray-100 border rounded-lg px-4 py-2 text-gray-500"
                   readonly>
        </div>

        <!-- Content Label -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Label (pisahkan dengan koma)
            </label>
            <input type="text"
                   name="content_label"
                   value="{{ old('content_label') }}"
                   placeholder="contoh: Laravel, Tutorial, Backend"
                   class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none">
        </div>

        <!-- Thumbnail -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Thumbnail
            </label>

            <input type="file"
                   name="thumbnail"
                   id="thumbnail"
                   accept="image/*"
                   class="w-full border rounded-lg px-4 py-2">

            <div class="mt-3">
                <img id="preview"
                     class="hidden w-40 h-40 object-cover rounded-lg border">
            </div>
        </div>

        <!-- Content -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Konten Artikel
            </label>
            <textarea name="content"
                      id="editor"
                      rows="10"
                      class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none">{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Status
            </label>
            <select name="status"
                    class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none">
                <option value="draft">Draft</option>
                <option value="publish">Publish</option>
            </select>
        </div>

        <!-- Button -->
        <div class="flex justify-end gap-3">
            <a href="{{ route('article.index') }}"
               class="px-4 py-2 rounded-lg border text-gray-600 hover:bg-gray-100">
                Batal
            </a>

            <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow">
                Simpan Artikel
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

<!-- Auto Slug Script -->
<script>
document.getElementById('title').addEventListener('keyup', function() {
    let slug = this.value
        .toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '')
        .replace(/\s+/g, '-');

    document.getElementById('slug').value = slug;
});
</script>

<!-- Preview Thumbnail -->
<script>
document.getElementById('thumbnail').addEventListener('change', function(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('preview');
        output.src = reader.result;
        output.classList.remove('hidden');
    };
    reader.readAsDataURL(event.target.files[0]);
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
