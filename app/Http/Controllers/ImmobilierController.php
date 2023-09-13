<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Immobilier;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Ramsey\Uuid\Type\Integer;

class ImmobilierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $immobiliers = Immobilier::join('users', 'users.id', '=', 'immobiliers.user_id')
            ->get([
                'immobiliers.id',
                "immobiliers.type",
                "immobiliers.surface",
                "immobiliers.localisation",
                "immobiliers.description",
                "immobiliers.imageA",
                "immobiliers.imageB",
                "immobiliers.imageC",
                "immobiliers.imageD",
                "immobiliers.imageE",
                'users.name AS user_name',
            ]);
        return view('immobilier.index', compact('immobiliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('immobilier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'localisation' => 'required'
        ]);

        $newImageNameA = time() . '-' . $request->type . '.' . $request->image_a->extension();

        $request->image_a->move(public_path('images'), $newImageNameA);

        $newImageNameB = time() . '-' . $request->type . '.' . $request->image_b->extension();

        $request->image_b->move(public_path('images'), $newImageNameB);

        $newImageNameC = time() . '-' . $request->type . '.' . $request->image_c->extension();

        $request->image_c->move(public_path('images'), $newImageNameC);

        $newImageNameD = time() . '-' . $request->type . '.' . $request->image_d->extension();

        $request->image_d->move(public_path('images'), $newImageNameD);

        $newImageNameE = time() . '-' . $request->type . '.' . $request->image_e->extension();

        $request->image_e->move(public_path('images'), $newImageNameE);


        $immobilier = new Immobilier([
            'type' => $request->get('type'),
            'surface' => $request->get('surface'),
            'description' => $request->get('description'),
            'localisation' => $request->get('localisation'),
            'imageA' => $newImageNameA,
            'imageB' => $newImageNameB,
            'imageC' => $newImageNameC,
            'imageD' => $newImageNameD,
            'imageE' => $newImageNameE,
            // dd(FacadesAuth::user()->id)

        ]);

        $immobilier->user_id = FacadesAuth::user()->id;
        $immobilier->save();
        return redirect('immobiliers')->with('success', 'immobiliers a été enregistré!');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $immobilier = Immobilier::find($id);
        return view('immobilier.edit', compact('immobilier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'type' => 'required',
            'surface' => 'required'
        ]);

        // $newImageNameA = time() . '-' . $request->type . '.' . $request->image->extension();

        // $request->image_a->move(public_path('images'), $newImageNameA);

        // $newImageNameB = time() . '-' . $request->type . '.' . $request->image->extension();

        // $request->image_b->move(public_path('images'), $newImageNameB);

        // $newImageNameC = time() . '-' . $request->type . '.' . $request->image->extension();

        // $request->image_c->move(public_path('images'), $newImageNameC);

        // $newImageNameD = time() . '-' . $request->type . '.' . $request->image->extension();

        // $request->image_d->move(public_path('images'), $newImageNameD);

        // $newImageNameE = time() . '-' . $request->type . '.' . $request->image->extension();

        // $request->image_e->move(public_path('images'), $newImageNameE);

        $immobilier = Immobilier::find($id);
        $immobilier->type = $request->get('type');
        $immobilier->surface = $request->get('surface');
        $immobilier->description = $request->get('description');
        $immobilier->localisation  = $request->get('localisation');
        // $immobilier->imageA = $newImageNameA;
        // $immobilier->imageB = $newImageNameB;
        // $immobilier->imageC = $newImageNameC;
        // $immobilier->imageD = $newImageNameD;
        // $immobilier->imageE = $newImageNameE;
        $immobilier->save();
        return redirect('immobiliers')->with('success', 'Le Immobilier a été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $immobilier = Immobilier::find($id);
        $immobilier->delete();
        return redirect('immobiliers')->with('success', 'immobilier a été supprimé!');
    }
}