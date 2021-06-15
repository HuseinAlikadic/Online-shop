<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UredzajiSviAparati;
use App\Models\UtedzajiKategorija;
use App\Models\UtedzajiStanje;

class AdminController extends Controller
{
    public function prikazi(){
       
        

        return view('admin/admin_show');
    }

    public function kategorija(){
        $kategorija=UtedzajiKategorija::all();
        
        return view('admin/admin_kategorija',['kategorija'=>$kategorija]);
    }

    public function stanje(){
       $stanjeUredzaja=UtedzajiStanje::all();

        return view('admin/admin_stanje',['stanjeUredzaja'=>$stanjeUredzaja]);
    }

    public function prikaziSvePodatke(){
       

        $sviPodaci=UredzajiSviAparati::join('utedzaji_kategorijas','utedzaji_kategorijas.id','=','uredzaji_svi_aparatis.kategorija_id')
        ->join('utedzaji_stanjes','utedzaji_stanjes.id','=','uredzaji_svi_aparatis.stanje_id')  
        ->select('uredzaji_svi_aparatis.id as id',
            'uredzaji_svi_aparatis.naziv as naziv',
        'uredzaji_svi_aparatis.kategorija_id as kategorija_id',
        'utedzaji_kategorijas.kategorija as kategorija',
        'uredzaji_svi_aparatis.stanje_id as stanje_id',
        'utedzaji_stanjes.stanje as stanje',
        'uredzaji_svi_aparatis.opis as opis',
        'uredzaji_svi_aparatis.cijena as cijena')
        ->get();

        $kategorijaArray=UtedzajiKategorija::all();
        $stanjeArray=UtedzajiStanje::all();

        return view('admin/admin_svi_podaci',['sviPodaci'=>$sviPodaci,'kategorijaArray'=>$kategorijaArray,'stanjeArray'=>$stanjeArray]);
    }

    public function editujSvePodatke(Request $request){
        $idOfEdit=$request->input('id');
        $editInformacijeOproizvodima=UredzajiSviAparati::find($idOfEdit);
        $editInformacijeOproizvodima->naziv=$request->input('naziv');
        $editInformacijeOproizvodima->kategorija_id=$request->input('kategorija_id');
        $editInformacijeOproizvodima->stanje_id=$request->input('stanje_id');
        $editInformacijeOproizvodima->cijena=$request->input('cijena');
        $editInformacijeOproizvodima->opis=$request->input('opis');
        
        $editInformacijeOproizvodima->save();
        
        return redirect()->route('sviPodaci');
    }

    public function editujStanjeUredzaja(Request $request){
        $idOfStanja=$request->input('id');
        $editStanjeuredzaja=UtedzajiStanje::find($idOfStanja);
        $editStanjeuredzaja->stanje=$request->input('stanje');
        $editStanjeuredzaja->save();
      
        return redirect()->route('stanje');
    }

    public function editujKategorijuUredzaja(Request $request){
      $idKategorije=$request->input('id');
      $editKategorijeUredzaja= UtedzajiKategorija::find($idKategorije);   
      $editKategorijeUredzaja->kategorija=$request->input('kategorija');
      $editKategorijeUredzaja->save();
      
        return redirect()->route('kategorija');        
    }

    public function dodajKategorijuUredzaja(Request $request){
       
       
        $validated = $request->validate([
            'kategorija' => 'required',
           
        ]);
       
            $dodajKategoriju= new UtedzajiKategorija;
            $dodajKategoriju->kategorija=$request->kategorija;
            $dodajKategoriju->save();
            
            return redirect('kategorija')->with('success','dodali ste novu kategoriju');   
        
       
    }

    public function dodajStanjeUredzaja(Request $request){
        $dodajStanje=new UtedzajiStanje;
        $dodajStanje->stanje=$request->stanje;
        $dodajStanje->save();
       
        return redirect()->route('stanje');
    }

    public function obrisiUredzaje(Request $request){
        $id=$request->get('id');
        $nazivUredzaja=UredzajiSviAparati::where('id',$id)->value('naziv');
        UredzajiSviAparati::where('id',$id)
        ->delete();
        
        return redirect('sviPodaci')->with('uspijesno','Uspiješno ste obrisali uredzaj '.$nazivUredzaja) ;
    }

    public function obrisiKategoriju(Request $request){
        $id=$request->get('id');

        $kategorijeUuredzajima=UredzajiSviAparati::where('kategorija_id',$id)->get();
        if(count($kategorijeUuredzajima)>0){
            $poruka='kategorija se koristi u uredzajima, ne moze biti obrisana.';
            $poruka_tip='upozorenje';
        }else{
            UtedzajiKategorija::where('id',$id)->delete();
            $poruka='Uspješno ste obrisali kategoriju';
            $poruka_tip='uspijesno';
        }

        return redirect('kategorija')->with($poruka_tip,$poruka);
    }

    public function dodajUredzaj(Request $request){
        $dodajUredzaj= new UredzajiSviAparati;
        $dodajUredzaj->naziv=$request->naziv;
        $dodajUredzaj->kategorija_id=$request->kategorija_id;
        $dodajUredzaj->stanje_id=$request->stanje_id;
        $dodajUredzaj->opis=$request->opis;
        $dodajUredzaj->cijena=$request->cijena;
        $dodajUredzaj->save();

        return redirect('sviPodaci');
    }
}