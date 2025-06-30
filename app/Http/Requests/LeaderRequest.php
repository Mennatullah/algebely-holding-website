<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeaderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active'=>'nullable|boolean',
            'sort'=>'required|integer|min:0',
            'name_en'=>'required|string|max:191',
            'name_ar'=>'required|string|max:191',
            'position_en'=>'required|string|max:191',
            'position_ar'=>'required|string|max:191',
        ];
    }
}
