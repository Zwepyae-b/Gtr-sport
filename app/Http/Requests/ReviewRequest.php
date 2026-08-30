<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'gtr_model_id' => 'required|exists:gtr_models,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'gtr_model_id.required' => 'Please select a GT-R model.',
            'rating.required' => 'Please provide a rating.',
            'rating.min' => 'Rating must be at least 1.',
            'rating.max' => 'Rating cannot exceed 5.',
            'comment.required' => 'Please write a review comment.',
            'comment.max' => 'Review cannot exceed 1000 characters.',
        ];
    }
}
