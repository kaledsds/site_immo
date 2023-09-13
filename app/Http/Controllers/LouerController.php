<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Louer;
use App\Models\Immobilier;

class louercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $louers = Louer::join('immobiliers', 'immobiliers.id', '=', 'louers.immobilier_id')
            ->get([
                'louers.id',
                'louers.prix',
                'immobiliers.localisation AS immobilier_localisation',
            ]);
        return view('louer.index', compact('louers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $immobiliers = Immobilier::all();
        return view('louer.create', compact('immobiliers'));
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

        // dd($request->getImmobilier);
        $louer = new Louer([
            'immobilier_id' => $request->getImmobilier,
            'prix' => $request->get('prix'),
        ]);
        $louer->save();
        return redirect('louers')->with('success', 'louers a été enregistré!');
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
        $louer = Louer::find($id);
        return view('louer.edit', compact('louer', 'immobiliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $louer = louer::find($id);
        $louer->prix = $request->get('prix');
        $louer->immobilier_id = $request->get('getImmobilier');
        $louer->save();
        return redirect('louers')->with('success', 'Le louer a été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $louer = Louer::find($id);
        $louer->delete();
        return redirect('louers')->with('success', 'louer a été supprimé!');
    }
}