<form action="{{ $action }}" method="post" enctype="multipart/form-data">
  @csrf
  @method($method)

  <div class="mb-4">
    <label for="name" class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Nombre</label>
    <input 
      type="text" 
      name="name" 
      id="name" 
      value="{{ old('name', $category->name) }}"
      class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
    >
    @error('name')
      <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
  </div>

  <div class="mb-4">
    <label for="image" class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Imagen</label>
    <input 
      type="file" 
      name="image" 
      id="image"
      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-white leading-tight focus:outline-none focus:shadow-outline"
    >
    @error('image')
      <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
  </div>

  <div class="mb-4">
    <label for="description" class="block text-gray-700 dark:text-white text-sm font-bold mb-2">Descripción</label>
    <textarea
      name="description" 
      id="description" 
      value="{{ old('name', $category->name) }}"
      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description', $category->description) }}</textarea>
    @error('description')
      <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
  </div>

  <div class="mb-4">
    <a
      href="{{ route('categories.index') }}"
      class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"
    >
      Cancelar
    </a>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ms-2 rounded">{{ $submit }}</button>
  </div>
</form>