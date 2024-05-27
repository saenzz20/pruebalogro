<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
                    'nombre' => 'required|unique:usuarios|max:70',
                    'apellidos' => 'required|unique:usuarios|max:70',
                    'imagen' => 'max:70',
                ];
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'nombre' => 'required|unique:usuarios,nombre,'.$this->get('id').'|max:70',
                    'apellidos' => 'required|unique:usuarios,nombre,'.$this->get('id').'|max:50',
                    'imagen' => 'max:70',
                ];
            }
            default:
                # code...
                break;
        }
    }
}
