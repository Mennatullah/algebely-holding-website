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
            'parent_id'=>'nullable|exists:menus,id',
            'is_active'=>'nullable|boolean',
            'sort'=>'required|integer|min:0',
            'title_en'=>'required|string|max:191',
            'title_ar'=>'required|string|max:191',
        ];
    }
}
