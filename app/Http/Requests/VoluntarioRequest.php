<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class VoluntarioRequest
 * @package App\Http\Requests
 */
class VoluntarioRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:100',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|dimensions:min_width=200,min_height=200',
            'sexo' => ['required', Rule::in(['M', 'F'])],
            'professor_ebd' => ['required', Rule::in(['0', '1'])],
            'observacao' => 'max:1000',
            'disponibilidades' => 'required|min:1',
            'codigo' => 'nullable|unique:voluntarios,codigo',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'nome' => 'Nome',
            'foto' => 'Foto',
            'sexo' => 'Sexo',
            'professor_ebd' => 'Professor EBD',
            'observacao' => 'Observações',
            'disponibilidades' => 'Disponibilidade',
            'codigo' => 'Código',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'foto.dimensions' => 'A imagem deve ter o tamanho mínimo de 200x200.',
            'codigo.unique' => 'O Código informado já está sendo utilizado por outro voluntário.',
        ];
    }
}
