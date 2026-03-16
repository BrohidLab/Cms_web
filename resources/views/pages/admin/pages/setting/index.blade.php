@extends('pages.admin.components.layouts.app')

@section('content')
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-6">Website Setting</h1>

        <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="grid md:grid-cols-2 gap-6">

                <div class="bg-white p-6 rounded-xl shadow">

                    <h2 class="font-semibold mb-4">Informasi Website</h2>

                    <div class="space-y-4">

                        <input type="text" name="name" value="{{ $setting->name ?? '' }}" placeholder="Nama Website"
                            class="w-full border rounded-lg px-3 py-2">

                        <textarea name="description" placeholder="Deskripsi Website" class="w-full border rounded-lg px-3 py-2">{{ $setting->description ?? '' }}</textarea>

                        <input type="file" name="logo" class="w-full border rounded-lg px-3 py-2">

                        @if (!empty($setting->logo))
                            <img src="{{ asset('storage/' . $setting->logo) }}" class="w-32 mt-3">
                        @endif

                    </div>

                </div>

                <div class="bg-white p-6 rounded-xl shadow">

                    <h2 class="font-semibold mb-4">Kontak</h2>

                    <div class="space-y-4">

                        <input type="text" name="phone" value="{{ $setting->phone ?? '' }}" placeholder="No WhatsApp"
                            class="w-full border rounded-lg px-3 py-2">

                        <input type="email" name="email" value="{{ $setting->email ?? '' }}" placeholder="Email"
                            class="w-full border rounded-lg px-3 py-2">

                        <textarea name="address" placeholder="Alamat" class="w-full border rounded-lg px-3 py-2">{{ $setting->address ?? '' }}</textarea>

                    </div>

                </div>

            </div>


            <div class="bg-white p-6 rounded-xl shadow mt-6">

                <h2 class="font-semibold mb-4">Google Maps</h2>

                <textarea name="maps" placeholder="Embed Google Maps" class="w-full border rounded-lg px-3 py-2">{{ $setting->maps ?? '' }}</textarea>

            </div>


            {{-- <div class="bg-white p-6 rounded-xl shadow mt-6">

                <h2 class="font-semibold mb-4">Social Media</h2>

                <div class="grid md:grid-cols-3 gap-4">

                    <input type="text" name="facebook" value="{{ $setting->facebook ?? '' }}" placeholder="Facebook"
                        class="border rounded-lg px-3 py-2">

                    <input type="text" name="instagram" value="{{ $setting->instagram ?? '' }}" placeholder="Instagram"
                        class="border rounded-lg px-3 py-2">

                    <input type="text" name="youtube" value="{{ $setting->youtube ?? '' }}" placeholder="Youtube"
                        class="border rounded-lg px-3 py-2">

                </div>

            </div> --}}


            <div class="mt-6">

                <button class="bg-blue-600 text-white px-6 py-2 rounded-lg">
                    Simpan Setting
                </button>

            </div>

        </form>

    </div>
@endsection
