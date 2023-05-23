<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required', 
                'string', 
                'max: 255', 
                Rule::unique('tbl_companies')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
            ],
            'email' => [
                'nullable',
                'sometimes',
                'email',
                Rule::unique('tbl_companies')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
            ],
            'website_url' => [
                'nullable',
                'sometimes',
                Rule::unique('tbl_companies')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
            ],
        ];
    }
}
