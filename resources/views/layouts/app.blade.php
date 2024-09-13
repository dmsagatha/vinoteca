<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
      @include('layouts.navigation')

      <!-- Page Heading -->
      @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
          <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
          </div>
        </header>
      @endisset

      <!-- Page Content -->
      <main>
        @if (session('success'))
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-0 mt-2">
            <div class="bg-green-100 border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
              <strong class="font-bold">¡Exito!</strong>
              <span class="block sm:inline">{{ session('success') }}</span>
            </div>
          </div>
        @endif

        @if (session('error'))
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-0 mt-2">
            <div class="bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
              <strong class="font-bold">Error!</strong>
              <span class="block sm:inline">{{ session('error') }}</span>
            </div>
          </div>
        @endif

        {{ $slot }}
      </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">  
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
        
      $(".send-email").click(function(){
          var selectRowsCount = $("input[class='user-checkbox']:checked").length;
    
          if (selectRowsCount > 0) {    
              var ids = $.map($("input[class='user-checkbox']:checked"), function(c){return c.value; });
    
              $.ajax({
                 type:'POST',
                 url:"{{ route('send.emails') }}",
                 data:{ids:ids},
                 success:function(data){
                    alert(data.success);
                 }
              });
    
          }else{
              alert("Please select at least one user from list.");
          }
          console.log(selectRowsCount);
      });
    
  </script>
  </body>
</html>