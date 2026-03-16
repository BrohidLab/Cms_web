<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Analytic;
use App\Models\Article;
use App\Models\Consultation;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalProduct = Product::count();

        $totalArticle = Article::count();

        $totalConsultation = Consultation::count();

        $totalVisitor = Analytic::count();

        $latestArticles = Article::latest()->limit(5)->get();

        $latestConsultations = Consultation::latest()->limit(5)->get();

        $latestProducts = Product::latest()->limit(5)->get();

        return view('pages.admin.pages.dashboard', compact(
            'totalProduct',
            'totalArticle',
            'totalConsultation',
            'totalVisitor',
            'latestArticles',
            'latestConsultations',
            'latestProducts'
        ));
    }
}
