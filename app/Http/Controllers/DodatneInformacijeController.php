<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UredzajiSviAparati;
use App\Models\UtedzajiKategorija;
use App\Models\UtedzajiStanje;

class DodatneInformacijeController extends Controller
{
    public function prikaziInformacije($id){

        $dodatne_informacije=UredzajiSviAparati::join('utedzaji_kategorijas','uredzaji_svi_aparatis.kategorija_id','=','utedzaji_kategorijas.id')
        ->join('utedzaji_stanjes', 'utedzaji_stanjes.id','=','uredzaji_svi_aparatis.stanje_id')
        ->where('uredzaji_svi_aparatis.id','=', $id)
        ->select('uredzaji_svi_aparatis.id as idUredzaji',
        'uredzaji_svi_aparatis.naziv as naziv', 
        'utedzaji_kategorijas.kategorija as kategorija',
        'uredzaji_svi_aparatis.kategorija_id as id_karegorija',
        'utedzaji_stanjes.stanje as stanje',
        'uredzaji_svi_aparatis.stanje_id as id_stanje',
        'uredzaji_svi_aparatis.cijena as cijena',
        'uredzaji_svi_aparatis.opis as opis' )
        ->first();
     $uredzajiStanje=UtedzajiStanje::all();
     $uredzajiKategorija=UtedzajiKategorija::all();

        return view( 'uredzaji/dodatne_informacije',['dodatne_informacije'=>$dodatne_informacije,'uredzajiStanje'=>$uredzajiStanje,'uredzajiKategorija'=>$uredzajiKategorija]);
    }

    public function editujInformacije(Request $request){
      
        $idEdit=$request->input('id');
        $editovaniPodaci=UredzajiSviAparati::find($idEdit);
        $editovaniPodaci->naziv=$request->input('naziv');
        $editovaniPodaci-> kategorija_id=$request->input('kategorija_id');
        $editovaniPodaci->stanje_id=$request->input('stanje_id');
        $editovaniPodaci->cijena=$request->input('cijena');
        $editovaniPodaci->opis=$request->input('opis');
        $editovaniPodaci->save();
        

        return redirect()->route('informacije', $idEdit);
    }
}