<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\BannerPage;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function index(Request $request){
    	$products = Product::with(['mainImage:id,product_id,image,is_main'])
    	                    ->withMin('types', 'price')
    	                    ->latest();
    	
		if($request->search){
			$products->where('name','like','%'.$request->search.'%');
		}
	
		$products = $products->paginate(12);

		$banner = BannerPage::where('pages_name', 'product')
					->orderBy('id', 'desc')
					->first();

    	return view('pages.website.product.index', compact('products', 'banner'));
    }

	public function show($slug) {
		$banner = BannerPage::where('pages_name', 'product')
					->orderBy('id', 'desc')
							->first();

		$products = Product::with([
            'mainImage:id,product_id,image,is_main',
        ])
            ->withMin('types', 'price') // ambil harga paling rendah
            ->latest()
            ->get();

		$product = Product::with([
									'types.colors.image',
									'galleries'
								])->where('slug',$slug)->firstOrFail();
		return view('pages.website.product.show', compact('banner', 'product', 'products'));
	}
}
