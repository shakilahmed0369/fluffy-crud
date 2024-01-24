<?php

namespace Modules\MenuBuilder\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MenuRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'link' => 'nullable|string|max:255',
            'order' => 'nullable',
            'status' => 'nullable',
            'parent_id' => 'nullable'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::guard('admin')->check() ? true : false;
    }

    public function messages(): array
    {
        return [
            'title.required' => trans('The title is required.'),
            'title.string' => trans('The title must be a string.'),
            'title.max' => trans('The title may not be greater than 255 characters.'),
            'link.string' => trans('The link must be a string.'),
            'link.max' => trans('The link may not be greater than 255 characters.'),
        ];
    }
}
