<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $photo = request()->isMethod('put') ? 'nullable|mimes:jpeg,jpg,png,gif' : 'required|mimes:jpeg,jpg,png,gif';
        return [
            'name'      =>  'required|regex:/^[\pL\s\-]+$/u|max:255',
            'email'     =>  ['required', 'string', 'email', 'max:255', Rule::unique('clients')->ignore($this->client)],
            'phone'     =>  'required',
            'photo'     =>  $photo
        ];
    }

    public function messages()
    {
        return [
            'required'  =>  'O campo :attribute é obrigatório.',
            'regex'     =>  'O campo :attribute deve conter apenas letras',
            'unique'    =>  'Este :attribute já existe em nossa base de dados'
        ];
    }
}
