@extends('layouts.app')

@section('title', "Llistat de Partits")

@section('content')

    <h1 class="text-3xl font-bold text-blue-800 mb-6">Resultats de Partits</h1>

    {{-- Missatge d'èxit --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Botó per crear nou partit --}}
    <p class="mb-4">
        <a href="{{ route('partits.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Nou Partit
        </a>
    </p>

    <table class="w-full border-collapse border border-gray-300 shadow-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2 text-left">Local</th>
                <th class="border p-2 text-center">Resultat</th>
                <th class="border p-2 text-left">Visitant</th>
                <th class="border p-2 text-left">Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($partits as $key => $partit)
                <tr class="hover:bg-gray-50">
                    {{-- Local --}}
                    <td class="border border-gray-300 p-2 font-semibold">
                        {{ $partit['local'] }}
                    </td>

                    {{-- Resultat (amb enllaç al detall) --}}
                    <td class="border border-gray-300 p-2 text-center">
                        {{-- CORRECCIÓ: Afegim , $key per passar l'ID --}}
                        <a href="{{ route('partits.show', $key) }}" 
                           class="bg-blue-100 text-blue-800 px-3 py-1 rounded hover:bg-blue-200 font-bold text-sm">
                            {{ $partit['resultat'] ?? 'vs' }}
                        </a>
                    </td>

                    {{-- Visitant --}}
                    <td class="border border-gray-300 p-2 font-semibold">
                        {{ $partit['visitant'] }}
                    </td>

                    {{-- Data --}}
                    <td class="border border-gray-300 p-2 text-gray-600">
                        {{ $partit['data'] }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Si no hi ha partits --}}
    @if(empty($partits))
        <p class="text-gray-500 mt-4 text-center">Encara no hi ha partits registrats.</p>
    @endif

@endsection