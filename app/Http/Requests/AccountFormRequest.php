<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        if ($this->method() == 'POST') {
            $rules = [
                'user_id' => ['required']
            ];
        }
        $rules = [
            'account_type_id' => ['required'],
            'account' => 'required|numeric|unique:accounts,account,' . $this->request->get('id'),
            'server_name' => ['max:100'],
            'pass' => ['max:100']
        ];

        return $rules;
    }
}
