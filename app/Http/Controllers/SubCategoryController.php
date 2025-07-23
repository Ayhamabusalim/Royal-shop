<?php

namespace App\Http\Controllers;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SubCategories\StoreRequest;
use App\Http\Requests\Backend\SubCategories\UpdateRequest;
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
    public function index(SubCategoryDataTable $datatable)
    {
        return $datatable->render('backend.pages.subcategories.index');
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
    public function store(StoreRequest $request)
    {

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
        return response()->json([
            'message' => 'Sub Category created successfully.',
        ]);
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
    /* public function edit($id)
    {
        $categories = Category::all();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.pages.subcategories.edit_sub', compact('subcategory', 'categories'));
    } */
    public function edit(Subcategory $subcategory)
    {
        try {
            $categories = Category::latest()->get();

            return response()->json([
                'status' => true,
                'subcategory' => $subcategory,
                'categories' => $categories,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'title' => 'Fetch subcategory Failed!',
                'message' => 'An error occurred while fetching the subcategory data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        $subcategory = SubCategory::findOrFail($id);

        $data = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'slug' => $request->slug,
        ];


        if ($request->hasFile('image')) {
            if ($subcategory->image) {
                $oldImagePath = public_path('images/subcategories/' . $subcategory->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }


            $slug = Str::slug($request->slug, '-');
            $newImageName = uniqid() . '-' . $slug . '.' . $request->image->extension();
            $request->image->move(public_path('images/subcategories'), $newImageName);

            $data['image'] = $newImageName;
        }

        $subcategory->update($data);

        return redirect()->route('subcategories.index')->with('success', 'Sub Category updated successfully.');
    }










    /**
     * Remove the specified resource from storage.
     */


    public function destroy($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        if ($subcategory->image) {
            $imagePath = public_path('images/subcategories/' . $subcategory->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $subcategory->delete();

        return response()->json([
            'status' => true,
            'message' => 'sub Category deleted successfully.'
        ]);
    }

    public function getJson()
    {
        return Category::select('id', 'name')->get();
    }
}
