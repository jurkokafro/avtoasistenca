<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Car;

use Illuminate\Support\Facades\Auth;


class IzbrisVozilaController extends Controller
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
           
            //prikazi seznam vseh avtomobilov
            $allcars = DB::table('cars')->WHERE('isactive', '1')->get();
            
            return view('izbris.izbrisavtomobila', ['allcars' => $allcars]);
        } else {
            return view('welcome');
        }
    }

    public function delete() {
       
        if(Auth::user()->isactivated) {
            $affected = DB::update(
                'update cars set isactive = 0 where id = '.$_GET['id']
            );

            return view('izbris.izbrisavtomobila_delete', ['affected' => $affected]);
        } else {
            return view('welcome');
        }
    }

}
