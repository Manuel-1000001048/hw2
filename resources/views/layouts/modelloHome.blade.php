<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('css') 
    @yield('script') 
        

    

    
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Dela+Gothic+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300&family=Dela+Gothic+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Raleway:wght@100&display=swap" rel="stylesheet">
    
    
</head>
<body>
<header>
   @yield('contenuto') 
</header>

<section id="Attività">
      @yield('alimenti')  
</section>

<footer>
    <address>Manuel Rosario Maugeri 1000001048</address>         
</footer>

</body>
</html>