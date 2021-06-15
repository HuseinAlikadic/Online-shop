<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobiteliController;
use App\Http\Controllers\DodatneInformacijeController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [ HomeController::class, 'index'])->name('home');
Route::get('/uredzaji/{id}', [MobiteliController::class, 'prikaziUredzaje'])->name('uredzaji');
Route::get('/informacije/{id}', [DodatneInformacijeController::class, 'prikaziInformacije'])->name('informacije');
Route::post('/editInformacije', [DodatneInformacijeController::class, 'editujInformacije'])->name('editArtikla');
Route::get('/admin', [AdminController::class, 'prikazi'])->name('admin');
Route::get('/kategorija', [AdminController::class, 'kategorija'])->name('kategorija');
Route::get('/stanje', [AdminController::class, 'stanje'])->name('stanje');
Route::get('/search', [ HomeController::class, 'pretraziUredzaje'])->name('search');
Route::get('/sviPodaci', [ AdminController::class, 'prikaziSvePodatke'])->name('sviPodaci');
Route::post('/editSvePodatke', [ AdminController::class, 'editujSvePodatke'])->name('editSviPodaci');
Route::post('/editStanjeUredzaja', [ AdminController::class, 'editujStanjeUredzaja'])->name('editStanjeUredzaja');
Route::post('/editKategorijaUredzaja', [ AdminController::class, 'editujKategorijuUredzaja'])->name('editKategorijuUredzaja');
Route::post('/addKategorijaUredzaja', [ AdminController::class, 'dodajKategorijuUredzaja'])->name('addKategorijuUredzaja');
Route::post('/addStanjeUredzaja', [ AdminController::class, 'dodajStanjeUredzaja'])->name('addStanjeUredzaja');
Route::post('/obrisiUredzaj', [ AdminController::class, 'obrisiUredzaje'])->name('obrisiUredzaj');
Route::post('/obrisiKategoriju', [ AdminController::class, 'obrisiKategoriju'])->name('obrisiKategoriju');
Route::post('/dodajUredzaje', [ AdminController::class, 'dodajUredzaj'])->name('dodajUredzaje');
Route::get('/pretrazi', [ HomeController::class, 'pretraziUredzajePoNazivu'])->name('pretrazi');