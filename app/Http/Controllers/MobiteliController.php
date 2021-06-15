<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UredzajiSviAparati;
use App\Models\UtedzajiKategorija;
use App\Models\UtedzajiStanje;

class MobiteliController extends Controller
{
    public function prikaziUredzaje($id){
        
     $sviUredzaji= UredzajiSviAparati::where('kategorija_id',$id)
     ->leftJoin('utedzaji_stanjes','uredzaji_svi_aparatis.stanje_id','=','utedzaji_stanjes.id')
     
     ->select('utedzaji_stanjes.stanje as stanje','uredzaji_svi_aparatis.naziv as naziv','uredzaji_svi_aparatis.cijena as cijena','uredzaji_svi_aparatis.id as uredzajiId')->get();

     

        $nazivKategorije=UtedzajiKategorija::where('id',$id)->value('kategorija');
      
    
        
     return view('/uredzaji/uredzaji_page',['svi_uredzaji'=>$sviUredzaji,'nazivKategorije'=>$nazivKategorije ]);
    }
}