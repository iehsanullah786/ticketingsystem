<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // You can put custom authorization logic here.
        // Return true if authorized, false if not.
        return true; // Typically set to true unless you have specific authorization rules.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|max:255',
            'email' => 'email|unique:employees,email',
            'phone' => 'numeric|digits_between:10,15',
            'address' => 'string|max:500',
            'bank' => 'string|max:255',
            'accountno' => 'nullable',
            'salary' => 'nullable',
        ];
    }
}
