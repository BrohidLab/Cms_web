<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileWebController extends Controller
{
    public function index()
    {
        $setting = ProfileWeb::first();

        return view('pages.admin.pages.setting.index', compact('setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description_short' => 'nullable',
            'about' => 'nullable',
            'no_wa' => 'nullable',
            'email' => 'nullable|email',
            'google_maps' => 'nullable',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $setting = ProfileWeb::first();

        $data = [
            'name' => $request->name,
            'description_short' => $request->description_short,
            'about' => $request->about,
            'no_wa' => $request->no_wa,
            'email' => $request->email,
            'address' => $request->address,
            'location' => $request->location,
            'google_maps' => $request->google_maps,
        ];

        // upload logo
        if ($request->hasFile('logo')) {

            if ($setting && $setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }

            $data['logo'] = $request->file('logo')->store('setting', 'public');
        }

        if ($setting) {
            $setting->update($data);
        } else {
            ProfileWeb::create($data);
        }

        return back()->with('success','Setting berhasil disimpan');
    }
}
