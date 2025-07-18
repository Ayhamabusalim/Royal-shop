<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        $request->image->move(public_path('images/subcategories'), $Newimage_name);

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
    public function update(Request $request, SubCategory $subcategory)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'meta_title' => 'string|max:255',
            'meta_description' => 'string|max:255',
            'slug' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg|max:5048',
        ]);

        // ✳️ اجمع البيانات في مصفوفة
        $data = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'slug' => $request->slug,
        ];

        // ✳️ إذا في صورة جديدة
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إن وُجدت
            if ($subcategory->image) {
                $oldImagePath = public_path('images/subcategories/' . $subcategory->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // رفع الصورة الجديدة
            $slug = Str::slug($request->slug, '-');
            $newImageName = uniqid() . '-' . $slug . '.' . $request->image->extension();
            $request->image->move(public_path('images/subcategories'), $newImageName);

            // أضف اسم الصورة للمصفوفة
            $data['image'] = $newImageName;
        }

        // ✅ نفذ التحديث مرة وحدة فقط
        $subcategory->update($data);

        return redirect()->route('subcategories.index')->with('success', 'Sub Category updated successfully.');
    }










    /**
     * Remove the specified resource from storage.
     */


    public function destroy(SubCategory $subcategory)
    {
        if ($subcategory->image) {
            $imagePath = public_path('images/subcategories/' . $subcategory->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $subcategory->delete();

        return redirect()->route('subcategories.index')->with('success', 'Sub Category deleted successfully.');
    }
}
