<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
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
    	return view('pages.website.product.index', compact('products'));
    }
}
