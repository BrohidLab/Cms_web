@extends('pages.admin.components.layouts.app')

@section('content')
    <div class="p-6">

        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Testimoni</h1>
            <p class="text-sm text-gray-500">Perbarui testimoni pelanggan</p>
        </div>

        <div class="bg-white rounded-xl border shadow-sm">

            <form action="{{ route('testimoni.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Image -->
                    <div class="md:col-span-2">
                        <label class="text-sm font-semibold text-gray-700">Foto Pelanggan</label>

                        <div class="flex items-center gap-6 mt-2">

                            <img id="preview" src="{{ asset('storage/' . $testimonial->image) }}"
                                class="w-20 h-20 rounded-lg object-cover border">

                            <input type="file" name="image" onchange="previewImage(event)">
                        </div>
                    </div>

                    <!-- Nama -->
                    <div>
                        <label class="text-sm font-semibold text-gray-700">Nama Pelanggan</label>

                        <input type="text" name="nama_pelanggan" value="{{ $testimonial->nama_pelanggan }}"
                            class="w-full px-4 py-2 mt-2 border border-gray-200 rounded-lg">
                    </div>

                    <!-- Produk -->
                    <div>
                        <label class="text-sm font-semibold text-gray-700">Produk</label>

                        <select name="product_id" class="w-full mt-2 px-4 py-2 border border-gray-200 rounded-lg">

                            @foreach ($products as $id => $name)
                                <option value="{{ $id }}" {{ $testimonial->product_id == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- Ulasan -->
                    <div class="md:col-span-2">
                        <label class="text-sm font-semibold text-gray-700">Ulasan</label>

                        <textarea name="ulasan" rows="5" class="w-full mt-2 p-4 border border-gray-200 rounded-lg">{{ $testimonial->ulasan }}</textarea>
                    </div>

                </div>

                <div class="flex justify-end gap-3 px-6 py-4 border-t bg-gray-50">

                    <a href="{{ route('testimoni.index') }}" class="px-4 py-2 border rounded-lg text-gray-600">
                        Batal
                    </a>

                    <button class="px-5 py-2 bg-gray-900 text-white rounded-lg">
                        Update Testimoni
                    </button>

                </div>

            </form>

        </div>

    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('preview').src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
