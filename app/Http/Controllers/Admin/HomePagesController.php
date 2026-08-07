<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerSlidePage;
use Illuminate\Http\Request;

class HomePagesController extends Controller
{
    public function index(){
        $bannerHome = BannerSlidePage::where('pages_name', 'home_page')->get();
        return view('pages.admin.pages.front-pages.home.index', compact('bannerHome'));
    }

    public function upload(){
        return view('pages.admin.pages.front-pages.home.upload-files');
    }

    public function simpan(Request $request){
        $request->validate([
            'files.*' => 'required|file|mimes:jpg,jpeg,png,mp4,mov',
        ]);

        foreach ($request->file('files') as $file) {

            $path = $file->store('banner', 'public');

            $type = str_starts_with($file->getMimeType(), 'image')
                ? 'image'
                : 'video';

            BannerSlidePage::create([
                'files' => $path,
                'type'  => $type,
                'pages_name' => 'home_page',
            ]);
        }

        return redirect()->route('front_page.homes.index')
            ->with('success', 'Banner berhasil diupload');
    }
    
   public function destroy($id) {
    BannerSlidePage::findOrFail($id)->delete();
    return back()->with('success', 'Berhasil hapus banner slides');
   }
    
}
