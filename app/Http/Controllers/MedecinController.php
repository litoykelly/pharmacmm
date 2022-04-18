<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedecinStoreRequest;
use App\Models\medecin;
use Illuminate\Http\Request;

class MedecinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showMedecins= medecin::all();
        return view('medecin.index',compact('showMedecins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medecin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (MedecinStoreRequest $request)
    {
        
        $this->validate($request,[
            'matricule_medecin' => 'required|unique:medecins'
       ]);

       medecin::create([

               'matricule_medecin'=>$request->matricule_medecin,
               'nom_medecin'=>$request->nom_medecin,
               'grade_medecin'=>$request->grade_medecin,
               'fonction_medecin'=>$request->fonction_medecin
        ]); 

        return redirect()->route('medecin.index')->with('message', 'Reussi');
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
