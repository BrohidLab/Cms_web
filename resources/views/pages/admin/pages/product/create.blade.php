@extends('pages.admin.components.layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto space-y-6">

        <div>
            <h1 class="text-3xl font-semibold text-gray-800">Tambah Product</h1>
            <p class="text-gray-500">Tambah produk mobil baru</p>
        </div>

        <form action="{{ $product ? route('product.update_product', $product->id) : route('product.store_product') }}"
            method="POST">

            @csrf

            @if ($product)
                @method('PUT')
            @endif

            <div class="bg-white rounded-2xl shadow border border-gray-100 p-8 space-y-10">

                <!-- BASIC -->
                <div>
                    <h2 class="text-lg font-semibold mb-6 text-gray-800">Basic Information</h2>

                    <div class="grid md:grid-cols-2 gap-6">

                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Product Name</label>
                            <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}"
                                class="w-full border border-gray-300 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Alternatife Link</label>
                            <input type="text" name="slug" value="{{ old('slug', $product->slug ?? '') }}"
                                class="w-full border border-gray-300 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Seater</label>
                            <input type="number" name="seater" value="{{ old('seater', $product->seater ?? '') }}"
                                class="w-full border border-gray-300 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Engine (cc)</label>
                            <input type="text" name="cc" value="{{ old('cc', $product->cc ?? '') }}"
                                class="w-full border border-gray-300 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>


                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600 mb-1">Description</label>
                            <textarea name="description" id="editor" rows="6"
                                class="w-full min-h-['240px'] border border-gray-300 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500">
                            {{ old('description', $product->description ?? '') }}</textarea>
                        </div>

                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-md text-white px-6 py-2 flex items-center rounded-sm shadow">
                        Selanjutnya
                        <span class="material-symbols-outlined">
                            chevron_right
                        </span>
                    </button>
                </div>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
