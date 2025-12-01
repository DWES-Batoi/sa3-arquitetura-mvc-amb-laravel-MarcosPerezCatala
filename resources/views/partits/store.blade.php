@extends('layouts.app')

@section('title', 'Detall del Partit')

@section('content')

    <div class="max-w-2xl mx-auto bg-white p-8 rounded shadow-md border border-gray-200">
        
        <h1 class="text-3xl font-bold text-center text-blue-900 mb-2">Detall del Partit</h1>
        <p class="text-center text-gray-500 mb-8">Data: {{ $partit['data'] }}</p>

        <div class="flex justify-between items-center mb-8 text-xl">
            <div class="text-center w-1/3">
                <span class="block font-bold text-gray-800">{{ $partit['local'] }}</span>
                <span class="text-sm text-gray-500">(Local)</span>
            </div>

            <div class="text-center w-1/3 bg-gray-100 p-4 rounded-lg font-mono font-bold text-3xl border">
                {{ $partit['resultat'] ?? 'vs' }}
            </div>

            <div class="text-center w-1/3">
                <span class="block font-bold text-gray-800">{{ $partit['visitant'] }}</span>
                <span class="text-sm text-gray-500">(Visitant)</span>
            </div>
        </div>

        <div class="text-center mt-6">
            <a href="{{ route('partits.index') }}" class="text-blue-600 hover:underline">
                &laquo; Tornar a la llista de partits
            </a>
        </div>

    </div>

@endsection