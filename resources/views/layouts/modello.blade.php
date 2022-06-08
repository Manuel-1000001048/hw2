
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel='stylesheet' href='{{ asset('css/Regi.css') }}'> <!-- Qui sia login che registrazione hanno lo stesso css, quindi lo metto uguale per tutti -->
    @yield('script') <!-- Qui sia login che registrazione uno script diverso quindi lo metto in generale -->
        

    

    
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Dela+Gothic+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300&family=Dela+Gothic+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Raleway:wght@100&display=swap" rel="stylesheet">
    
    
</head>
<body>

@yield('contenitore')
@yield('divTitolo')

    <main>
       @yield('form')  <!-- Qui sia login che registrazione hanno un form diverso dentro il main quindi lo implemento dentro il loro php -->
        
    </main>
    @yield('pReg')
    @yield('link')
    <div id="Errore"></div>

</body>
</html>



