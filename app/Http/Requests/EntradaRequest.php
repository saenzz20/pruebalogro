<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaRequest extends FormRequest
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
                    'placa' => 'required|unique:entradas|max:15',
                    'fecha_entrada' => 'required|date',
                    'fecha_salida' => 'required|date|after_or_equal:fecha_entrada',
                ];
            case 'PUT':
            case 'PATCH':
                $id = $this->route('entrada'); // Asume que el parámetro de ruta es 'entrada'
                return [
                    'placa' => 'required|unique:entradas,placa,' . $id . '|max:15',
                    'fecha_entrada' => 'required|date',
                    'fecha_salida' => 'required|date|after_or_equal:fecha_entrada',
                ];
            default:
                return [];
        }
    }

    public function messages(): array
    {
        return [
            'placa.required' => 'La placa es obligatoria.',
            'placa.unique' => 'La placa ya está en uso.',
            'placa.max' => 'La placa no debe superar los 15 caracteres.',
            'fecha_entrada.required' => 'La fecha de entrada es obligatoria.',
            'fecha_entrada.date' => 'La fecha de entrada debe ser una fecha válida.',
            'fecha_salida.required' => 'La fecha de salida es obligatoria.',
            'fecha_salida.date' => 'La fecha de salida debe ser una fecha válida.',
            'fecha_salida.after_or_equal' => 'La fecha de salida debe ser igual o posterior a la fecha de entrada.',
        ];
    }
}
