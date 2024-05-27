<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'placa' => 'required|unique:vehiculos|max:15',
                    'modelo' => 'required|unique:vehiculos|max:70',
                    'propietario' => 'required|unique:vehiculos|max:100',
                ];
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'placa' => 'required|unique:vehiculos,placa,'.$this->get('id').'|max:15',
                    'modelo' => 'required|unique:vehiculos,placa,'.$this->get('id').'|max:70',
                    'propietario' => 'required|unique:vehiculos,placa,'.$this->get('id').'|max:100',
                ];
            }
            default:
                # code...
                break;
        }
    }
}