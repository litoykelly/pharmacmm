<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitStoreRequest;
use App\Models\medicament;
use Illuminate\Http\Request;
use App\Http\Controllers\Update;
use Illuminate\Support\Facades\Session;


class ProduitController extends Controller
{
    public function index(Request $request)
    {
        $produits=medicament::all();

            if($request->has('search')){
               $produits=medicament::where('denomination','like',"%{$request->search}%")
               ->orWhere('id','like',"%{$request->search}%")
               ->orWhere('stock','like',"%{$request->search}%")
               ->get();
              }

        return view('produits.index',compact('produits'));
    }

    public function create()
    {
        return view('produits.create');
    }

    public function store(ProduitStoreRequest $request)
    {
         //medicament::create(['denomination' => $request->denomination]);  
         // medicament::create(['prix_unitaire'=>$request->prix_unitaire]);
         // medicament::create(['stock'=>$request->stock]);
        
         $this->validate($request,[
            'denomination' => 'required|unique:medicaments'
       ]);
       
         medicament::create($request->validated());
        
        return redirect()->route('produits.index')->with('message','Médicament enregistré avec succès');
    }

    public function edit(medicament $produit)
    {
        return view('produits.edit',compact('produit'));
    }

    public function update(ProduitStoreRequest $request, medicament $produit)
    {
        // $produits->update (['denomination' => $request->denomination ] );  
        
        $produit->update($request->validated());

        return redirect()->route('produits.index')->with('message','Mise à jour réussie');
    }

    public function destroy(medicament $produit)
    {
        $produit->delete();
        Session::flash('error', 'Correction');
        return redirect()->route('produits.index')->with('message', 'Suppression reussie !!!');
    }

}
