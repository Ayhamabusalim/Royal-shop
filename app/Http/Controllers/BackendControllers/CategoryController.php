<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('backend.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.category.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:jpg,png,jped,svg|max:5048',
        ]);

        $slug = str::slug($request->slug, '-');
        $Newimage_name = uniqid() . $slug . '.' . $request->image->extension();
        $request->image->move(public_path('images/categories'), $Newimage_name);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'meta_title' =>  $request->meta_title,
            'meta_description' => $request->meta_description,
            'slug' => $slug,
            'image' => $Newimage_name,
        ]);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = category::findOrFail($id);
        return view('backend.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'slug' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg|max:5048',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'slug' => $request->slug,
        ];

        if ($request->hasFile('image')) {
            if ($category->image) {
                $oldImagePath = public_path('images/categories/' . $category->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $slug = Str::slug($request->slug, '-');
            $newImageName = uniqid() . '-' . $slug . '.' . $request->image->extension();
            $request->image->move(public_path('images/categories'), $newImageName);

            $data['image'] = $newImageName;
        }

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image) {
            $imagePath = public_path('images/categories/' . $category->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
