@extends('pages.admin.components.layouts.app')


@section('content')
    <div class="max-w-6xl mx-auto space-y-6">

        <div>
            <h1 class="text-3xl font-semibold text-gray-800">Tambah Product</h1>
            <p class="text-gray-500">Tambah produk mobil baru</p>
        </div>



        <div class="bg-white rounded-2xl shadow border border-gray-100 p-8 space-y-10">

            <div>
                <h2 class="text-xl font-semibold text-gray-800">
                    Product Gallery
                </h2>
                <p class="text-gray-500 text-sm">
                    Upload multiple images untuk interior atau exterior
                </p>
            </div>

            <form action="{{ route('product.store_gallery') }}" method="POST" enctype="multipart/form-data" id="gallery-form">
                @csrf

                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="grid md:grid-cols-2 gap-6">

                    {{-- TYPE --}}
                    <div>
                        <label class="block text-sm font-medium mb-2">
                            Gallery Type
                        </label>
                        <select name="category"
                            class="w-full border rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500">
                            <option value="interior">Interior</option>
                            <option value="exterior">Exterior</option>
                        </select>
                    </div>

                    {{-- FILE INPUT --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-2">
                            Upload Images
                        </label>

                        <div class="border-2 border-dashed border-gray-300 rounded-2xl p-6 text-center">

                            <p class="text-gray-500 text-sm mb-2">
                                Drag & Drop images here
                            </p>
                            <p class="text-gray-400 text-xs mb-3">Note : Maks. size image 2MB</p>

                            <label for="file-input"
                                class="bg-blue-600 text-white px-5 py-2 rounded-xl text-sm shadow cursor-pointer inline-block">
                                Browse Files
                            </label>

                            <input type="file" id="file-input" name="images[]" multiple class="hidden">

                        </div>
                    </div>

                </div>

                {{-- PREVIEW AREA --}}
                <div id="preview-container" class="grid gap-4 md:grid-cols-5 mt-6">
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-xl shadow">
                        Upload Gallery
                    </button>
                </div>

            </form>
            <div class="space-y-14">

                @forelse ($galleries as $type => $items)
                    <section>

                        {{-- Header Category --}}
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h2 class="text-2xl font-semibold capitalize text-gray-800">
                                    {{ $type }}
                                </h2>
                                <p class="text-sm text-gray-500">
                                    {{ $items->count() }} images available
                                </p>
                            </div>

                            <span
                                class="px-4 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-600 uppercase tracking-wide">
                                {{ $type }}
                            </span>
                        </div>


                        {{-- Grid Layout --}}
                        <div
                            class="grid 
                        grid-cols-1 
                        sm:grid-cols-2 
                        lg:grid-cols-3 
                        xl:grid-cols-4 
                        gap-6">

                            @foreach ($items as $gallery)
                                <div
                                    class="relative rounded-3xl overflow-hidden shadow-md hover:shadow-xl transition duration-300 group bg-white">

                                    {{-- Image --}}
                                    <img src="{{ asset('storage/' . $gallery->image) }}"
                                        class="w-full h-32 object-cover transition duration-500 group-hover:scale-105">

                                    {{-- Overlay --}}
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition">
                                    </div>

                                    {{-- Delete Button --}}
                                    <button data-url="{{ route('product.delete_gallery', $gallery->id) }}"
                                        class="btn-delete-gallery absolute top-4 right-4 bg-white/90 backdrop-blur text-red-600 text-xs font-medium px-3 py-1 rounded-full shadow opacity-0 group-hover:opacity-100 transition hover:bg-red-600 hover:text-white">
                                        Delete
                                    </button>

                                    {{-- Bottom Info --}}
                                    <div
                                        class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition">
                                        <p class="text-sm font-medium">
                                            {{ ucfirst($type) }}
                                        </p>
                                    </div>

                                </div>
                            @endforeach

                        </div>

                    </section>

                @empty

                    {{-- Empty State --}}
                    <div class="flex flex-col items-center justify-center py-20 text-center">
                        <h3 class="text-lg font-semibold text-gray-700">
                            No Gallery Available
                        </h3>
                        <p class="text-sm text-gray-500 mt-1">
                            Upload images to display them here.
                        </p>
                    </div>
                @endforelse

            </div>
            <div class="flex justify-end mt-6 gap-3">
                <a href="{{ route('product.create_product_type', $product->id) }}"
                    class="bg-gray-200 hover:bg-gray-400 disabled:bg-gray-400 disabled:cursor-not-allowed text-md px-6 py-2 flex items-center rounded-sm shadow transition">
                    <span class="material-symbols-outlined">
                        chevron_left
                    </span>
                    Kembali
                </a>
                <a href="{{ route('product.publish_product', $product->id) }}" id="btn-next"
                    class="bg-green-600 hover:bg-green-700 disabled:bg-gray-400 disabled:cursor-not-allowed text-md text-white px-6 py-2 flex items-center rounded-sm shadow transition">
                    Publish Product
                    <span class="material-symbols-outlined text-md ml-2">
                        save
                    </span>
                </a>
            </div>
        </div>

    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {

            const fileInput = $('#file-input')[0];
            const previewContainer = $('#preview-container');
            const browseBtn = $('#browse-btn');
            const dropArea = $('#drop-area');

            let selectedFiles = new DataTransfer();

            // Klik tombol browse
            browseBtn.on('click', function() {
                fileInput.click();
            });

            // Klik area drop
            dropArea.on('click', function() {
                fileInput.click();
            });

            // Saat pilih file
            $('#file-input').on('change', function(e) {

                for (let file of e.target.files) {
                    selectedFiles.items.add(file);
                }

                fileInput.files = selectedFiles.files;

                renderPreview();
            });

            // Render Preview
            function renderPreview() {

                previewContainer.html('');

                Array.from(selectedFiles.files).forEach((file, index) => {

                    let reader = new FileReader();

                    reader.onload = function(e) {

                        let preview = `
                    <div class="relative group w-full">
                        <img src="${e.target.result}"
                             class="w-full h-32 object-cover rounded-xl shadow">

                        <button type="button"
                                data-index="${index}"
                                class="remove-image absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition">
                            ✕
                        </button>
                    </div>
                `;

                        previewContainer.append(preview);
                    };

                    reader.readAsDataURL(file);
                });
            }

            // Remove image sebelum submit
            $(document).on('click', '.remove-image', function() {

                let index = $(this).data('index');

                let newFiles = new DataTransfer();

                Array.from(selectedFiles.files).forEach((file, i) => {
                    if (i !== index) {
                        newFiles.items.add(file);
                    }
                });

                selectedFiles = newFiles;
                fileInput.files = selectedFiles.files;

                renderPreview();
            });

        });
    </script>
    <script>
        $(document).on('click', '.btn-delete-image', function() {

            let button = $(this);
            let url = button.data('url');
            let card = button.closest('.relative');

            $.ajax({
                url: url,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function() {
                    card.fadeOut(300, function() {
                        $(this).remove();
                    });
                }
            });
        });
    </script>
@endpush
