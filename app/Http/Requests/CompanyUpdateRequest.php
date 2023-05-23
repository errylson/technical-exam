<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\Models\Company;

class CompanyUpdateRequest extends FormRequest
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
        $name = $this->input('name');
        $email = $this->input('email');
        $website_url = $this->input('website_url');

        // Retrieve the old value
        $old = Company::findOrFail($id);

        $rules = [
            'name' => ['required', 'string', 'max:255'],
        ];

        // Add the unique rule only if the name has changed
        if (strtolower($name) !== strtolower($old->name)) {
            $rules['name'][] = Rule::unique('tbl_companies')->where(function ($query) {
                return $query->whereNull('deleted_at');
            });
        }

        if (!empty($email) && $old->email && strtolower($email) !== strtolower($old->email)) {
            $rules['email'] = [
                'email', 
                Rule::unique('tbl_companies')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                })
            ];
        }

        if (!empty($website_url) && $old->website_url && strtolower($website_url) !== strtolower($old->website_url)) {
            $rules['website_url'] = [
                    Rule::unique('tbl_companies')->where(function ($query) {
                    return $query->whereNull('deleted_at');
                })
            ];
        }

        return $rules;
    }
}
