<?php

namespace App\Http\Controllers;

use App\Models\medecin;
use App\Models\medicament;
use App\Models\patient;
use App\Models\prescription;
use App\Models\sortie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $showPrescriptions=prescription:: join('medicaments','prescriptions.medicament_id','=','medicaments.id')
                                       ->join('medecins','prescriptions.matricule_medecin','=','medecins.matricule_medecin')
                                       ->join('patients','prescriptions.num_fiche','=','patients.num_fiche')
                                       ->join('societes','patients.societe_id','=','societes.id')
                                       ->get(['prescriptions.id','prescriptions.date_prescr','prescriptions.service','prescriptions.qty_med_presc',
                                               'medicaments.denomination','medecins.nom_medecin','prescriptions.num_fiche',
                                               'patients.sexe_patient','patients.nom_patient','patients.cat_patient','patients.age_patient','patients.sexe_patient',
                                               'societes.nom_societe', 'societes.province_societe','prescriptions.statut' ]);
                                               
             if($request->has('search')){
             $showPrescriptions=prescription:: join('medicaments','prescriptions.medicament_id','=','medicaments.id')
                                             ->join('medecins','prescriptions.matricule_medecin','=','medecins.matricule_medecin')
                                             ->join('patients','prescriptions.num_fiche','=','patients.num_fiche')
                                             ->join('societes','patients.societe_id','=','societes.id')

                                             ->where('prescriptions.id','like',"%{$request->search}%")
                                             ->orWhere('prescriptions.date_prescr','like',"%{$request->search}%")
                                             ->orWhere('medecins.nom_medecin','like',"%{$request->search}%")
                                             ->orWhere('patients.nom_patient','like',"%{$request->search}%")
                                             ->orWhere('prescriptions.service','like',"%{$request->search}%")
                                             ->orWhere('societes.nom_societe','like',"%{$request->search}%")
                                             ->orWhere('societes.province_societe','like',"%{$request->search}%")
                                             ->orWhere('prescriptions.qty_med_presc','like',"%{$request->search}%")
                                             ->orWhere('medicaments.denomination','like',"%{$request->search}%")
                                             ->orWhere('patients.age_patient','like',"%{$request->search}%")
                                             ->orWhere('patients.sexe_patient','like',"%{$request->search}%")
                                             ->get();
                                               }
                      
                            return view('prescription.index',compact('showPrescriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nomPatient=patient::all();
        $nomMedecin=medecin::all();
        $denomination=medicament::all();
        
        return view('prescription.create',['nomPatient'=>$nomPatient],['denomination'=>$denomination]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
                $medicament_id=$request->input('medicament_id');
                $numFiche=$request->input('num_fiche');  
                  
      
        prescription::create([
                
                'medicament_id'=> $medicament_id,
                'num_fiche' => $numFiche,
                'matricule_medecin'=> $request->matricule_medecin,
                'service'=> $request->service,
                'qty_med_presc' => $request->qty_med_presc,
                'date_prescr' => $request->date_prescr,
               
         ]); 

        return redirect()->route('prescription.index')->with('message', 'Reussi');
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
    public function edit(prescription $prescription)
    {
      
        $nomPatient=prescription::join('patients','prescriptions.num_fiche','=','patients.num_fiche')
                                 ->get(['patients.nom_patient']);
        $nomMedecin=medecin::all();
        $denomination=medicament::all();
      
        return view('prescription.edit',compact('prescription'),['denomination'=>$denomination] );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
       
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
