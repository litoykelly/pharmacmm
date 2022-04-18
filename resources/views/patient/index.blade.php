@extends ('layouts.main')

@section('content')

     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Registre Patients </h1>
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
                  <form method="GET" action="{{route('patient.index')}}">
                       <div class="form-row align-items-center">
                          <div class="col">
                             <input type="search"  name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Patient">
                          </div>

                          <div class="col">
                              <button type="submit" class="btn btn-primary mb-2"> Rechercher </button>
                          </div>
                       </div>
                  </form>
             </div>
             
             <div>
               <a href="{{route('patient.create')}}"  class="btn btn-primary mb-2" class="float-rigth"> Ajouter</a>
             </div>
         </div>
      </div>

    <div class="card-body">
    <table class="table">
           <thead>
              <tr>
                  <th scope="col">#Id</th>
                  <th scope="col">Num. Fiche</th> 
                  <th scope="col">Société</th>
                  <th scope="col">Catégorie</th>
                  <th scope="col">Nom Patient</th>
                  <th scope="col">Age Patient</th>
                  <th scope="col">Sexe Patient</th>
                  <th scope="col">Manage</th>
                 
              </tr>
           </thead>

           <tbody>
              @foreach ($showPatients as $showPatient)
               <tr>
                 <th scope="row">{{$showPatient->id}}</th>
                 <td>{{$showPatient->num_fiche}}</td> 
                 <td>{{$showPatient->nom_societe}}</td>
                 <td>{{$showPatient->cat_patient}}</td>
                 <td>{{$showPatient->nom_patient}}</td>
                 <td>{{$showPatient->age_patient}} Ans</td>
                 <td>{{$showPatient->sexe_patient}}</td>
                 <td> 
                  <a href="" class="btn btn-success"> Modifier </a>
                    {{-- <a href="" class="btn btn-danger"> Suppimer </a>                   --}}
                 </td>
              </tr>  
              @endforeach
          </tbody>
      </table>
  </div>
  </div>
    

@endsection