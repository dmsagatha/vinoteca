@props(['wine'])

<img
  src="{{ $wine->image_url }}"
  alt="{{ $wine->name }}"
  class="w-full object-cover rounded-t-lg md:w-48 md:h-auto md:rounded-l-lg"
/>