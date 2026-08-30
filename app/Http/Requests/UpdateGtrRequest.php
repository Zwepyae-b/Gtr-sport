<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGtrRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->is_admin;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'generation' => 'required|string|max:50',
            'year_start' => 'required|integer|min:1960|max:2030',
            'year_end' => 'nullable|integer|min:1960|max:2030',
            'engine' => 'required|string|max:255',
            'displacement' => 'required|string|max:255',
            'horsepower' => 'required|integer|min:50|max:2000',
            'torque' => 'required|string|max:255',
            'transmission' => 'required|string|max:255',
            'drivetrain' => 'required|string|max:255',
            'acceleration' => 'nullable|string|max:255',
            'top_speed' => 'nullable|string|max:255',
            'fuel_type' => 'nullable|string|max:50',
            'weight' => 'nullable|string|max:255',
            'price' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'main_image' => 'nullable|image|max:5120',
            'is_nismo' => 'boolean',
            'is_featured' => 'boolean',
            'status' => 'required|in:active,inactive',
        ];
    }
}
