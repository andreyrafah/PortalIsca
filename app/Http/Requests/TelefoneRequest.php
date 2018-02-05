<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TelefoneRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'tel' => 'required|numeric|digits_between:10,11' 
        ];
    }

    public function messages(){
        return [
            'tel.required' => 'Favor informar um telefone',
            'tel.numeric' => 'Permitido somente numeros',
            'tel.digits_between' => 'Favor inserir um telefone entre 10 e 11 digitos com o DDD' 
            
        ];
    }
}
