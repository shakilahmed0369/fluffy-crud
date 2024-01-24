<?php

namespace Modules\Testimonial\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TestimonialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return (Auth::guard('admin')->check() && checkAdminHasPermission('testimonial.store')) ? true : false;
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'comment' => 'required|string|max:5000',
        ];

        if ($this->isMethod('put')) {
            $rules['image'] = 'nullable|image|max:2048';
            $rules['rating'] = 'nullable';
        }

        if ($this->isMethod('post')) {
            $rules['image'] = 'nullable|image|max:2048';
            $rules['rating'] = 'nullable';
        }

        return $rules;
    }

    public function messages():array
    {
        return [
            'name.required' => trans('admin_validation.The name field is required.'),
            'name.string' => trans('admin_validation.The name must be a string.'),
            'name.max' => trans('admin_validation.The name may not be greater than 255 characters.'),
            'designation.required' => trans('admin_validation.The designation field is required.'),
            'designation.string' => trans('admin_validation.The designation must be a string.'),
            'designation.max' => trans('admin_validation.The designation may not be greater than 255 characters.'),
            'comment.required' => trans('admin_validation.The comment field is required.'),
            'comment.string' => trans('admin_validation.The comment must be a string.'),
            'comment.max' => trans('admin_validation.The comment may not be greater than 5000 characters.'),
            'image.image' => trans('admin_validation.The image must be an image.'),
            'image.max' => trans('admin_validation.The image may not be greater than 2048 kilobytes.'),
        ];
    }
}
