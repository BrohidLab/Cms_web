<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\BannerPage;
use App\Models\ProductPriceType;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function index(Request $request){
    	$products = Product::with(['mainImage:id,product_id,image,is_main', 'mainPrice'])
    						->where('status', 'publish')
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
			'brosurImage'
        ])
            ->withMin('types', 'price') // ambil harga paling rendah
            ->latest()
            ->get();
            
        
		$product = Product::with([
    'types' => function ($q) {
        $q->orderBy('created_at', 'ASC'); // order by created_at desc
    },
    'types.colors.image',
    'galleries' => function ($g) {
        $g->orderBy('created_at', 'ASC');
    }
])->where('slug', $slug)->firstOrFail();
	    
	    $listPrices = ProductPriceType::with('type')
        ->where('id_product', $product->id)

        // WAJIB: type harus milik product ini
        ->whereHas('type', function ($q) use ($product) {
            $q->where('product_id', $product->id);
        })
        ->orderBy('created_at', 'ASC')
        ->get();
		return view('pages.website.product.show', compact('banner', 'product', 'products', 'listPrices'));
	}
}
