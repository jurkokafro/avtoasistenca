<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Rente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PregledIzposojController extends Controller
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
        
        if(Auth::user()->isactivated) { 
            $pregledizposoj = Rente::orderBy('id', 'DESC')->get();
            
            return view('pregled.pregledizposoj', ['seznamizposoj' => $pregledizposoj]);
        } else {
            return view('welcome');
        }
    }
}
