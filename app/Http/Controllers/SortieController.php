<?php

namespace App\Http\Controllers;

use App\Http\Requests\SortieStoreRequest;
use Illuminate\Http\Request;
use App\Models\sortie;
use App\Models\medicament;
use App\Models\appro;
use App\Models\prescription;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SortieController extends Controller
{
    public function index(Request $request)
    {
       $showSorties=sortie::join('prescriptions','prescriptions.id','=','sorties.prescription_id')
                           ->join('medicaments','prescriptions.medicament_id','=','medicaments.id')
                           ->join('patients','prescriptions.num_fiche','=','patients.num_fiche')
                           ->join('medecins','prescriptions.matricule_medecin','=','medecins.matricule_medecin')

                           ->get(['sorties.id','sorties.prescription_id','sorties.qty_sortie','sorties.date_sortie',
                                  'prescriptions.qty_med_presc','medicaments.denomination','patients.nom_patient',
                                   'medecins.nom_medecin','date_prescr','sorties.id_med_sous','prescriptions.statut']); 

                                   if($request->has('search')){
                                    $showSorties=sortie::join('prescriptions','prescriptions.id','=','sorties.prescription_id')
                                                       ->join('medicaments','prescriptions.medicament_id','=','medicaments.id')
                                                       ->join('patients','prescriptions.num_fiche','=','patients.num_fiche')
                                                       ->join('medecins','prescriptions.matricule_medecin','=','medecins.matricule_medecin')
                                                      

                                    ->where('medicaments.denomination','like',"%{$request->search}%")
                              
                                    ->orWhere('prescriptions.qty_med_presc','like',"%{$request->search}%")
                                    ->orWhere('patients.nom_patient','like',"%{$request->search}%")
                                    ->orWhere('medecins.nom_medecin','like',"%{$request->search}%")
                                    ->orWhere('sorties.qty_sortie','like',"%{$request->search}%")
                                    ->get();
                                   }
        
       
       return view('sortie.index',compact('showSorties'));     

    }

    public function create(prescription $prescription)
    {
          
      $nomPatient=prescription::join('patients','prescriptions.num_fiche','=','patients.num_fiche')
                                 ->get(['patients.nom_patient']);

      $denomination=medicament::all();
      
      return view('sortie.create',compact('prescription'),['denomination'=>$denomination] );
    
          
    }

    public function store(SortieStoreRequest $request)
    {
        
        $this->validate($request,[
          'prescription_id' => 'required|unique:sorties'
        ]);

         $medicament_id= $request->input('medicament_id');
         $qty_sortie= $request->qty_sortie;
         $prescription_id= $request->prescription_id;
         $qty_med_presc=  $request->qty_med_presc;
         
         // La variable contient la requete qui recupere la valeur du stock de l'id concerné dans la table Medicament
         $medStock=DB::table('medicaments')->where('id',  $medicament_id)->value('stock');
        
         if ($request->qty_sortie > $qty_med_presc){
               
            Session::flash('error', 'La quantité de ce medicmant n\'est pas disponible');
            return redirect()->route('prescription.edit',$prescription_id)->with('message', 'Introduire une quantité inferieure ou égale à celle prescrite: '.$qty_med_presc.' !');
         }
         
         // Si la quantité demandée est superieure à la quantité disponible
        if ($request->qty_sortie > $medStock){
               
               Session::flash('error', 'La quantité de ce medicmant n\'est pas disponible');
               return redirect()->route('prescription.edit',$prescription_id)->with('message', 'La quantité disponible est '. $medStock. ' !!!');
         }  

          sortie::create([

                 'prescription_id'=>$prescription_id,
                 'id_med_sous'=>$medicament_id,
                 'qty_sortie'=>$qty_sortie,
                 'date_sortie'=>$request->date_sortie,
                 'qty_med_presc'=> $qty_med_presc
        
                 ]);

              //Mettre à jour la valeur du stock de la table medicament (Retrancher en cas de sortie)
               DB::table('medicaments')->where('id', $medicament_id)->update(['stock' =>$medStock - $request->qty_sortie]);

               //Mettre à jour la valeur du statut de la table prescription
               DB::table('prescriptions')->where('id', $prescription_id)->update(['statut'=>'Servi']);

               return redirect()->route('sortie.index')->with('message', 'Reussi');
          
    }
     
    public function edit(sortie $sortie)
    {
       
    }

   

    public function update( SortieStoreRequest $request, sortie $sortie)
    {
        // $produits->update (['denomination' => $request->denomination ] );  
        
        $sortie->update($request->validated());

        return redirect()->route('sortie.index')->with('message','Mise à jour réussie');
    } 

 
}
