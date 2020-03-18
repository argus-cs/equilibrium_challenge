<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomRequest extends FormRequest
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
          'cpf'       =>  'required|max:11|unique:staff',
          'name'      =>  'required',
          'carteira'  =>  'required|max:12',
          'sector'    =>  'required',
          'phone'     =>  'max:11',
          'phone2'    =>  'max:11',
        ];
    }

    public function messages()
    {
      return [
        'cpf.required'      =>  'CPF é obrigatório!',
        'cpf.max'           =>  'CPF não pode ter mais que 11 numeros!',
        'cpf.unique'        =>  'CPF já está em uso. Porfavor entre com outro CPF!',
        'name.required'     =>  'Nome é obrigatório!',
        'carteira.required' =>  'CTPS é obrigatória!',
        'carteira.max'      =>  'CTPS não pode ter mais que 12 numeros!'
        'sector.required'   =>  'Setor é obrigatório!',
        'phone.max'         =>  'Telefone não pode ter mais que 11 numeros!',
      ];
    }
}
