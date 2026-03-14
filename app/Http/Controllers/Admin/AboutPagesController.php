<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerPage;
use Illuminate\Http\Request;

class AboutPagesController extends Controller
{
    public function index()
    {
        $about = BannerPage::where('pages_name', 'about')->first();
        return view('pages.admin.pages.front-pages.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp'
        ]);

        $about = BannerPage::where('pages_name','about')->first();

        if(!$about){
            $about = new BannerPage();
        }

        if($request->hasFile('image')){
            $image = $request->file('image')->store('about','public');
            $about->images = $image;
        }

        $about->title = $request->title;
        $about->sub_title = $request->sub_title;
        $about->pages_name = 'about';

        $about->save();

        return back()->with('success','About berhasil diupdate');
    }

    public function prodindex()
    {
        $product = BannerPage::where('pages_name', 'product')->first();
        return view('pages.admin.pages.front-pages.product.index', compact('product'));
    }

    public function produpdate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp'
        ]);

        $about = BannerPage::where('pages_name','product')->first();

        if(!$about){
            $about = new BannerPage();
        }

        if($request->hasFile('image')){
            $image = $request->file('image')->store('product','public');
            $about->images = $image;
        }

        $about->title = $request->title;
        $about->sub_title = $request->sub_title;
        $about->pages_name = 'product';

        $about->save();

        return back()->with('success','Product berhasil diupdate');
    }

    public function serviceindex()
    {
        $service = BannerPage::where('pages_name', 'service')->first();
        return view('pages.admin.pages.front-pages.service.index', compact('service'));
    }

    public function serviceupdate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp'
        ]);

        $about = BannerPage::where('pages_name','service')->first();

        if(!$about){
            $about = new BannerPage();
        }

        if($request->hasFile('image')){
            $image = $request->file('image')->store('service','public');
            $about->images = $image;
        }

        $about->title = $request->title;
        $about->sub_title = $request->sub_title;
        $about->pages_name = 'service';

        $about->save();

        return back()->with('success','Service banner berhasil diupdate');
    }

    public function cadangindex()
    {
        $suku_cadang = BannerPage::where('pages_name', 'suku_cadang')->first();
        return view('pages.admin.pages.front-pages.suku-cadang.index', compact('suku_cadang'));
    }

    public function cadangupdate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp'
        ]);

        $about = BannerPage::where('pages_name','suku_cadang')->first();

        if(!$about){
            $about = new BannerPage();
        }

        if($request->hasFile('image')){
            $image = $request->file('image')->store('suku-cadang','public');
            $about->images = $image;
        }

        $about->title = $request->title;
        $about->sub_title = $request->sub_title;
        $about->pages_name = 'suku_cadang';

        $about->save();

        return back()->with('success','Suku Cadang banner berhasil diupdate');
    }

    public function beritaindex()
    {
        $berita = BannerPage::where('pages_name', 'berita')->first();
        return view('pages.admin.pages.front-pages.berita.index', compact('berita'));
    }

    public function beritaupdate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp'
        ]);

        $about = BannerPage::where('pages_name','berita')->first();

        if(!$about){
            $about = new BannerPage();
        }

        if($request->hasFile('image')){
            $image = $request->file('image')->store('berita','public');
            $about->images = $image;
        }

        $about->title = $request->title;
        $about->sub_title = $request->sub_title;
        $about->pages_name = 'berita';

        $about->save();

        return back()->with('success','Berita banner berhasil diupdate');
    }

    public function kontakindex()
    {
        $kontak = BannerPage::where('pages_name', 'kontak')->first();
        return view('pages.admin.pages.front-pages.kontak.index', compact('kontak'));
    }

    public function kontakupdate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp'
        ]);

        $about = BannerPage::where('pages_name','kontak')->first();

        if(!$about){
            $about = new BannerPage();
        }

        if($request->hasFile('image')){
            $image = $request->file('image')->store('kontak','public');
            $about->images = $image;
        }

        $about->title = $request->title;
        $about->sub_title = $request->sub_title;
        $about->pages_name = 'kontak';

        $about->save();

        return back()->with('success','Kontak banner berhasil diupdate');
    }
}
