@extends('pages.admin.components.layouts.app')

@section('content')
    <div class="p-6">

        <!-- Header -->
        <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <!-- Title -->
            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    Banner Homepage
                </h1>
                <p class="text-sm text-gray-500">
                    Daftar banner slide (Image / Video)
                </p>
            </div>

            <!-- Button -->
            <a href="{{ route('front_page.homes.upload') }}"
                class="inline-flex gap-2 items-center justify-center px-5 py-2.5
              bg-blue-600 text-white text-sm font-medium
              rounded-xl shadow-sm
              hover:bg-blue-700
              transition duration-200">
                <span class="material-symbols-outlined text-sm">
                    upload
                </span>
                Upload Banner
            </a>

        </div>
        <!-- Table -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-4">Preview</th>
                        <th class="px-6 py-4">Type</th>
                        <th class="px-6 py-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y">

                    @forelse($bannerHome as $banner)
                        <tr class="hover:bg-gray-50">

                            <!-- Preview -->
                            <td class="px-6 py-4">
                                @if ($banner->type == 'image')
                                    <img src="{{ asset('storage/' . $banner->files) }}"
                                        class="w-32 h-20 object-cover rounded-md border">
                                @elseif($banner->type == 'video')
                                    <video class="w-32 h-20 object-cover rounded-md border" controls>
                                        <source src="{{ asset('storage/' . $banner->files) }}">
                                    </video>
                                @endif
                            </td>

                            <!-- Type -->
                            <td class="px-6 py-4">
                                @if ($banner->type == 'image')
                                    <span class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-600">
                                        Image
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs rounded-full bg-purple-100 text-purple-600">
                                        Video
                                    </span>
                                @endif
                            </td>

                            <!-- Action -->
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('front_page.homes.store', $banner->id) }}"
                                        class="px-3 py-1 text-xs bg-yellow-400 text-white rounded-md hover:bg-yellow-500">
                                        Edit
                                    </a>

                                    <form action="{{ route('front_page.homes.destroy', $banner->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin hapus banner ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-xs bg-red-500 text-white rounded-md hover:bg-red-600">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-6 text-center text-gray-400">
                                Belum ada banner ditambahkan
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
@endsection
