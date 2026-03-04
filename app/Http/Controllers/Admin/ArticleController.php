<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentLabel;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;


class ArticleController extends Controller
{
   	public function index(Request $request)
   	    {
   	        $query = Article::query();
   	
   	        // Search by title
   	        if ($request->filled('search')) {
   	            $query->where('title', 'like', '%' . $request->search . '%');
   	        }
   	
   	        $articles = $query
   	            ->latest()
   	            ->paginate(10)
   	            ->withQueryString();
   	
   	        return view('pages.admin.pages.article.index', compact('articles'));
   	    }
   	
   	    /**
   	     * Show the form for creating a new resource.
   	     */
   	    public function create()
   	    {
   	        return view('pages.admin.pages.article.create');
   	    }
   	
   	    /**
   	     * Store a newly created resource in storage.
   	     */
   	    public function store(Request $request)
   	    {
   	        $request->validate([
   	            'title'         => 'required|string|max:255',
   	            'content'       => 'required',
   	            'content_label' => 'nullable|string',
   	            'thumbnail'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
   	            'status'        => 'required|in:publish,draft',
   	        ]);
   	
   	        $data = $request->all();
   	
   	        // Generate slug
   	        $data['slug'] = Str::slug($request->title);
   	
   	        // Upload thumbnail
   	        if ($request->hasFile('thumbnail')) {
   	            $data['thumbnail'] = $request->file('thumbnail')
   	                ->store('articles', 'public');
   	        }
   	
   	        $article = Article::create($data);

   	        if ($request->filled('content_label')) {
   	        
   	                $labelNames = collect(explode(',', $request->content_label))
   	                        ->map(fn($item) => trim($item))   // hapus spasi depan belakang
   	                        ->filter()                        // buang yang kosong
   	                        ->unique()                        // hilangkan duplikat
   	                        ->values();
   	                $labelIds = [];
   	        
   	                foreach ($labelNames as $name) {
   	        
   	                    $label = ContentLabel::firstOrCreate(
   	                        ['slug' => Str::slug($name)],
   	                        ['name' => $name]
   	                    );
   	        
   	                    $labelIds[] = $label->id;
   	                }
   	        
   	                $article->labels()->sync($labelIds);
   	            }
   	
   	        return redirect()
   	            ->route('article.index')
   	            ->with('success', 'Artikel berhasil ditambahkan.');
   	    }
   	
   	    /**
   	     * Show the form for editing the specified resource.
   	     */
   	    public function edit($idArticle)
   	    {
   	    	$article = Article::where('id', $idArticle)->first();
   	        return view('pages.admin.pages.article.edit', compact('article'));
   	    }
   	
   	    /**
   	     * Update the specified resource in storage.
   	     */
   	    public function update(Request $request,$idArticle)
   	    {
   	        $request->validate([
   	            'title'         => 'required|string|max:255',
   	            'content'       => 'required',
   	            'content_label' => 'nullable|string',
   	            'thumbnail'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
   	            'status'        => 'required|in:publish,draft',
   	        ]);
   	
   	        $data = $request->only(['title','content','status']);;
   	
   	        // Update slug
   	        $data['slug'] = Str::slug($request->title);
   	
   	        // Update thumbnail
   	        if ($request->hasFile('thumbnail')) {
   	        	if ($article->thumbnail && Storage::exists($article->thumbnail)) {
   	        	            Storage::delete($article->thumbnail);
   	        	        }
   	            $data['thumbnail'] = $request->file('thumbnail')
   	                ->store('articles', 'public');
   	        }
   	
   	       $article =  Article::findOrFail($idArticle);
   	       $article->update($data);

   	        if ($request->filled('content_label')) {
   	        
   	            $labelNames = collect(explode(',', $request->content_label))
   	                ->map(fn($item) => trim($item))   // hapus spasi depan belakang
   	                ->filter()                        // buang yang kosong
   	                ->unique()                        // hilangkan duplikat
   	                ->values();
   	        
   	            $labelIds = [];
   	        
   	            foreach ($labelNames as $name) {
   	        
   	                $label = ContentLabel::firstOrCreate(
   	                    ['slug' => Str::slug($name)],
   	                    ['name' => $name]
   	                );
   	        
   	                $labelIds[] = $label->id;
   	            }
   	        
   	            $article->labels()->sync($labelIds);
   	        } else {
   	                $article->labels()->sync([]);
   	            }
   	
   	        return redirect()
   	            ->route('article.index')
   	            ->with('success', 'Artikel berhasil diperbarui.');
   	    }
   	
   	    /**
   	     * Remove the specified resource from storage.
   	     */
   	    public function destroy($idArticle)
   	    {
   	        Article::where('id', $idArticle)->delete();
   	
   	        return redirect()
   	            ->route('article.index')
   	            ->with('success', 'Artikel berhasil dihapus.');
   	    }
}
