<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = SubCategory::with('category')->get();
        return view('backend.pages.subcategories.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.pages.subcategories.create_sub', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'meta_title' => 'string|max:255',
            'meta_description' => 'string|max:255',
            'slug' => 'required|string|max:255|unique:sub_categories,slug',
            'image' => 'required|mimes:jpg,png,jped,svg|max:5048',
        ]);
        $slug = str::slug($request->slug, '-');
        $Newimage_name = uniqid() . $slug . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $Newimage_name);

        SubCategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'slug' => $request->slug,
            'image' => $Newimage_name,
        ]);
        return redirect()->route('subcategories.index')->with('success', 'Sub Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.pages.subcategories.edit_sub', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'meta_title' => 'string|max:255',
            'meta_description' => 'string|max:255',
            'slug' => 'required|string|max:255|unique:sub_categories,slug,' . $subCategory->id,
            'image' => 'required|mimes:jpg,png,jped,svg|max:5048',
        ]);
        $slug = str::slug($request->slug, '-');
        $Newimage_name = uniqid() . $slug . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $Newimage_name);

        $subCategory->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'slug' => $request->slug,
            'image' => $Newimage_name,
        ]);
        return redirect()->route('subcategories.index')->with('success', 'Sub Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
