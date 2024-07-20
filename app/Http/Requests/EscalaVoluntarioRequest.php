<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
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
        $voluntarioId = $this->get('voluntario_id');
        $escalaId = $this->get('escala_id');

        return [
            'voluntario_id' => [
                'required',
                Rule::unique('escala_voluntario')->where(function ($query) use ($voluntarioId, $escalaId) {
                    return $query
                        ->where('voluntario_id', $voluntarioId)
                        ->where('escala_id', $escalaId)
                        ->whereNull('deleted_at');
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
            'voluntario_id' => 'Voluntário',
            'escala_id' => 'Evento',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'voluntario_id.unique' => 'Este voluntário já está adicionado nesta escala.',
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
