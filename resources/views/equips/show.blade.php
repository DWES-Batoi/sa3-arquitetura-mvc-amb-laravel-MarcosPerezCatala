{{-- Contenido principal de la página de detalle --}}
@extends('layouts.app')

@section('content')

  <x-equip :nom="$equip['nom']"
            :estadi="$equip['estadi']"
           :titols="$equip['titols']"
           /> 

  {{-- Enlace para volver fácilmente al listado --}}
  <a href="{{ route('equips.index') }}" class="text-blue-600 hover:underline mt-4 block">
    &laquo; Tornar a la llista
  </a>
@endsection