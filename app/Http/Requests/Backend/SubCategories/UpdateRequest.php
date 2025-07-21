<?php

namespace App\Http\Requests\Backend\SubCategories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'slug' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg|max:5048',

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
            'image.mimes' => 'Image must be a file of type: jpg, png, jpeg, svg.',
            'image.max' => 'Image should not be larger than 5MB.'
        ];
    }
}
