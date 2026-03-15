<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\BannerPage;

class AboutController extends Controller
{
    public function index(){
        $banner = BannerPage::where('pages_name', 'about')
            ->orderBy('id', 'desc')
            ->first();
    	return view('pages.website.about', compact('banner'));
    }
}
