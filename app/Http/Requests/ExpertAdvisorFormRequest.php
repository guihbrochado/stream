<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExpertAdvisorFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'code' => [
                'sometimes',
                'required',
                'max:255',
                Rule::unique('expert_advisors', 'code')->where('magic_number', $this->input('magic_number'))
            ],
            'name' => 'required',
            'magic_number' => [
                'numeric',
                'required',
                Rule::unique('expert_advisors', 'magic_number')->where('code', $this->input('code'))
            ]
        ];

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            "code.required" => "O campo Código é obrigatório.",
            "code.max" => "O Código deve ter no máximo 255 caracteres.",
            "code.unique" => "Já existe EA cadastrado para esta combinação de Código e Magic Number",
            "name" => 'O campo Nome do EA é obrigatório',
            'magic_number.numeric' => 'O campo Magic Number aceita apenas número inteiro',
            'magic_number.required' => 'O campo Magic Number é obrigatório',
            "magic_number.unique" => "Já existe EA cadastrado para esta combinação de Código e Magic Number",
        ];
    }
}
