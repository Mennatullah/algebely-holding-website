<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiContactRequest extends FormRequest
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
        $type = $this->input('type');

        $common = [
            'type' => ['required', 'in:grow_with_us,contact_us'],
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:20'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string', 'min:5'],
        ];

        // Additional rule if type is "grow_with_us"
        if ($type === 'grow_with_us') {
            return array_merge($common, [
                'cv' => ['required', 'file', 'mimes:pdf,doc,docx,jpg,jpeg,png', 'max:2048'],
            ]);
        }

        return array_merge($common, [
            'cv' => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,jpeg,png', 'max:2048'],
        ]);
    }

    public function messages(): array
    {
        return [
            'type.required' => 'Contact type is required.',
            'type.in' => 'Invalid contact type.',
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'message.required' => 'Message is required.',
            'cv.required' => 'CV is required for "Grow With Us".',
            'cv.mimes' => 'CV must be a file of type: pdf, doc, docx, jpg, jpeg, png.',
            'cv.max' => 'CV file may not be greater than 2MB.',
        ];
    }
}
