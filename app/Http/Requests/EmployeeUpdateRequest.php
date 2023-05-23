<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Employee;

class EmployeeUpdateRequest extends FormRequest
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
        $id = $this->route('id');
        $email = $this->input('email');

        // Retrieve the old value
        $old = Employee::findOrFail($id);

        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
        ];

        if (!empty($email) && $old->email && strtolower($email) !== strtolower($old->email)) {
            $rules['email'] = [
                'email', 
                Rule::unique('tbl_employees')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                })
            ];
        }

        return $rules;
    }
}
