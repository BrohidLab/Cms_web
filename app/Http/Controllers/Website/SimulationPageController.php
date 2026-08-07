<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SimulationPageController extends Controller
{
    public function index(){
        $products = Product::with('types.prices')->get();
    	return view('pages.website.simulasi', compact('products'));
    }
}
