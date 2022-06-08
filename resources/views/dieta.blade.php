
@extends('layouts.modelloDieta')

@section('title', '| Dieta')  <!-- Per inserire il titolo di questa pagina dato che ne layout è generico -->

@section('css')
<link rel="stylesheet" href='{{ asset('css/dieta.css') }}'>
@endsection

@section('script')
<script src='{{ asset('js/dieta.js') }}' defer></script> <!-- Per inserire il js dalla cartella js in public -->

<script type="text/javascript">
    const CSFR_TOKEN = '{{ csrf_token() }}';
    const REMOVE_ROUTE = "{{route('remove')}}";
</script>
@endsection



@section('contenuto')
<div id="overlay"></div>         <!-- Per la trasparenza dell'immagione -->
            <nav>  
                <div id="Icone"> 
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT </a>
                <a href="{{ route('home') }}"> HOME </a>
                <a href="{{ route('dieta') }}"> DIETA </a>         
                </div>
            </nav>  
            
            <h1>
                <strong id='Titolo'> La tua Dieta </strong> <br/>
                <em id='Second'> Tieni d'occhio la tua Alimentazione </em> <br/>
                
            </h1>
            <h1> {{ $utente }}</h1> <!-- nella home controller passiamo il valore con with quel valore qui è una variabile -->
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">  <!-- Inserire il form per il logout -->
        @csrf
        </form>
@endsection

@section('alimenti')

@foreach($rit as $alimento)      <!-- Scorriamo la lista fino a quando c'è un alimento all'interno e lo stampiamo -->
            {!! $alimento !!}     <!-- Usiamo per gestire i blocchi HTML inseriti prima nel controller -->
@endforeach

@endsection
