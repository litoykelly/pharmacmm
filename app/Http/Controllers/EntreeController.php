<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EntreeStoreRequest;
use App\Models\appro;
use App\Models\medicament;
use App\Models\fournisseur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class EntreeController extends Controller
{
    public function index(Request $request)
    {
        $showEntrees=appro::join('medicaments','medicaments.id','=','appros.medicament_id')
                           ->get(['appros.id','medicaments.denomination','appros.qty_ee','appros.num_lot',
                           'appros.date_exp','appros.date_appro']);
       
                           if($request->has('search')){
                            $showEntrees=appro::join('medicaments','medicaments.id','=','appros.medicament_id')
                            ->where('medicaments.denomination','like',"%{$request->search}%")
                            ->orWhere('appros.qty_ee','like',"%{$request->search}%")
                            ->orWhere('num_lot','like',"%{$request->search}%")
                            ->orWhere('appros.date_exp','like',"%{$request->search}%")
                            ->orWhere('appros.date_appro','like',"%{$request->search}%")
                            ->orWhere('appros.id','like',"%{$request->search}%")
                            ->get();
                           }

        return view('entree.index',compact('showEntrees'));

    }

    public function create()
    {

        // Affiche dans combobox

         $denomination=medicament::all();
         $nomFourni=fournisseur::all();
         
         return view('entree.create',['nomFourni'=>$nomFourni],['denomination'=>$denomination]);
    }

    public function store(EntreeStoreRequest $request)
    {
         //medicament::create(['denomination' => $request->denomination]); 
        //  entree::create($request->validated())
         $medicament_id=$request->input('medicament_id');
         $fournisseur_id=$request->input('fournisseur_id');
         //$date_exp=$request->input('date_exp');
         
        appro::create([

                'medicament_id'=>$medicament_id,
                'fournisseur_id'=>$fournisseur_id,
                'num_lot'=>$request->num_lot,
                'date_exp'=>$request->date_exp,
                'qty_ee'=>$request->qty_ee,
                'date_appro'=>$request->date_appro
         ]); 

         //Mettre à jour la valeur du stock de la table medicament (Ajouter)

         $medStock=DB::table('medicaments')->where('id',  $medicament_id)->value('stock');
         DB::table('medicaments')->where('id', $medicament_id)->update(['stock' =>$medStock + $request->qty_ee]);

         return redirect()->route('entree.index')->with('message', 'Reussi');

    }

    public function edit(appro $entree)
    {

        // Affiche dans combobox
         $denomination=medicament::all();
         
         return view('entree.edit',compact('entree'),['denomination'=>$denomination]);
    }

    public function update(Request $request, appro $entree)
    {
        // $produits->update (['denomination' => $request->denomination ] );  
        //$appro->update($request->validated());

        $medicament_id=$request->input('medicament_id');

        $entree->update (
        [
            'medicament_id'=>$medicament_id,
            'fournisseur_id'=>$request->fournisseur_id,
            'num_lot'=>$request->num_lot,
            'date_exp'=>$request->date_exp,
            'qty_ee'=>$request->qty_ee,
            'date_appro'=>$request->date_appro
            
        ] );

        return redirect()->route('entree.index')->with('message','Mise à jour réussie');
    }

    public function destroy(appro $entree)
    {   
     
    /*   $medicament_id=DB::table('appro')->get('medicament_id);
    $medStock=DB::table('medicaments')->where('id',  $entree->medicament_id)->value('stock');
     DB::table('medicaments')->where('id', $entree->id)->update(['stock' =>$medStock - $entree->qty_ee]);
     return redirect()->route('entree.index')->with('message','Suppression effectuée');   */
    
    $entree->delete();
    Session::flash('error', 'Correction');
    //return redirect()->route('entree.index')->with('message', 'Veiller retrancher la valeur supprimée de la valeur du Stock !!!');
    //return redirect()->route('entree.show',$entree->id)->with('message', 'Veiller retrancher la valeur supprimée de la valeur du Stock !!!');
    return view('entree.delete');
}

    public function show()
    {
        
    }

       }
   
   
    

 




