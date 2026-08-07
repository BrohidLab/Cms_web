<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductImage;
use App\Models\ProductImageBrosur;
use App\Models\ProductPriceType;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with([
            'mainImage:id,product_id,image,is_main',
            'mainPrice'
        ])
            ->latest()
            ->paginate(9);

        return view('pages.admin.pages.product.index', compact('products'));
    }

    public function create($idProduct = null)
    {
        $product = $idProduct ? Product::findOrFail($idProduct) : null;

        return view('pages.admin.pages.product.create', compact('product'));
    }

    public function storeProduct(Request $request)
    {
        try {
        $request->validate([
            'name' => 'required|string|max:255',
            'seater' => 'required|numeric',
            'slug' => 'required|string',
            'link_brosur' => 'nullable|string',
            'banner_page' => 'required|image|mimes:jpg,jpeg,png,webp',
            'cc' => 'required',
            'description' => 'nullable',
        ]);

        $path = $request->file('banner_page')->store('product_banner', 'public');

        $product = Product::create([
            'id' => generateUuid(),
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'seater' => $request->seater,
            'cc' => $request->cc,
            'banner_page' => $path,
            'link_brosur' => $request->link_brosur,
            'description' => $request->description,
            'status' => 'draf',
        ]);

        return redirect()
            ->route('product.create_product_type', $product->id);
        } catch (\Exception $e) {
        return back()->with('error', 'terjadi kesalahan');
        }
    }

    public function updateCreateProduct($idProduct, Request $request)
    {
        try {
        $request->validate([
            'name' => 'required|string|max:255',
            'seater' => 'required|numeric',
            'slug' => 'required|string',
            'link_brosur' => 'nullable|string',
            'cc' => 'required',
            'description' => 'nullable',
        ]);
     
        $path = '';
        $product = Product::where('id', $idProduct)->first();

        if ($request->hasFile('banner_page')) {
            $path = $request->file('banner_page')->store('product_banner', 'public');
        } else {
            $path = $product->banner_page;
        }

        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'seater' => $request->seater,
            'cc' => $request->cc,
            'link_brosur' => $request->link_brosur,
            'banner_page' => $path,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('product.create_product_type', $idProduct);
        } catch(\Exception $e) {
        return back()->with('error', 'Gagal' . $e->getMessage());
        }
    }

    public function createProductType($idProduct)
    {
        $product = Product::where('id', $idProduct)->first();
        $typeProduct = ProductType::where('product_id', $product->id)->orderBy('created_at', 'ASC')->get();

        return view('pages.admin.pages.product.create-product-type', compact('product', 'typeProduct'));
    }

    public function storeProductType(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'product_id' => 'required',
        ]);

        ProductType::create([
            'name' => $request->name,
            'price' => '0',
            'transmition' => 'x',
            'product_id' => $request->product_id,
        ]);

        return redirect()
            ->route('product.create_product_type', $request->product_id);
    }

    public function deleteTypeProduct($typeId)
    {
        try {
            $productType = ProductType::findOrFail($typeId);
            ProductColor::where('type_id', $productType->id)->delete();
            ProductImage::where('type_id', $productType->id)->delete();
            ProductPriceType::where('type_id', $productType->id)->delete();
            $productType->delete();

            return response()->json([
                'success' => true,
                'message' => 'Product berhasil dihapus',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }

    }

    public function productColor($idProduct)
    {
        $product = Product::where('id', $idProduct)->first();
        $type = ProductType::where('product_id', $idProduct)->orderBy('created_at', 'ASC')->get();
        $typeColor = ProductColor::with('type')
    ->whereHas('type', function ($query) use ($idProduct) {
        $query->where('product_id', $idProduct);
    })
    ->get()
    ->groupBy('type_id');

        return view('pages.admin.pages.product.create-product-color', compact('type', 'product', 'typeColor'));
    }

    public function storeProductColor(Request $request)
    {
        $request->validate([
            'type_id' => 'required|exists:product_types,id',
            'name' => 'required|string|max:255',
            'jenis_color' => 'required|in:single,two_tone',
            'code_color' => 'required|string',
            'code_color2' => 'nullable|required_if:jenis_color,two_tone|string',
        ]);

        // 🔥 VALIDASI DUPLIKAT BERDASARKAN JENIS
        if ($request->jenis_color === 'single') {

            $exists = ProductColor::where('type_id', $request->type_id)
                ->where('code_color', $request->code_color)
                ->exists();

        } else {

            // supaya merah-putih = putih-merah dianggap sama
            $color1 = $request->code_color;
            $color2 = $request->code_color2;

            $exists = ProductColor::where('type_id', $request->type_id)
                ->where(function ($query) use ($color1, $color2) {
                    $query->where(function ($q) use ($color1, $color2) {
                        $q->where('code_color', $color1)
                            ->where('code_color2', $color2);
                    })
                        ->orWhere(function ($q) use ($color1, $color2) {
                            $q->where('code_color', $color2)
                                ->where('code_color2', $color1);
                        });
                })
                ->exists();
        }

        if ($exists) {
            return back()->withErrors([
                'code_color' => 'Kombinasi warna sudah ada pada type ini.',
            ])->withInput();
        }

        // ✅ SIMPAN
        ProductColor::create([
            'type_id' => $request->type_id,
            'name' => $request->name,
            'jenis_color' => $request->jenis_color,
            'code_color' => $request->code_color,
            'code_color2' => $request->jenis_color === 'two_tone'
                ? $request->code_color2
                : null,
        ]);

        return back()->with('success', 'Color berhasil ditambahkan');
    }

    public function deleteProductColor($id)
    {
        $color = ProductColor::findOrFail($id);
        ProductImage::where('color_id', $color->id)->delete();
        $color->delete();

        return response()->json([
            'success' => true,
        ]);
    }

    public function createProductImage($productId)
{
    $product = Product::findOrFail($productId);

    $types = ProductType::where('product_id', $productId)->orderBy('created_at','ASC')->get();

    $images = ProductImage::with(['type', 'color'])
        ->where('product_id', $productId)

        // type harus milik product ini
        ->whereHas('type', function ($q) use ($productId) {
            $q->where('product_id', $productId);
        })

        // color harus sesuai dengan type (INI KUNCI UTAMA)
        ->whereHas('color', function ($q) {
            $q->whereColumn('product_colors.type_id', 'product_images.type_id');
        })

        ->get()
        ->groupBy('type_id');

    return view('pages.admin.pages.product.create-product-color-img', compact('product', 'types', 'images'));
}

    public function getColorByTypeId($typeId)
    {
        $colors = ProductColor::where('type_id', $typeId)
            ->select('id', 'name', 'jenis_color', 'code_color', 'code_color2')
            ->get();

        return response()->json($colors);
    }

    public function storeProductImage(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'type_id' => 'required|exists:product_types,id',
            'color_id' => 'required|exists:product_colors,id',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        $path = $request->file('image')->store('product_images', 'public');

        ProductImage::create([
            'product_id' => $request->product_id,
            'type_id' => $request->type_id,
            'color_id' => $request->color_id,
            'image' => $path,
            'is_main' => $request->is_main ?? false,
        ]);

        return back()->with('success', 'Image berhasil ditambahkan');
    }

    public function deleteProductImage($id)
    {
        $image = ProductImage::findOrFail($id);

        if (file_exists(storage_path('public/'.$image->image))) {
            unlink(storage_path('public/'.$image->image));
        }

        $image->delete();

        return response()->json(['success' => true]);
    }

    public function createGallery($productId)
    {
        $product = Product::findOrFail($productId);

        $galleries = ProductGallery::where('product_id', $productId)
            ->orderBy('created_at', 'ASC')
            ->get()
            ->groupBy('category');

        return view('pages.admin.pages.product.create-product-gallery',
            compact('product', 'galleries'));
    }

    public function storeGallery(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'category' => 'required|in:interior,exterior',
                'images' => 'required',
                'images.*' => 'image|mimes:jpg,jpeg,png,webp',
            ]);

            foreach ($request->file('images') as $image) {

                $path = $image->store('product/gallery', 'public');

                ProductGallery::create([
                    'product_id' => $request->product_id,
                    'category' => $request->category,
                    'image' => $path,
                ]);
            }

            return back()->with('success', 'Gallery berhasil disimpan');
        } catch (\Exception $e) {

            return back()->with('error', $e->getMessage());
        }
    }

    public function deleteGallery($id)
    {
        $gallery = ProductGallery::findOrFail($id);

        Storage::disk('public')->delete($gallery->image);

        $gallery->delete();

        return response()->json(['success' => true]);
    }

    public function publishProduct($idProd)
    {
        try {
            Product::where('id', $idProd)->update([
                'status' => 'publish',
            ]);

            return redirect()->route('product.index')->with('success', 'Mempublish produk baru');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function imageBrosur($idProd){
        $product = Product::where('id', $idProd)->first();
        $brosurs = ProductImageBrosur::where('product_id', $idProd)->get();

        return view('pages.admin.pages.product.create-product-image-brosur', compact('brosurs', 'product'));
    }

    public function storeImageBrosur(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'images' => 'required',
                'images.*' => 'image|mimes:jpg,jpeg,png,webp',
            ]);

            foreach ($request->file('images') as $image) {

                $path = $image->store('product/gallery', 'public');

                ProductImageBrosur::create([
                    'product_id' => $request->product_id,
                    'images' => $path,
                ]);
            }

            return back()->with('success', 'Image berhasil disimpan');
        } catch (\Exception $e) {

            return back()->with('error', $e->getMessage());
        }
    }

    public function deleteImageBrosur($id)
    {
        $gallery = ProductImageBrosur::findOrFail($id);

        Storage::disk('public')->delete($gallery->images);

        $gallery->delete();

        return response()->json(['success' => true]);
    }

    public function productPrice($idProduct) {
    	$product = Product::where('id', $idProduct)->first();
		$types = ProductType::where('product_id', $product->id)->orderBy('created_at', 'ASC')->get();
    	$prices = ProductPriceType::with('type')
        ->where('id_product', $product->id)

        // WAJIB: type harus milik product ini
        ->whereHas('type', function ($q) use ($product) {
            $q->where('product_id', $product->id);
        })
        ->orderBy('created_at', 'ASC')
        ->get();

    	return view('pages.admin.pages.product.create-product-price', compact('product', 'prices', 'types'));
    }

    public function storePriceType(Request $request)
    {
    	try{
    		$request->validate([
    			'id_type' => 'required|string',
    			'price' => 'required',
    			'transmition' => 'required'	
    		]);

    		ProductPriceType::create([
    			'type_id' => $request->id_type,
    			'id_product' => $request->product_id,
    			'price' => $request->price,
    			'transmition' => $request->transmition
    		]);

    		return back()->with('success', 'Berhasil tambah price list');
    	}catch(\Exeption $e){
    		return back()->with('error', 'Terjadi kesalahan' . $e->getMessage());
    	}
    }

    public function deletePrice($id) {
		try {
			
    	$price = ProductPriceType::findOrFail($id);
    	$price->delete();

    	return response()->json([
    	                 'success' => true,
    	                 'message' => 'Product berhasil dihapus',
    	             ]);
    	         } catch (\Exception $e) {
    	             return response()->json([
    	                 'success' => false,
    	                 'message' => $e->getMessage(),
    	             ], 500);
    	         }
    }
}
