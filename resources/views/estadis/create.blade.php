{{-- Extiende del layout principal --}}
@extends('layouts.app')

{{-- Título de la pestaña para la vista de creación --}}
@section('title', 'Afegir nou estadi')

{{-- Contenido principal de la página --}}
@section('content')
  {{-- Título del formulario --}}
  <h1 class="text-2xl font-bold mb-4">Afegir nou estadi</h1>

  {{-- Si hay errores de validación (enviados desde 'store'), los mostramos aquí --}}
  @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-2 mb-4">
      <ul>
        {{-- Recorre todos los mensajes de error y los muestra en una lista --}}
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Formulario para crear un nuevo equipo.
       action: apunta a la ruta que procesa el formulario (equips.store).
       method: POST porque estamos enviando datos para guardar. --}}
  <form action="{{ route('estadis.store') }}" method="POST" class="space-y-4">
    {{-- Directiva Blade para incluir el token CSRF (seguridad obligatoria en Laravel) --}}
    @csrf

    {{-- Campo: nombre del equipo --}}
    <div>
      <label for="nom" class="block font-bold">Nom de l'estadi:</label>
      {{-- old('nom') rellena el campo con el valor anterior si la validación falla --}}
      <input type="text" name="nom" id="nom"
             value="{{ old('nom') }}" class="border p-2 w-full">
    </div>

    {{-- Campo: estadio --}}
    <div>
      <label for="ciutat" class="block font-bold">Ciutat:</label>
      <input type="text" name="ciutat" id="ciutat"
             value="{{ old('ciutat') }}" class="border p-2 w-full">
    </div>

    {{-- Campo: títulos --}}
    <div>
      <label for="capacitat" class="block font-bold">Capacitat:</label>
      <input type="number" name="capacitat" id="capacitat"
             value="{{ old('capacitat') }}" class="border p-2 w-full">
    </div>

        <div>
      <label for="equip_principal" class="block font-bold">Equip Principal:</label>
      <input type="text" name="equip_principal" id="equip_principal"
             value="{{ old('equip_principal') }}" class="border p-2 w-full">
    </div>

    {{-- Botón para enviar el formulario --}}
    <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded">
      Afegir
    </button>
  </form>
@endsection