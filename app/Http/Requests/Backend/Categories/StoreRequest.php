<?php

namespace App\Http\Requests\Backend\Categories;

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
            'name' => 'required|string',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,svg|max:5048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Category name is required.',
            'name.string' => 'Name must be a valid string.',
            'description.required' => 'Description is required.',
            'meta_title.required' => 'Meta Title is required.',
            'meta_description.required' => 'Meta Description is required.',
            'slug.required' => 'Slug is required.',
            'image.required' => 'Image is required.',
            'image.mimes' => 'Image must be a file of type: jpg, png, jpeg, svg.',
            'image.max' => 'Image should not be larger than 5MB.',
        ];
    }
}
