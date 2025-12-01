@extends('layouts.app')

@section('title', "Detall de Jugadora")

@section('content')
  

  
  <div class="border p-4 rounded shadow bg-white">
      <h2 class="text-2xl font-bold">{{ $jugadoras['nom'] }}</h2>
      <p><strong>Equip:</strong> {{ $jugadoras['equip'] }}</p>
      <p><strong>Posició:</strong> {{ $jugadoras['posicio'] }}</p>
  </div>



  <a href="{{ route('jugadoras.index') }}" class="text-blue-600 hover:underline mt-4 block">
    &laquo; Tornar a la llista
  </a>
@endsection