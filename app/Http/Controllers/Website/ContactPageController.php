<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\BannerPage;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function index() {
    	$banner = BannerPage::where('pages_name', 'kontak')
            ->orderBy('id', 'desc')
            ->first();
        return view('pages.website.contact', compact('banner'));
    }
}
