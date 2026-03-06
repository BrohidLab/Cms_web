<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        $query = Testimonial::with('product');

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('nama_pelanggan', 'like', "%$search%")
                ->orWhere('ulasan', 'like', "%$search%")
                ->orWhereHas('product', function ($p) use ($search) {
                    $p->where('name', 'like', "%$search%");
                });

            });
        }

		$testimoni = $query
            ->with('product')
			->latest()
			->paginate(10)
			->withQueryString();

        return view('pages.admin.pages.testimoni.index', compact('testimoni'));
    }

    public function create()
    {
        $products = Product::pluck('name','id');
        return view('pages.admin.pages.testimoni.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'nullable|image',
            'nama_pelanggan' => 'required',
            'product_id' => 'required',
            'ulasan' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('testimonials','public');
        }

        Testimonial::create($data);

        return redirect()->route('testimoni.index');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $products = Product::pluck('name','id');

        return view('pages.admin.pages.testimoni.edit', compact('testimonial','products'));
    }


    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $data = $request->validate([
            'image' => 'nullable|image',
            'nama_pelanggan' => 'required',
            'product_id' => 'required',
            'ulasan' => 'required'
        ]);

        if ($request->hasFile('image')) {

            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }

            $data['image'] = $request->file('image')->store('testimonials','public');
        }

        $testimonial->update($data);

        return redirect()->route('testimoni.index')
            ->with('success','Testimoni berhasil diperbarui');
    }


    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }

        $testimonial->delete();

        return back()->with('success','Testimoni berhasil dihapus');
    }
}
