<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $course = $this->route('course');

        return [
            'code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('courses', 'code')->ignore($course->id),
            ],

            'name' => 'required|string|min:3|max:120',
            'description' => 'nullable|string|max:2000',
            'fee' => 'required|integer|min:0',
            'quota' => 'required|integer|min:1|max:500',
            'start_date' => 'required|date',
            'status' => 'required|in:draft,open,closed',
        ];
    }
}
