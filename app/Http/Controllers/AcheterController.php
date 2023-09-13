<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acheter;
use App\Models\Immobilier;

class achetercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acheters = Acheter::join('immobiliers', 'immobiliers.id', '=', 'acheters.immobilier_id')
            ->get([
                'acheters.id',
                'acheters.prix',
                'immobiliers.localisation AS immobilier_localisation',
            ]);
        return view('acheter.index', compact('acheters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $immobiliers = Immobilier::all();
        return view('acheter.create', compact('immobiliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'prix' => 'required',
            'getImmobilier' => 'required'
        ]);

        $acheter = new Acheter([
            'prix' => $request->get('prix'),
            'immobilier_id' => $request->get('getImmobilier'),
        ]);
        $acheter->save();
        return redirect('acheters')->with('success', 'acheters a été enregistré!');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $immobiliers = Immobilier::all();
        $acheter = Acheter::find($id);
        return view('acheter.edit', compact('acheter', 'immobiliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $acheter = Acheter::find($id);
        $acheter->prix = $request->get('prix');
        $acheter->immobilier_id = $request->get('getImmobilier');
        $acheter->save();
        return redirect('acheters')->with('success', 'Le acheter a été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $acheter = Acheter::find($id);
        $acheter->delete();
        return redirect('acheters')->with('success', 'acheter a été supprimé!');
    }
}