<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;
use App\Models\societe;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'num_fiche' => ['required', 'integer','unique:patient'],
            'cat_patient' => ['required', 'string', 'unique:patient'],
            'societe_id' => ['required', 'integer'],
            'nom_patient' => ['required', 'string'],
            'age_patient' => ['required', 'string'],
            'sexe_patient' => ['required', 'char', 'min:1']
        ]);
    }
   

     public function index()
    {
        $showPatients=patient::join('societes','societes.id','=','patients.societe_id')
                             ->get(['patients.id','patients.num_fiche','societes.nom_societe','patients.cat_patient','patients.nom_patient',
                                    'patients.age_patient','patients.sexe_patient']);

        return view('patient.index',compact('showPatients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nomSociete=societe::all();
        return view('patient.create',['nomSociete'=>$nomSociete]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
                  'num_fiche' => 'required|unique:patients'
             ]);
        
        $societe_id = $request->input('societe_id');
            
        patient::create([

               'num_fiche'=>$request->num_fiche,
               'cat_patient'=>$request->cat_patient,
               'societe_id'=>$societe_id,
               'nom_patient'=>$request->nom_patient,
               'age_patient'=>$request->age_patient,
               'sexe_patient'=>$request->sexe_patient
        ]); 

        return redirect()->route('patient.index')->with('message', 'Reussi');
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
