<?php

namespace Modules\ProductCategory\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
		'category' => ['required', 'max:255'],
		'slug' => ['nullable', 'max:255'],
		];
    }
}
