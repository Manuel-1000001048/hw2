@extends('layouts.modello')

@section('title', '| Login')  <!-- Per inserire il titolo di questa pagina dato che ne layout è generico -->

@section('script')
<script src='{{ asset('js/Login.js') }}' defer></script> <!-- Per inserire il js dalla cartella js in public -->

<!-- Inserire la parte del php di registrazione -->
@endsection



@section('divTitolo')
<div>ACCEDI !</div>
@endsection

@section('form')
    <form name="login" method="post" action="{{ route('login') }}">
              @csrf
              <p>
                  <label>E_mail<input type='text' name='email'></label>
              </p>
              <p>
                  <label>Password <input type='password' name='password'></label>
              </p>
              <p>
                  <label>&nbsp;<input type='submit' value="ACCEDI"></label> <!-- Per non scrivere niente accanto -->
              </p>
          </form>
@endsection



@section('link')
<a href="{{ route('registrazione') }}" class='Bottone'>REGISTRATI  </a>

@endsection