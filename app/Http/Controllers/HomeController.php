<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UredzajiSviAparati;
use App\Models\UtedzajiKategorija;
use App\Models\UtedzajiStanje;


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
        $sviUredzaji= UredzajiSviAparati::all();
        $uredjajiKategorije=UtedzajiKategorija::all();
        return view('home',['stringSviUredjaji'=> $sviUredzaji, 'kategorijeUredzaja'=> $uredjajiKategorije]);
    }

    public function pretraziUredzaje(){
        $sviUredzaji= UredzajiSviAparati::select('id as uredzajiId', 'naziv as naziv', 'cijena as cijena') 
        ->get();
        
        
        return view('/search/search',['sviUredzaji'=>$sviUredzaji]);
    }

    public function pretraziUredzajePoNazivu(Request $request){
       
        $nazivUredzaja=$request->get('naziv');
        $pretrazi= UredzajiSviAparati::where('naziv', 'like', '%'.$nazivUredzaja. '%')->get();
       
        return view('/search/search_uredzaji',['pretrazi'=>$pretrazi]);
        
    }
    
  
}