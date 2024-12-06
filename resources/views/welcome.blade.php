<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="csrf-token" content="{{ csrf_token() }}">
   {{--        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
        <title>Laravel</title>

        <!-- Fonts -->

<link rel="stylesheet" href="{{ mix('css/app.css') }}">

@livewireStyles

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.2.3/dist/cdn.min.js" defer></script>
<script src="{{ mix('js/app.js') }}" defer></script>
        <!-- Styles -->
        <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        </style>



    </head>

    <body class="antialiased">
    @livewire('navigation2')

  <h1>holla</h1>


          @stack('modals')

          @livewireScripts
    </body>




</html>
