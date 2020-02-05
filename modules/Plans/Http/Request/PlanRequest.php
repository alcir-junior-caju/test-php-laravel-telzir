<?php

namespace Modules\Plans\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'minutes' => 'required|numeric',
            'percent' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Preencha o campo Nome!',
            'minutes.required' => 'Preencha o campo Minutos!',
            'minutes.numeric' => 'Apenas números são permitidos!',
            'percent.required' => 'Preencha o campo Porcentagem!',
            'percent.numeric' => 'Apenas números são permitidos!'
        ];
    }
}
