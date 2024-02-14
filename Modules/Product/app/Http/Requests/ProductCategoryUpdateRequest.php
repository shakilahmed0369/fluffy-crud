<?php

namespace Modules\Product\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
		'name' => ['required', 'max:255'],
		'slug' => ['required', 'max:255'],
		'status' => ['required', 'boolean'],
		];
    }
}
