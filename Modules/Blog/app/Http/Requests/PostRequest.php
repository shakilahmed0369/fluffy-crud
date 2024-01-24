<?php

namespace Modules\Blog\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::guard('admin')->check() ? true : false;
    }

    public function rules(): array
    {
        $rules = [
            'blog_category_id' => 'sometimes|exists:blog_categories,id',
            'seo_title' => 'nullable|string|max:1000',
            'seo_description' => 'nullable|string|max:2000',
            'tags' => 'nullable|string|max:2000',
            'show_homepage' => 'nullable',
            'is_popular' => 'nullable',
            'status' => 'nullable',
            'description' => 'required',
        ];

        if ($this->isMethod('put')) {
            $rules['code'] = 'required|exists:languages,code';
            $rules['title'] = 'required|string|max:255';
            $rules['slug'] = 'sometimes|string|max:255|unique:blogs,slug,' . $this->blog;
            $rules['image'] = 'nullable|image|max:2048';
        }
        if ($this->isMethod('post')) {
            $rules['image'] = 'required|image|max:2048';
            $rules['slug'] = 'required|string|max:255|unique:blogs,slug';
            $rules['title'] = 'required|string|max:255|unique:blog_translations,title';
        }
        return $rules;
    }

    public function messages(): array
    {
        return [
            'blog_category_id.required' => trans('The category is required.'),
            'blog_category_id.exists' => trans('The selected category is invalid.'),

            'code.required' => trans('Language is required and must be a string.'),
            'code.exists' => trans('The selected language is invalid.'),

            'seo_title.max' => trans('SEO title must be a string with a maximum length of 1000 characters.'),
            'seo_description.max' => trans('SEO description must be a string with a maximum length of 2000 characters.'),
            'tags.max' => trans('Tags must be a string with a maximum length of 255 characters.'),

            'seo_title.string' => trans('SEO title must be a string with a maximum length of 1000 characters.'),
            'seo_description.string' => trans('SEO description must be a string with a maximum length of 2000 characters.'),
            'tags.string' => trans('Tags must be a string with a maximum length of 255 characters.'),

            'image.required' => trans('The image is required and must be an image file with a maximum size of 2048 kilobytes (2 MB).'),
            'image.image' => trans('The image must be an image file with a maximum size of 2048 kilobytes (2 MB).'),
            'image.max' => trans('The image must be an image file with a maximum size of 2048 kilobytes (2 MB).'),

            'title.required' => trans('Title is required and must be a unique string with a maximum length of 255 characters.'),
            'slug.required' => trans('Slug is required and must be a unique string with a maximum length of 255 characters.'),

            'title.max' => trans('Title is required and must be a unique string with a maximum length of 255 characters.'),
            'slug.max' => trans('Slug is required and must be a unique string with a maximum length of 255 characters.'),

            'title.string' => trans('Title is required and must be a unique string with a maximum length of 255 characters.'),

            'slug.unique' => trans('Slug must be unique.'),
            'title.unique' => trans('Title must be unique.'),

            'description.required' => trans('Description is required.'),
        ];
    }
}
