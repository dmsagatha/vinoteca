<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Crear Categoría') }}
    </h2>
  </x-slot>
  
  {{-- @include('wine.category.form', [
    'category' => $category,
    'action'   => $action,
    'method'   => $method,
    'submit'   => $submit
  ]) --}}
  @include('wine.category.form')
</x-app-layout>