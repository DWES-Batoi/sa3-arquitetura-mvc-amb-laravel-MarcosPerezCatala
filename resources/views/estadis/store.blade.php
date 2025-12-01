@extends('layouts.app')

@section('title', "Detall d'Estadi")

@section('content')
  

  
  <div class="border p-4 rounded shadow bg-white">
      <h2 class="text-2xl font-bold">{{ $estadi['nom'] }}</h2>
      <p><strong>Ciutat:</strong> {{ $estadi['ciutat'] }}</p>
      <p><strong>Capacitat:</strong> {{ $estadi['capacitat'] }} espectadors</p>
      <p><strong>Equip Principal:</strong> {{ $estadi['equip_principal'] }}</p>
  </div>



  <a href="{{ route('estadis.index') }}" class="text-blue-600 hover:underline mt-4 block">
    &laquo; Tornar a la llista
  </a>
@endsection