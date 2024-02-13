<?php

namespace Modules\Testimonial\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
		'name' => ['required', 'max:255'],
		'title' => ['required', 'max:50'],
		'review' => ['required'],
		'status' => ['required'],
		];
    }
}
