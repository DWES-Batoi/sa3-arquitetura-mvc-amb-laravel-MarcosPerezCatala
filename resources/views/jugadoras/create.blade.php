{{-- Extiende del layout principal --}}
@extends('layouts.app')

{{-- Título de la pestaña para la vista de creación --}}
@section('title', 'Afegir nova Jugadora')

{{-- Contenido principal de la página --}}
@section('content')
    {{-- Título del formulario --}}
    <h1 class="text-2xl font-bold mb-4">Afegir nova Jugadora</h1>

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
    <form action="{{ route('jugadoras.store') }}" method="POST" class="space-y-4">
        {{-- Directiva Blade para incluir el token CSRF (seguridad obligatoria en Laravel) --}}
        @csrf

        {{-- Campo: nombre del equipo --}}
        <div>
            <label for="nom" class="block font-bold">Nom de la jugadora:</label>
            {{-- old('nom') rellena el campo con el valor anterior si la validación falla --}}
            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" class="border p-2 w-full">
        </div>

        {{-- Campo: estadio --}}
        <div>
            <label for="ciutat" class="block font-bold">Equip:</label>
            <input type="text" name="equip" id="equip" value="{{ old('ciutat') }}" class="border p-2 w-full">
        </div>

        <div>
            <label for="posicio" class="block font-bold">Posició:</label>

            <select name="posicio" id="posicio" class="border p-2 w-full bg-white">
                <option value="" disabled {{ old('posicio') ? '' : 'selected' }}>
                    Selecciona una posició
                </option>

                <option value="Portera" {{ old('posicio') == 'Portera' ? 'selected' : '' }}>
                    Portera
                </option>
                <option value="Defensa" {{ old('posicio') == 'Defensa' ? 'selected' : '' }}>
                    Defensa
                </option>
                <option value="Migcampista" {{ old('posicio') == 'Migcampista' ? 'selected' : '' }}>
                    Migcampista
                </option>
                <option value="Davantera" {{ old('posicio') == 'Davantera' ? 'selected' : '' }}>
                    Davantera
                </option>
            </select>
        </div>

        {{-- Botón para enviar el formulario --}}
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Afegir
        </button>
    </form>
@endsection