@extends('pages.admin.components.layouts.app')

@section('content')
    <div class="p-8">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Website Setting
            </h1>
            <p class="text-gray-500 mt-1">
                Kelola informasi website utama seperti profil, kontak dan logo
            </p>
        </div>

        <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid lg:grid-cols-3 gap-6">

                {{-- LEFT CONTENT --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- INFORMASI WEBSITE --}}
                    <div class="bg-white rounded-xl shadow-sm border p-6">

                        <h2 class="text-lg font-semibold mb-5 border-b pb-3">
                            Informasi Website
                        </h2>

                        <div class="space-y-5">

                            <div>
                                <label class="text-sm font-medium text-gray-600">
                                    Nama Website
                                </label>
                                <input type="text" name="name" value="{{ $setting->name ?? '' }}"
                                    class="w-full mt-1 border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                                    placeholder="Contoh : Suzuki Online">
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-600">
                                    Deskripsi Singkat
                                </label>
                                <textarea name="description_short" rows="3"
                                    class="w-full mt-1 border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                                    placeholder="Deskripsi singkat website">{{ $setting->description_short ?? '' }}</textarea>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-gray-600">
                                    Tentang Kami
                                </label>
                                <textarea id="editor" name="about" rows="6"
                                    class="w-full mt-1 border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                                    placeholder="Isi halaman tentang kami">{{ $setting->about ?? '' }}</textarea>
                            </div>

                        </div>

                    </div>


                    {{-- GOOGLE MAPS --}}
                    <div class="bg-white rounded-xl shadow-sm border p-6">

                        <h2 class="text-lg font-semibold mb-5 border-b pb-3">
                            Google Maps
                        </h2>

                        <textarea name="google_maps" rows="4" class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                            placeholder="Paste embed google maps disini">{{ $setting->google_maps ?? '' }}</textarea>

                    </div>

                </div>



                {{-- RIGHT SIDEBAR --}}
                <div class="space-y-6">

                    {{-- LOGO --}}
                    <div class="bg-white rounded-xl shadow-sm border p-6">

                        <h2 class="text-lg font-semibold mb-5 border-b pb-3">
                            Logo Website
                        </h2>

                        <div class="space-y-4">

                            <input type="file" name="logo" class="w-full border rounded-lg px-3 py-2">

                            @if (!empty($setting->logo))
                                <img src="{{ asset('storage/' . $setting->logo) }}" class="w-40 rounded-lg border">
                            @endif

                        </div>

                    </div>


                    {{-- KONTAK --}}
                    <div class="bg-white rounded-xl shadow-sm border p-6">

                        <h2 class="text-lg font-semibold mb-5 border-b pb-3">
                            Kontak
                        </h2>

                        <div class="space-y-4">

                            <div>
                                <label class="text-sm text-gray-600">
                                    Nama Lokasi
                                </label>
                                <input type="text" name="location" value="{{ $setting->location ?? '' }}"
                                    class="w-full mt-1 border rounded-lg px-4 py-2">
                            </div>
                            <div>
                                <label class="text-sm text-gray-600">
                                    Alamat
                                </label>
                                <input type="text" name="address" value="{{ $setting->address ?? '' }}"
                                    class="w-full mt-1 border rounded-lg px-4 py-2">
                            </div>

                            <div>
                                <label class="text-sm text-gray-600">
                                    Nomor WhatsApp
                                </label>
                                <input type="text" name="no_wa" value="{{ $setting->no_wa ?? '' }}"
                                    class="w-full mt-1 border rounded-lg px-4 py-2" placeholder="628xxxxxxxx">
                            </div>

                            <div>
                                <label class="text-sm text-gray-600">
                                    Email
                                </label>
                                <input type="email" name="email" value="{{ $setting->email ?? '' }}"
                                    class="w-full mt-1 border rounded-lg px-4 py-2" placeholder="email@website.com">
                            </div>

                        </div>

                    </div>


                    {{-- SAVE BUTTON --}}
                    <div class="bg-white border shadow-sm rounded-xl p-6">

                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-medium transition">
                            Simpan Setting
                        </button>

                    </div>

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
    <!-- Safe CKEditor Init -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const editorElement = document.querySelector('#editor');

            if (editorElement && !editorElement.classList.contains('ck-loaded')) {

                ClassicEditor
                    .create(editorElement)
                    .then(editor => {
                        editorElement.classList.add('ck-loaded');
                    })
                    .catch(error => console.error(error));
            }

        });
    </script>
@endpush
