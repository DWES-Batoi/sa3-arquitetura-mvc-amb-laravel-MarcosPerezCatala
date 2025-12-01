<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JugadoraController
{

    public $jugadoras = [
        [
            'nom' => 'Alexia',
            'equip' => 'Barcelona',
            'posicio' => 'Medio Campista',
        ]
    ];

    public function index()
    {
        $jugadoras = Session::get('jugadoras', $this->jugadoras);
        return view('jugadoras.index', compact('jugadoras'));
    }

    public function create()
    {
        return view('jugadoras.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|min:3',
            'equip' => 'required|min:2',
            'posicio' => 'required|in:Portera,Defensa,Migcampista,Davantera',
        ]);

        $jugadoras = Session::get('jugadoras', $this->jugadoras);
        $jugadoras[] = $validated;
        Session::put('jugadoras', $jugadoras);

        return redirect()->route('jugadoras.index')->with('success', 'Jugadora afegit correctament!');
    }

    public function show($id)
    {
        $jugadoras = Session::get('jugadoras', $this->jugadoras);

        if (!isset($jugadoras[$id])) {
            abort(404);
        }

        $jugadoras = $jugadoras[$id];
        return view('jugadoras.store', compact('jugadoras'));
    }
}
?>