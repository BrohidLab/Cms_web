<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\BannerPage;
use Illuminate\Http\Request;

class SukuCadangPageController extends Controller
{
    public function index(){
        $banner = BannerPage::where('pages_name', 'suku_cadang')
					->orderBy('id', 'desc')
					->first();
    	return view('pages.website.suku-cadang', compact('banner'));
    }

    public function konsultasi(Request $request) {
    	
    }
}
