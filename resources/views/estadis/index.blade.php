{{-- Indica que esta vista extiende (hereda) de layouts.app --}}
@extends('layouts.app')

{{-- Define el contenido de la sección "title" que usará el layout en <title> --}}
  @section('title', "Guia d' Estadis")

  {{-- Abre la sección "content" que se insertará en @yield('content') del layout --}}
  @section('content')

    {{-- Título principal de la página --}}
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Guia d'Estadis</h1>

    {{-- Si existe un mensaje de éxito en la sesión (enviado desde 'store'), lo mostramos --}}
    @if (session('success'))
      <div class="bg-green-100 text-green-700 p-2 mb-4">
        {{ session('success') }} {{-- Muestra el texto del mensaje --}}
      </div>
    @endif

    {{-- Enlace para ir al formulario de creación de un nuevo equipo --}}
    <p class="mb-4">
      <a href="{{ route('estadis.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">
        Nou estadi
      </a>
    </p>

    {{-- Tabla que mostrará el listado de equipos --}}
    <table class="w-full border-collapse border border-gray-300">
      <tbody>
        {{-- Recorre todos los equipos recibidos ($equips) desde el controlador --}}
        @foreach($estadis as $key => $estadi)
          <tr class="hover:bg-gray-100"> {{-- Fila de la tabla --}}

            {{-- Celda: nombre del equipo, enlazando a su página de detalle --}}
            <td class="border border-gray-300 p-2">
              {{-- route('equips.show', $key) genera la URL (ej: /equips/0) --}}
              <a href="{{ route('estadis.show', $key) }}" class="text-blue-700 hover:underline">
                {{ $estadi['nom'] }} {{-- Muestra el nombre --}}
              </a>
            </td>

            {{-- Celda:ciutat del equipo --}}
            <td class="border border-gray-300 p-2">
              {{ $estadi['ciutat'] }}
            </td>

            {{-- Celda: número de capacitat --}}
            <td class="border border-gray-300 p-2">
              {{ $estadi['capacitat'] }}
            </td>
            <a>

              <td class="border border-gray-300 p-2">
                    {{ $estadi['equip_principal'] }}
                </a>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endsection {{-- Cierra la sección "content" --}}