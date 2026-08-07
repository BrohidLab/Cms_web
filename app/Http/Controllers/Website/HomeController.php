<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\BannerSlidePage;
use App\Models\Consultation;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $bannerSlide = BannerSlidePage::where('pages_name', 'home_page')->get();
        $products = Product::with([
            'mainImage:id,product_id,image,is_main',
            'mainPrice'
        ])
        	->where('status', 'publish')
            ->latest()
            ->get();

        $article = Article::latest()->limit(3)->get();
        $testimonials = Testimonial::with('product')->latest()->get();

        return view('pages.website.home', compact('bannerSlide', 'products', 'article', 'testimonials'));
    }

    public function konsultasi(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:100',
                'no_wa' => 'required|string|max:20',
                'product_id' => 'required|exists:products,id',
                'lokasi' => 'nullable|string|max:100',
                'pesan' => 'required|string',
            ]);

            Consultation::create($data);

            return back()->with('success', 'Konsultasi berhasil dikirim');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
