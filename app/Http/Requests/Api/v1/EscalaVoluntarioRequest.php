<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class EscalaVoluntarioRequest extends FormRequest
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
            'codigo' => [
                'required',
                Rule::exists('voluntarios', 'codigo')->where(function ($query) {
                    $query->whereNull('deleted_at');
                }),
            ],
            'escala_id' => 'required',
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'codigo' => 'Código',
            'escala_id' => 'Evento',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'codigo.exists' => 'Voluntário não encontrado.',
        ];
    }

    /**
     * @param Validator $validator
     * @return void
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        if ($this->expectsJson()) {
            throw new ValidationException($validator, response()->json(['error' => $validator->errors()], 422));
        }

        parent::failedValidation($validator);
    }
}
