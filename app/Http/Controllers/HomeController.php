<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Car;
use App\Models\Rente;

use Illuminate\Support\Facades\Auth;


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
        //$cars = DB::table('cars')->get();
        //$cars = Car::all();
        //$freecars = CAR::table('cars')

       /* $freecars = DB::table('cars')
             ->select(Car::raw('count(*)'))
             ->where('isout', '=', 0)
             ->get();
*/
             $freecars = DB::table('cars')->where('isout', '=', 0)->Where('isactive', '=', 1)->get();
            //SELECT * FROM rentes INNER JOIN cars ON rentes.car_id=cars.id WHERE vrnjen_dne IS NULL and cars.isout=1 ORDER BY rentes.id DESC LIMIT 1
             /*$usedcars = DB::table('cars')
             ->join('rentes', 'cars.id', '=', 'rentes.car_id', 'left outer')
             ->where('isout', '=', 1)->where('isactive', '=', 1)->whereNULL('vrnjen_dne')->orderBy('rentes.id')->limit(1)->get();
*/
             //SELECT * FROM cars INNER JOIN rentes  ON rentes.id = (SELECT id FROM rentes WHERE rentes.car_id = cars.id ORDER BY id DESC LIMIT 1)  - tale bo pravi!!! še isout=1!!!

            
 

$usedcars = DB::table(DB::raw('cars INNER JOIN rentes  ON rentes.id = (SELECT id FROM rentes WHERE rentes.car_id = cars.id AND cars.isout=1 ORDER BY id DESC LIMIT 1) INNER JOIN users ON rentes.user_id = users.id ORDER BY rentes.najem_do'))
            ->get();
            
            
                    
             
           

      

       if(Auth::user()->isactivated) {
            return view('home', ['freecars' => $freecars], ['usedcars' => $usedcars]);
       } else {
            return view('welcome');
       }
    }
}
