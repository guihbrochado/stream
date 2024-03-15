<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LicenseFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'expert_advisor_id' => 'required',
            'volume' => [
                'required_if:operation_type,1',
                'required_if:operation_type,2',
                'numeric',
                'nullable'
            ],
            'operation_type_id' => [
                'required',
                'in:1,2,3'
            ],
            'leverage' => [
                'required_if:operation_type,3',
                'numeric',
                'nullable'
            ],
            'max_volume' => [
                'nullable',
                'numeric'
            ],
            'allowed_symbols' => [
                'required',               
                'max:255'
            ],
            'max_daily_loss' => [
                'nullable',
                'numeric'
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
            'expert_advisor_id' => "O campo Expert Advisor é obrigatório.",
            'volume.required_if' => "O campo Volume fixo/inicial é obrigatório nos Setups Lote Fixo e Com parcial.",
            'volume.numeric' => "O campo Volume fixo/inicial só aceita números.",
            'operation_type_id.required' => "O campo Tipo de Setup é obrigatório.",
            'operation_type_id.in' => "Selecione um Tipo de Setup válido.",
            'leverage.required_if' => "O campo Multiplicador de Alavancagem é obrigatório no Setup Multiplicador.",
            'leverage' => "O campo Multiplicador de Alavancagem só aceita números.",
            'max_volume' => "O campo Volume máximo autorizado só aceita números.",
            'allowed_symbols.required' => "O campo Símbolos de ativos autorizados a operar é obrigatório.",
            'allowed_symbols.max' => "O campo Símbolos de ativos autorizados a operar deve ter no máximo 255 caracteres.",
            'max_daily_loss' => "O campo Limite de perda diário (0 = desligado) só aceita números."
        ];
    }
}
