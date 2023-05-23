<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeStoreRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max: 255', ],
            'last_name' => ['required', 'string', 'max: 255', ],
            'email' => [
                'nullable',
                'sometimes',
                'email',
                Rule::unique('tbl_employees')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                }),
            ],
        ];
    }
}
