<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\BannerPage;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    public function index(){
        $banner = BannerPage::where('pages_name', 'service')
					->orderBy('id', 'desc')
					->first();
		$products = Product::all();
    	return view('pages.website.service', compact('banner', 'products'));
    }
}
