<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Car;

class DodajVoziloController extends Controller
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

    //Prikaze formo za vnos novega vozila v bazo
    public function show() {
        
        return view('dodaj.dodajvozilo');
    }

    public function store() {

        $data = request()->validate([
            'znamka' => 'required',
            'model' => 'required',
            'registracija' => 'required'
        ]);

        // obicen save - \App\Models\Rente::create($data);

        //Save through the relationship
        auth()->user()->cars()->create($data);

        //vrnemo, da je bilo uspesno dodano v bazo
        return view('dodaj.dodajvozilo_store');

    }

    public function create() {
        return view('dodaj.dodajvozilo_show');
    }

}
