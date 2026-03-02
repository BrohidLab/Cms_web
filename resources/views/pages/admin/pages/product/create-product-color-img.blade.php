@extends('pages.admin.components.layouts.app')


@section('content')
    <div class="max-w-6xl mx-auto space-y-6">

        <div>
            <h1 class="text-3xl font-semibold text-gray-800">Tambah Product</h1>
            <p class="text-gray-500">Tambah produk mobil baru</p>
        </div>



        <div class="bg-white rounded-2xl shadow border border-gray-100 p-8 space-y-10">

            <div>
                <h2 class="text-lg font-semibold mb-6 text-gray-800">Type Color Product</h2>
                <form action="{{ route('product.store_product_img') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-xl">
                            <ul class="list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                    <div class="grid md:grid-cols-4 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Type</label>
                            <select name="type_id" id="type-select"
                                class="w-full border border-gray-300 rounded-xl px-4 py-2.5">
                                <option value="">-- Pilih Type --</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">
                                        {{ $type->name }} - {{ $type->transmition }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- COLOR --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Color</label>
                            <select name="color_id" id="color-select"
                                class="w-full border border-gray-300 rounded-xl px-4 py-2.5">
                                <option value="">-- Pilih Color --</option>
                            </select>
                        </div>

                        {{-- IMAGE --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-600 mb-1">Upload Image</label>
                            <input type="file" name="image"
                                class="w-full border border-gray-300 rounded-xl px-4 py-2.5">
                        </div>

                        {{-- MAIN IMAGE --}}
                        <div class="md:col-span-2 flex items-center gap-2">
                            <input type="checkbox" name="is_main" value="1">
                            <label class="text-sm text-gray-600">Set sebagai gambar utama</label>
                        </div>
                        <div class="md:col-span-4">
                            <div class="w-full py-2 pb-5 border-b border-gray-400 flex items-center justify-end">
                                <button type="submit" class="bg-green-600 text-sm px-5 py-2 text-white rounded-md">
                                    Tambah Type Color
                                </button>
                            </div>

                            @if (isset($images) && $images->count())
                                <div class="mt-10 space-y-8">

                                    <h2 class="text-lg font-semibold text-gray-800">
                                        Product Image List
                                    </h2>

                                    @foreach ($images as $typeId => $typeImages)
                                        <div class="bg-white border rounded-2xl shadow-sm">

                                            {{-- Header Type --}}
                                            <div class="px-6 py-4 border-b bg-gray-50 rounded-t-2xl">
                                                <h3 class="font-semibold text-gray-800">
                                                    {{ $typeImages->first()->type->name }}
                                                    - {{ $typeImages->first()->type->transmition }}
                                                </h3>
                                            </div>

                                            <div class="p-6">

                                                <div class="flex gap-6 overflow-x-auto pb-2">

                                                    @foreach ($typeImages->groupBy('color_id') as $colorId => $colorImages)
                                                        <div
                                                            class="min-w-[220px] border rounded-2xl p-4 bg-gray-50 shadow-sm">

                                                            {{-- Color Name --}}
                                                            <div class="flex items-center gap-2 mb-3">
                                                                <h4 class="font-medium text-gray-700">
                                                                    {{ $colorImages->first()->color->name }}
                                                                </h4>

                                                                <div class="w-5 h-5 rounded-full border"
                                                                    style="background-color: {{ $colorImages->first()->color->code_color }}">
                                                                </div>

                                                                @if ($colorImages->first()->color->jenis_color === 'two_tone')
                                                                    <div class="w-5 h-5 rounded-full border"
                                                                        style="background-color: {{ $colorImages->first()->color->code_color2 }}">
                                                                    </div>
                                                                @endif
                                                            </div>

                                                            {{-- Image --}}
                                                            @php $image = $colorImages->first(); @endphp

                                                            <div class="relative group">
                                                                <img src="{{ asset('storage/' . $image->image) }}"
                                                                    class="w-full h-40 object-cover rounded-xl">

                                                                @if ($image->is_main)
                                                                    <div
                                                                        class="absolute top-2 left-2 bg-blue-600 text-white text-xs px-2 py-1 rounded">
                                                                        MAIN
                                                                    </div>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    @endforeach

                                                </div>

                                            </div>

                                        </div>
                                    @endforeach

                                </div>
                            @endif

                        </div>
                    </div>
                </form>
            </div>
            <div class="flex justify-end mt-6 gap-3">
                <a href="{{ route('product.create_product_color', $product->id) }}"
                    class="bg-gray-200 hover:bg-gray-400 disabled:bg-gray-400 disabled:cursor-not-allowed text-md px-6 py-2 flex items-center rounded-sm shadow transition">
                    <span class="material-symbols-outlined">
                        chevron_left
                    </span>
                    Kembali
                </a>
                <a href="{{ route('product.create_gallery', $product->id) }}" id="btn-next"
                    class="bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 disabled:cursor-not-allowed text-md text-white px-6 py-2 flex items-center rounded-sm shadow transition">
                    Selanjutnya
                    <span class="material-symbols-outlined">
                        chevron_right
                    </span>
                </a>
            </div>
        </div>

    </div>
@endsection
@push('script')
    <script>
        $('#type-select').on('change', function() {
            let getColorUrl = "{{ route('product.get_color_by_type', ':id') }}";
            let typeId = $(this).val();

            $('#color-select').html('<option value="">Loading...</option>');

            if (typeId) {
                let url = getColorUrl.replace(':id', typeId);
                $.get(url, function(data) {

                    let options = '<option value="">-- Pilih Color --</option>';

                    data.forEach(function(item) {
                        options += `<option value="${item.id}">
                                ${item.name}
                            </option>`;
                    });

                    $('#color-select').html(options);
                });

            } else {
                $('#color-select').html('<option value="">-- Pilih Color --</option>');
            }
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
