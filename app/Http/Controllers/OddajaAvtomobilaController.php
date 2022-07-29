<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Car;

use Illuminate\Support\Facades\Auth;

class OddajaAvtomobilaController extends Controller
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
   /* public function index()
    {
        $freecars = DB::table('cars')->where('isout', '=', 0)->Where('isactive', '=', 1)->get();

        return view('oddajaavtomobila', ['freecars' => $freecars]);
    }*/

    //Vrne seznam vseh prostih vozil iz baze in prikaze oddaja-vozila landing
    public function show() {

        if(Auth::user()->isactivated) {
           
       
            $freecars = DB::table('cars')->where('isout', '=', 0)->Where('isactive', '=', 1)->get();
            
            return view('oddajaavtomobila', ['freecars' => $freecars]);
        } else {
            return view('welcome');
        }
    }

    public function create() {
        if(Auth::user()->isactivated) {
            $freecartorent = DB::table('cars')->where('isout', '=', 0)->Where('isactive', '=', 1)->where('id', '=', $_GET['id'])->get();
            return view('oddajaavtomobila_create', ['freecartorent' => $freecartorent]);
        } else {
            return view('welcome');
        }
    }

    public function store() {

        
        if(Auth::user()->isactivated) { 
            $data = request()->validate([
                'car_id' => 'required',
                'najemnik_ime' => 'required',
                'najemnik_priimek' => 'required',
                'najemnik_naslov' => 'required',
                'najemnik_email' => 'required|email',
                'najemnik_telefon' => 'required',
                'gorivo' => 'required',
                'najem_od' => 'required',
                'najem_do' => 'required',
                'vrnjen_dne' => ''
            ]);

            // obicen save - \App\Models\Rente::create($data);

            //Save through the relationship
            auth()->user()->rente()->create($data);

            //update cars - set isout na 1 za doticni avto
            $affected = DB::update(
                'update cars set isout = 1 where id = '.$data['car_id']
            );

            //vrnemo, da je bilo uspesno dodano v bazo
            return view('oddajaavtomobila_success', ['data' => $data]);
        } else {
            return view('welcome');
        }

    }
}
