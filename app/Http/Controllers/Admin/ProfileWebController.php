<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileWeb;
use Illuminate\Http\Request;

class ProfileWebController extends Controller
{
    public function index()
    {
        $setting = ProfileWeb::first();

        return view('pages.admin.pages.setting.index', compact('setting'));
    }

    public function store()
    {
        return view('pages.admin.pages.setting.index');
    }
}
