<?php

namespace Modules\PageBuilder\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::guard('admin')->check() ? true : false;
    }

    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable',
        ];

        if ($this->isMethod('put')) {
            $rules['slug'] = 'sometimes|string|max:255|unique:customizeable_pages,slug,' . $this->page;
        }
        if ($this->isMethod('post')) {
            $rules['slug'] = 'required|string|max:255|unique:customizeable_pages,slug';
        }
        return $rules;
    }

    public function messages(): array
    {
        return [
            'title.required' => trans('The title field is required.'),
            'title.string' => trans('The title must be a string.'),
            'title.max' => trans('The title may not be greater than 255 characters.'),
            'description.string' => trans('The description must be a string.'),
            'slug.required' => trans('The slug field is required.'),
            'slug.string' => trans('The slug must be a string.'),
            'slug.max' => trans('The slug may not be greater than 255 characters.'),
            'slug.unique' => trans('The slug has already been taken.'),
        ];
    }
}
