@extends('layouts.modello')

@section('title', '| Registrazione')  <!-- Per inserire il titolo di questa pagina dato che ne layout è generico -->

@section('script')
<script src='{{ asset('js/registrazione.js') }}' defer></script> <!-- Per inserire il js dalla cartella js in public -->

<script type="text/javascript">
    const REGISTRAZIONE_ROUTE = "{{route('registrazione')}}";
</script>
@endsection

@section('contenitore')
<div id="contenitore"></div>
@endsection

@section('divTitolo')
<div>REGISTRATI !</div>
@endsection

@section('form')
<form name='regi' method='post' action="{{ route('registrazione') }}"> 
    @csrf
                <p>
                    <label>Nome <input id="nome" type='text' name='nome'></label>  
                </p>
                <p>
                    <label>Cognome <input id="cognome" type='text' name='cognome'></label>
                </p>
                <p>
                    <label>E-mail <input id="Mail" type='text' name='email'></label>
                </p>
                <p>
                    <label>Password  <input id="Pass" type='password' name='password'></label>
                </p>
                <p>
                    <label>Conferma Password <input type='password' name='conferma'></label>
                </p>

                <p>
                    <label>&nbsp;<input type='submit' value="Registrati"></label> 
                </p>
</form>                
@endsection

@section('pReg')
<p id='testo'><strong>Requisiti Password:  <br/>
                <em id="min">- Minimo 6 caratteri</em> <br/>
                <em id="spec"> - Minimo due caratteri speciali (/ + ? !)</em></strong></p>
@endsection

@section('link')
<a href="{{ route('login') }}" class='Bottone'>Già Registrato?  </a>  <!-- passiamo il route login per andare alla pagina login -->

@endsection