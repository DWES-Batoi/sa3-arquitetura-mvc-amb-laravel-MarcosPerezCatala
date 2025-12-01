<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PartitController
{
    public $partits = [
        [
            'local' => 'Barça Femení',
            'visitant' => 'Real Madrid',
            'data' => '2024-11-19',
            'resultat' => '5-0'
        ]
    ];

    public function index()
    {
        $partits = Session::get('partits', $this->partits);
        return view('partits.index', compact('partits'));
    }

    public function create()
    {
        return view('partits.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'local' => 'required|min:2',
            'visitant' => 'required|min:2|different:local',
            'data' => 'required|date_format:Y-m-d',
            'resultat' => ['nullable', 'regex:/^\d+-\d+$/'],
        ];

        $messages = [
            'visitant.different' => "L'equip visitant no pot ser el mateix que l'equip local.",
            'resultat.regex' => "El format del resultat ha de ser 'GolsLocal-GolsVisitant' (ex: 2-1).",
            'data.date_format' => "La data ha de tenir el format AAAA-MM-DD.",
        ];

        $validated = $request->validate($rules, $messages);

        $partits = Session::get('partits', $this->partits);
        $partits[] = $validated;
        Session::put('partits', $partits);

        return redirect()
            ->route('partits.index')
            ->with('success', 'Partit creat correctament!');
    }
    public function show($id)
    {
            $partits = Session::get('partits', $this->partits);

        if (!isset($partits[$id])) {
            abort(404);
        }
        $partit = $partits[$id];

        return view('partits.store', compact('partit'));
    }
}
?>