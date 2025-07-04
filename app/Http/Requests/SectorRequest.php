<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectorRequest extends FormRequest
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
            'parent_id'=>'nullable|exists:sectors,id',
            'is_active'=>'nullable|boolean',
            'sort'=>'required|integer|min:0',
            'link'=>'nullable|string|max:191',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title_en'=>'required|string|max:191',
            'title_ar'=>'required|string|max:191',
            'description_en'=>'nullable|string',
            'description_ar'=>'nullable|string',
            'content_en'=>'nullable|string',
            'content_ar'=>'nullable|string',
        ];
    }
}
