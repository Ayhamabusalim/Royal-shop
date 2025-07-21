<?php

namespace App\Http\Controllers\BackendControllers;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Categories\StoreRequest;
use App\Http\Requests\Backend\Categories\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{


    public function index(CategoryDataTable $datatable)
    {
        return $datatable->render('backend.pages.category.index');
    }


    public function create()
    {
        //
    }


    public function store(StoreRequest $request)
    {


        $slug = Str::slug($request->slug, '-');
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
        return response()->json([
            'status' => true,
            'message' => 'Category created successfully.',
        ]);
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['status' => false, 'message' => 'Category not found']);
        }


        if ($category->image) {
            $category->image = asset('images/categories/' . $category->image);
        }

        return response()->json(['status' => true, 'data' => $category]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([]);


        $category->name = $request->name;
        $category->description = $request->description;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->slug = $request->slug;

        if ($request->hasFile('image')) {
            if ($category->image && file_exists(public_path('images/' . $category->image))) {
                unlink(public_path('images/' . $category->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $category->image = $imageName;
        }

        $category->save();

        return response()->json([
            'status' => true,
            'message' => 'Category updated successfully',
            'data' => $category
        ]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->image) {
            $imagePath = public_path('images/categories/' . $category->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $category->delete();

        return response()->json([
            'status' => true,
            'message' => 'Category deleted successfully.'
        ]);
    }
}
