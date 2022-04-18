<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Update;
use App\Http\Controllers\destroy;
use App\Http\Controllers\EntreeController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\SortieController;
use App\Http\Controllers\stockController;

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

Route::get('/', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class);
Route::resource('produits', ProduitController::class);
Route::resource('entree', EntreeController::class);
Route::resource('sortie', SortieController::class);
Route::resource('stock', stockController::class);
Route::resource('fournisseur', FournisseurController::class);
Route::resource('patient', PatientController::class);
Route::resource('societe', SocieteController::class);
Route::resource('medecin', MedecinController::class);
Route::resource('prescription', PrescriptionController::class);