@extends('components.website.layouts.app')

@section('content')
    <x-website.banner title="{{ $banner->title ?? 'Tentang Kami' }}" description="{{ $banner->sub_title }}"
        image="{{ asset('storage/' . $banner->images) }}" :breadcrumbs="[['label' => 'Home', 'url' => '/'], ['label' => 'Product']]" />

    <section>
        <div class="relative">
            <img src="{{ asset('storage/' . $product->mainImage->images) }}" class="w-full h-[400px] object-center" />
        </div>
    </section>
@endsection
