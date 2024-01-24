<?php

namespace Modules\Faq\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FaqRequest extends FormRequest
{
    public function authorize(): bool
    {
        return (Auth::guard('admin')->check() && checkAdminHasPermission('faq.update')) ? true : false;
    }

    public function rules(): array
    {
        $rules = [
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:10000',
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'question.required' => trans('admin_validation.The question field is required.'),
            'question.string' => trans('admin_validation.The question must be a string.'),
            'question.max' => trans('admin_validation.The question may not be greater than 255 characters.'),
            'answer.required' => trans('admin_validation.The answer field is required.'),
            'answer.string' => trans('admin_validation.The answer must be a string.'),
            'answer.max' => trans('admin_validation.The answer may not be greater than 10000 characters.'),
        ];
    }
}
