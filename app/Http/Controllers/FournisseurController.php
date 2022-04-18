<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FournisseurStoreRequest;
use App\Http\Requests\FournissseurStoreRequest;
use App\Models\appro;
use App\Models\medicament;
use App\Models\fournisseur;
use Illuminate\Support\Facades\DB;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Selectionne tout dans la table fournisseur et affiche dans la view index de fournisseur
        $showFournisseurs= fournisseur::all();
        return view('fournisseur.index',compact('showFournisseurs'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fournisseur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FournissseurStoreRequest $request)
    {
               
       fournisseur::create([

               'categorie'=>$request->categorie,
               'nom_fourni'=>$request->nom_fourni,
               'adresse_fourni'=>$request->adresse_fourni,
               'tel_fourni'=>$request->tel_fourni
        ]);
        
       // return redirect()->route('fournisseur.index')->with('message', 'Reussi');
        return redirect()->route('fournisseur.index')->with('message', 'Reussi');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
