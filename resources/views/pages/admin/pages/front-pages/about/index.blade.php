@extends('pages.admin.components.layouts.app')

@section('content')
    <div class="p-6 max-w-3xl mx-auto">

        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">
                About Page
            </h1>
            <p class="text-sm text-gray-500">
                Update banner for about page
            </p>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm">

            <form action="{{ route('front_page.about.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="p-8 space-y-6">

                    <!-- Image Preview -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Banner Image
                        </label>

                        <div class="border border-dashed border-gray-300 rounded-xl p-4 text-center">

                            @if (isset($about->images))
                                <img src="{{ asset('storage/' . $about->images) }}"
                                    class="w-full h-52 object-cover rounded-lg mb-3">
                            @else
                                <div class="h-52 flex items-center justify-center text-gray-400 text-sm">
                                    No image uploaded
                                </div>
                            @endif

                            <input type="file" name="image" class="text-sm">

                            <p class="text-xs text-gray-400 mt-2">
                                Recommended size 1400 x 600 px
                            </p>

                        </div>
                    </div>

                    <!-- Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Title
                        </label>

                        <input type="text" name="title" value="{{ $about->title ?? '' }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <!-- Sub Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Sub Title
                        </label>

                        <textarea name="sub_title" rows="4"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-blue-500 outline-none">{{ $about->sub_title ?? '' }}</textarea>
                    </div>

                    <!-- Button -->
                    <div class="pt-2">
                        <button
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2.5 rounded-lg transition">
                            Save Changes
                        </button>
                    </div>

                </div>

            </form>

        </div>

    </div>
@endsection
