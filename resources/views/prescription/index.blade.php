@extends ('layouts.main')

@section('content')

     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> ORDONNANCE MEDICALE </h1>
    </div>
    
<div class="row">
     <div class="card mx-auto">

                <div> 
                   @if (session()->has('message'))
                      <div class="alert alert-success">
                         {{session('message')}}
                     </div>
                   @endif
                </div>

         <div class="card-header">
            <div class="row">
                <div class="col">
                  <form method="GET" action="{{route('prescription.index')}}">
                       <div class="form-row align-items-center">
                          <div class="col">
                             <input type="search"  name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Search">
                          </div>
                          <div class="col">
                              <button type="submit" class="btn btn-primary mb-2"> Search </button>
                          </div>
                       </div>
                  </form>
             </div>
             <div>
               <a href="{{route('prescription.create')}}"  class="btn btn-primary mb-2" class="float-rigth"> Create</a>
             </div>
         </div>
      </div>

    <div class="card-body">
    <table class="table">
           <thead>
              <tr>
                  <th scope="col">#Id</th>
                  <th scope="col">Medecin</th>
                  <th scope="col">Service</th>
                  <th scope="col">Nom Patient</th>
                  <th scope="col">Age</th>
                  <th scope="col">Sexe</th>
                  <th scope="col">Societé</th>
                  <th scope="col">Médicament</th>
                  <th scope="col">Quantité</th>
                  <th scope="col">Date Prescr.</th>

                  <th scope="col">Actions</th>
                  <th scope="col">Statut</th>
              </tr>
           </thead>
           <tbody>
             @foreach ($showPrescriptions as $showPrescription )
               <tr>
                 <th scope="row">{{$showPrescription->id}}</th>
                 <td>{{$showPrescription->nom_medecin}}</td>
                 <td>{{$showPrescription->service}}</td>
                 <td>{{$showPrescription->nom_patient}}</td>
                 <td>{{$showPrescription->age_patient}} Ans</td>
                 <td>{{$showPrescription->sexe_patient}}</td>
                 <td>{{$showPrescription->nom_societe}} {{$showPrescription->province_societe}} </td>
                 <td>{{$showPrescription->denomination}}</td>
                 <td>{{$showPrescription->qty_med_presc}}</td>
                 <td>{{$showPrescription->date_prescr}}</td>

                 <td>
                    <a href="{{route('prescription.edit',$showPrescription->id)}}" class="btn btn-success"> Servir </a>
                 </td>
                 <td>{{$showPrescription->statut}}</td>
              </tr>  
             @endforeach
          </tbody>
      </table>
  </div>
  </div>
    

@endsection