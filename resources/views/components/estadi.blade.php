{{-- Contenedor del componente de equipo con estilos básicos --}}
<div class="equip border rounded-lg shadow-md p-4 bg-white">
  {{-- Nombre del equipo en grande y en azul --}}
  <h2 class="text-xl font-bold text-blue-800">{{ $nom }}</h2>

  {{-- Línea que muestra el estadio del equipo --}}
  <p>
    <strong>Ciutat:</strong> {{ $estadi }}
  </p>

  {{-- Línea que muestra el número de títulos --}}
  <p>
    <strong>Capacitat:</strong> {{ $titols }}
  </p>
    <p>
    <strong>Equipo principal:</strong> {{ $titols }}
  </p>
</div>