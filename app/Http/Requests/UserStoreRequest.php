<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class UserStoreRequest extends FormRequest
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
            //
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed'
         
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'El campo Nombre es requerido',
            'email.required' => 'El campo Email  es requerido',
            'email.email' => 'Debe ser un correo válido',
            'email.unique' => 'El Email ya existe',
            'password.required' => 'El campo Contraseña es requerido',
            'password.confirmed' => 'Debe Confirmar su contraseña',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(response()->json(['errors' => $errors, 'code' => '422'])); 

    }
}
