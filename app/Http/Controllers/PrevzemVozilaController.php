<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrevzemVozilaController extends Controller
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

           
                //update rente (nastavi vrnjen dne)
                $affected0 = DB::update(
                    'update rentes set vrnjen_dne = now() where car_id='.$_GET['id']." ORDER BY id DESC LIMIT 1"
                );

            
                //update cars (nastavi isout na 0)
                $affected = DB::update(
                    'update cars set isout = 0 where id = '.$_GET['id']
                );
            
                
            return view('prevzem.prevzemvozila');
        } else {
            return view('welcome');
        }
    }
}
