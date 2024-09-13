<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Enviar correo')}}
    </h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
              <thead>
                <tr class="bg-gray-100 dark:bg-gray-700">
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('Seleccionar') }}
                  </th>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('Nombre') }}
                  </th>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('Correo electrónico') }}
                  </th>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('Fecha de creado') }}
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900 dark:text-gray-100">
                        {{-- <input type="checkbox" name="users[]" value="{{ $user->id }}"> --}}
                        <input type="checkbox" class="user-checkbox" name="users[]" value="{{ $user->id }}">
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900 dark:text-gray-100">
                        {{ $user->name }}
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900 dark:text-gray-100">
                        {{ $user->email }}
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900 dark:text-gray-100">
                        {{ $user->created_at }}
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            <button type="button" class="send-email">Enviar Correo Electrónico</button>
              {{-- <button type="submit">Enviar Correo Electrónico</button> --}}
              {{-- <button type="button" class="send-email">Enviar Correo Electrónico</button> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>