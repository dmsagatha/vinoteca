<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WineRequest extends FormRequest
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
    $imageRules = 'sometimes|image|mimes:jpeg,jpg,png|max:2048';

    if ($this->isMethod('post')) {
      $imageRules = 'required|image|mimes:jpeg,jpg,png|max:2048';
    }
  
    return [
      'name' => [
        'required', 'string', 'max:255',
        Rule::unique('wines', 'name')->ignore($this->route('wine'))
      ],
      'description' => ['required', 'string', 'max:2000'],
      'category_id' => ['required', 'exists:categories,id'],
      'year' => ['required', 'integer', 'min:' .  now()->subYears(value: 100)->year, 'max:' . now()->year],
      'priece' => ['required', 'numeric', 'min:0'],
      'stock' => ['required', 'integer', 'min:0'],
      'image' => $imageRules,
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'El nombre es obligatorio',
      'name.string' => 'El nombre debe ser un texto',
      'name.max' => 'El nombre no debe exceder los :max caracteres',
      'name.unique' => 'El vino ya existe',
      'description.required' => 'La descripción es obligatoria',
      'description.string' => 'La descripción debe ser un texto',
      'description.max' => 'La descripción no debe exceder los :max caracteres',
      'category_id.required' => 'La categoría es obligatoria',
      'category_id.exists' => 'La categoría seleccionada no existe',
      'year.required' => 'El año es obligatorio',
      'year.integer' => 'El año ser un número',
      'year.min' => 'El año no puede ser menor a :min',
      'year.max' => 'El año no puede ser superior a :max',
      'price.required' => 'El precio es obligatorio',
      'price.numeric' => 'El precio ser un número',
      'price.min' => 'El precio no puede ser negativo',
      'stock.required' => 'El stock es obligatorio',
      'stock.integer' => 'El stock ser un número entero',
      'stock.min' => 'El stock no puede ser negativo',
      'image.required' => 'La imagen es requerida',
      'image.image' => 'El archivo debe ser una imagen',
      'image.mimes' => 'La imagen debe ser de tipo: jpeg, jpg, png',
      'image.max' => 'La imagen no debe exceder los :max kilobytes',
    ];
  }
}