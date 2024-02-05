<?php

namespace Modules\Test\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
		'category' => ['required', 'max:255'],
		'slug' => ['required', 'max:255'],
		'status' => ['required', 'boolean'],
		'description' => ['required', 'max:500'],
		'icon_id' => ['required', 'max:255'],
		];
    }
}
