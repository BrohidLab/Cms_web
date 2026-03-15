<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\BannerPage;
use App\Models\ContentLabel;
use Illuminate\Http\Request;

class ArticlePageController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with('labels')->latest();
    
        if ($request->search) {
            $query->where('title','like','%'.$request->search.'%');
        }
    
        $articles = $query->paginate(9);
    
        $featured = Article::latest()->first();
    
        $labels = ContentLabel::all();
    
        $trending = Article::latest()->take(5)->get();
        $banner = BannerPage::where('pages_name', 'berita')
					->orderBy('id', 'desc')
					->first();    
        return view('pages.website.article.index', compact(
            'articles',
            'featured',
            'labels',
            'trending',
            'banner'
        ));
    }

    public function show($slug)
    {
        $article = Article::with('labels')
                    ->where('slug',$slug)
                    ->firstOrFail();
    
        // Related article
        $related = Article::where('id','!=',$article->id)
                    ->latest()
                    ->take(3)
                    ->get();

        $banner = BannerPage::where('pages_name', 'berita')
					->orderBy('id', 'desc')
					->first();          
        return view('pages.website.article.show', compact(
            'article',
            'related',
            'banner'
        ));
    }
}
