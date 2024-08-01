<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
      'name' => 'required|string|max:255',
      'description' => 'required|string|max:2000',
      'image' => 'sometimes|image|mimes:jpeg,jpg,png|max:2048',
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'La categoría es requerida',
      'name.string' => 'La categoría debe ser un texto',
      'name.max' => 'La categoría no debe exceder los :max caracteres',
      'description.required' => 'La descripción es requerida',
      'description.string' => 'La descripción debe ser un texto',
      'description.max' => 'La descripción no debe exceder los :max caracteres',
      'image.required' => 'El archivo debe ser una imagen',
      'image.string' => 'La imagen debe ser de tip: jpeg, jpg, png',
      'image.max' => 'La imagen no debe exceder los :max kilobytes',
    ];
  }
}