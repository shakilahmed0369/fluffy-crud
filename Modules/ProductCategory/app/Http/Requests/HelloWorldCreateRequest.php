<?php

namespace Modules\ProductCategory\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelloWorldCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
		'category' => ['required', 'max:255'],
		];
    }
}
