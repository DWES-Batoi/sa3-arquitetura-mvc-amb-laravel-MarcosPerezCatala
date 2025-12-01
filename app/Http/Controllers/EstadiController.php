<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EstadiController 
{
    public $estadis = [
        [
            'nom' => 'Camp Nou', 
            'ciutat' => 'Barcelona', 
            'capacitat' => 99354, 
            'equip_principal' => 'FC Barcelona'
        ]
    ];

    public function index()
    {
        $estadis = Session::get('estadis', $this->estadis);
        return view('estadis.index', compact('estadis'));
    }

    public function create()
    {
        return view('estadis.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|min:3',
            'ciutat' => 'required|min:2',
            'capacitat' => 'required|integer|min:0',
            'equip_principal' => 'required|min:3',
        ]);

        $estadis = Session::get('estadis', $this->estadis);
        $estadis[] = $validated;
        Session::put('estadis', $estadis);

        return redirect()->route('estadis.index')->with('success', 'Estadi afegit correctament!');
    }
    
    public function show($id)
    {
        $estadis = Session::get('estadis', $this->estadis);
        
        if (!isset($estadis[$id])) {
            abort(404);
        }
        
        $estadi = $estadis[$id];
        return view('estadis.store', compact('estadi'));
    }
}