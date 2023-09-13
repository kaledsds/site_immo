<?php

namespace App\Http\Controllers;

use App\Models\Immobilier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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
        return view('home', compact('immobiliers'));
    }
}