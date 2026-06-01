<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreAlumnoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'matricula'=>['required','string'],
            'nombre'=>['required','string'],
            'apellidop'=>['required','string'],
        ];
    }

    #[Override]
    public function messages()
    {
        return [
            'matricula.required'=>'La matricula es obligatoria',
            'nombre.required'=>'El nombre es obligatorio',
            'nombre.string'=>'El nombre debe ser texto',
            'apellidop.required'=>'El apellido paterno es obligatorio',
        ];
    }
}
