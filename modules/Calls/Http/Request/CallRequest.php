<?php

namespace Modules\Calls\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class CallRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'origin' => 'required|numeric',
            'destination' => 'required|numeric',
            'value' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'origin.required' => 'Preencha o campo Origem!',
            'origin.numeric' => 'Apenas números são permitidos!',
            'destination.required' => 'Preencha o campo Destino!',
            'destination.numeric' => 'Apenas números são permitidos!',
            'value' => 'Preencha o campo Valor / min!'
        ];
    }
}
