<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Products = Product::with('SubCategory')->get();

        return view('backend.pages.products.index', compact('Products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('backend.pages.products.create', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:sub_categories,id',
            'slug' => 'required|string|max:255|unique:products,slug',
            'meta_title' => 'string|max:255|nullable',
            'meta_description' => 'string|max:500|nullable',
            'short_description' => 'string|max:500|nullable',
            'description' => 'string|nullable',
            'image' => 'required|mimes:jpg,png,jpeg,svg,webp|max:5048',
            'gallery.*' => 'mimes:jpg,png,jpeg,svg,webp|max:5048',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'sale_price' =>  'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'cost_price' =>  'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'sku' => 'required|unique:products,sku',
            'stock_quantity' => 'required|numeric',
            'min_quantity' => 'required|numeric',
            'is_active' => 'required|boolean',
            'stock_status' => 'required|in:in_stock,out_of_stock,on_backorder',
            'is_featured' => 'required|boolean',
        ]);

        // رفع الصورة الرئيسية
        $slug = Str::slug($request->slug, '-');
        $newImageName = uniqid() . '-' . $slug . '.' . $request->image->extension();
        $request->image->move(public_path('images/products'), $newImageName);

        // رفع صور الجاليري
        $galleryImages = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/products'), $filename);
                $galleryImages[] = $filename;
            }
        }

        // حفظ المنتج مع الصور
        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'slug' => $request->slug,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image' => $newImageName,
            'gallery' => json_encode($galleryImages),
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'cost_price' =>  $request->cost_price,
            'sku' =>  $request->sku,
            'stock_quantity' =>  $request->stock_quantity,
            'min_quantity' =>  $request->min_quantity,
            'is_active' =>  $request->is_active,
            'stock_status' =>  $request->stock_status,
            'is_featured' =>  $request->is_featured,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $product = Product::with(['category', 'subcategory'])->findOrFail($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('backend.pages.products.product_details', compact('product', 'categories', 'subcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::with(['category', 'subcategory'])->findOrFail($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('backend.pages.products.edit', compact('product', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:sub_categories,id',
            'slug' => 'required|string|max:255|unique:products,slug,' . $id,
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,svg,webp|max:5048',
            'gallery.*' => 'nullable|image|mimes:jpg,png,jpeg,svg,webp|max:5048',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'sale_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'cost_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'sku' => 'required|string|unique:products,sku,' . $id,
            'stock_quantity' => 'required|numeric',
            'min_quantity' => 'required|numeric',
            'is_active' => 'required|boolean',
            'stock_status' => 'required|in:in_stock,out_of_stock,on_backorder',
            'is_featured' => 'required|boolean',
        ]);

        $data = $request->only([
            'name',
            'category_id',
            'subcategory_id',
            'slug',
            'meta_title',
            'meta_description',
            'short_description',
            'description',
            'price',
            'sale_price',
            'cost_price',
            'sku',
            'stock_quantity',
            'min_quantity',
            'is_active',
            'stock_status',
            'is_featured',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                $oldImagePath = public_path('images/products/' . $product->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $imageName = uniqid() . '_' . Str::slug($request->slug) . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('images/products'), $imageName);
            $data['image'] = $imageName;
        }

        $product->update($data);

        if ($request->hasFile('gallery')) {
            if ($product->gallery) {
                $oldGallery = json_decode($product->gallery, true);
                foreach ($oldGallery as $oldImg) {
                    $oldPath = public_path('images/products/' . $oldImg);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
            }

            $galleryImages = [];

            foreach ($request->file('gallery') as $file) {
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/products'), $filename);
                $galleryImages[] = $filename;
            }

            $product->gallery = json_encode($galleryImages);
            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            $imagePath = public_path('images/products/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        if ($product->gallery) {
            $galleryImages = json_decode($product->gallery, true);
            foreach ($galleryImages as $image) {
                $imagePath = public_path('images/products/' . $image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    
}
