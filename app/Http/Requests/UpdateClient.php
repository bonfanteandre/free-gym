<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClient extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'document' => 'required|unique:clients,document,' . $this->client->id,
            'sex' => 'required',
            'birth' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'phone' => preg_replace('/\D/', '', $this->phone),
            'document' => preg_replace('/\D/', '', $this->document),
            'zipcode' => preg_replace('/\D/', '', $this->zipcode)
        ]);
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'email' => 'O campo :attribute deve ser um endereço de e-mail válido',
            'unique' => 'O campo :attribute já está sendo utilizado em outro cliente',
            'min' => 'O campo :attribute deve possuir no mínimo :min caracteres'
        ];
    }
}
