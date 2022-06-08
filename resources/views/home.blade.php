@extends('layouts.modelloHome')

@section('title', '| Home')  

@section('css')
<link rel="stylesheet" href='{{ asset('css/Accesso.css') }}'>
@endsection

@section('script')
<script src='{{ asset('js/Ricerca.js') }}' defer></script> <!-- Per inserire il js dalla cartella js in public -->

<script type="text/javascript">
    const CSFR_TOKEN = '{{ csrf_token() }}';
    const RICERCA_ROUTE = "{{route('home')}}";
    const LIKE_ROUTE = "{{route('like')}}";   
</script>
@endsection



@section('contenuto')
<div id="overlay"></div>         <!-- Per la trasparenza dell'immagione -->
            <nav>  
                <div id="Icone"> 
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT </a>
                    <!-- onclick per levare l'evento di default allora manda richiesta get ed entra in contrato  -->
                    <!-- il form serve per mandare la richiesta post infatti viene creata post, ma non deve essere visualizzata nella pagina -->
                    <a href="{{ route('home') }}"> HOME </a>
                    

                    <a href="{{ route('dieta') }}"> DIETA </a>          
                </div>
            </nav>  
            
            <h1>
                <strong id='Titolo'> HARDCORE FITNESS </strong> <br/>
                <em id='Second'> Resta in forma con noi! </em> <br/>
                <h1>Benvenuto {{ $utente }}</h1>      <!-- nella home controller passiamo il valore con with quel valore qui è una variabile -->              
            </h1>
            
            <form id='Prodotti' method="get" action='"{{ route('home') }}"'> 
            @csrf
                        Alimenti Dieta:
                        <input type="text" id="prodotto">
                        <input type="submit" id="submit" value="Cerca">
                    </form>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">  <!-- Inserire il form per il logout -->
        @csrf
        </form>
@endsection