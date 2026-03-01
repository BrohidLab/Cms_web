<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(9);

        return view('pages.admin.pages.product.index', compact('products'));
    }

    public function create($idProduct = null)
    {
        $product = $idProduct ? Product::findOrFail($idProduct) : null;

        return view('pages.admin.pages.product.create', compact('product'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'seater' => 'required|numeric',
            'slug' => 'required|string',
            'cc' => 'required|numeric',
            'description' => 'nullable',
        ]);

        $product = Product::create([
            'id' => generateUuid(),
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'seater' => $request->seater,
            'cc' => $request->cc,
            'description' => $request->description,
            'status' => 'draf',
        ]);

        return redirect()
            ->route('product.create_product_type', $product->id);
    }

    public function updateCreateProduct($idProduct, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'seater' => 'required|numeric',
            'slug' => 'required|string',
            'cc' => 'required|numeric',
            'description' => 'nullable',
        ]);

        Product::where('id', $idProduct)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'seater' => $request->seater,
            'cc' => $request->cc,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('product.create_product_type', $idProduct);
    }

    public function createProductType($idProduct)
    {
        $product = Product::where('id', $idProduct)->first();
        $typeProduct = ProductType::where('product_id', $product->id)->get();

        return view('pages.admin.pages.product.create-product-type', compact('product', 'typeProduct'));
    }

    public function storeProductType(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'transmition' => 'required|string',
            'product_id' => 'required',
        ]);

        ProductType::create([
            'name' => $request->name,
            'price' => $request->price,
            'transmition' => $request->transmition,
            'product_id' => $request->product_id,
        ]);

        return redirect()
            ->route('product.create_product_type', $request->product_id);
    }

    public function deleteTypeProduct($typeId)
    {
        try {
            $productType = ProductType::findOrFail($typeId);
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

    public function productColor($idProduct) {
        $product = Product::where('id', $idProduct)->first();
        $type = ProductType::where('product_id', $idProduct)->get();
        $typeColor = ProductColor::with('type')->get();
        
        return view('pages.admin.pages.product.create-product-color', compact('type', 'product', 'typeColor'));
    }
}
