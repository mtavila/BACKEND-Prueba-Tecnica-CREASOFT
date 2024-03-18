<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class PromocionStoreRequest extends FormRequest
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
            'celular'=>'required|min:8|max:10',
            'dni'=>'required|min:8|max:10',
            'chkterminosPromocion' =>'accepted'
        ];
    }
    public function messages(): array
    {
        return [
            'celular.required' => 'El campo Celular es requerido',
            'celular.min' => 'El campo Celular debe contener como mínimo 8 carácteres',
            'celular.max' => 'El campo Celular debe contener como máximo 10 carácteres',
            'dni.required' => 'El campo DNI es requerido',
            'dni.min' => 'El campo DNI debe contener como mínimo 8 carácteres',
            'dni.max' => 'El campo DNI debe contener como máximo 10 carácteres',
            'chkterminosPromocion.accepted' => 'Debe aceptar los términos y condiciones'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(response()->json(['errors' => $errors, 'code' => '422'])); 

    }
}
