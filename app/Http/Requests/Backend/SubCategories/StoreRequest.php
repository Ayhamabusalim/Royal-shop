<?php

namespace App\Http\Requests\Backend\SubCategories;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'meta_title' => 'string|max:255',
            'meta_description' => 'string|max:255',
            'slug' => 'required|string|max:255|unique:sub_categories,slug',
            'image' => 'required|mimes:jpg,png,jped,svg|max:5048',
        ];
    }
    public function messages(): array
    {
        return [
            'category_id.required' => 'Category is required.',
            'category_id.exists' => 'Category should be Exists.',
            'name.required' => 'Sub Category name required.',
            'name.string' => 'Name should be valid string.',
            'name.max' => 'Name length show be maximum 255.',
            'description.required' => 'Description is Required.',
            'description.string' => 'Description should be valid String.',
            'description.max' => 'Description length should be maximum 1000.',
            'meta_title.string' => 'meta title should be valid string.',
            'meta_title.max' => 'meta title length should be maximim 255.',
            'slug.required' => 'Slug is required ',
            'slug.string' => 'Slug should be valid string.',
            'slug.max' => 'Slug length should be maximum 255.',
            'slug.unique' => 'Slug  should be unique.',
            'image.required' => 'Image required',
            'image.mimes' => 'Image must be a file of type: jpg, png, jpeg, svg.',
            'image.max' => 'Image should not be larger than 5MB.'
        ];
    }
}
