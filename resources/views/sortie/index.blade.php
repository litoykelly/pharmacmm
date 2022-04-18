@extends ('layouts.main')

@section('content')

     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Médicaments Sortis du Stock </h1>
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
                  <form method="GET" action="{{route('sortie.index')}}">
                       <div class="form-row align-items-center">
                          <div class="col">
                             <input type="search"  name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Paracetamol">
                          </div>
                          <div class="col">
                              <button type="submit" class="btn btn-primary mb-2"> Rechercher </button>
                          </div>
                       </div>
                  </form>
             </div>

             <div>
               <a href="{{route('prescription.index')}}"  class="btn btn-primary mb-2" class="float-rigth"> Ajouter</a>
             </div>

         </div>
      </div>

    <div class="card-body">
    <table class="table">
           <thead>
              <tr>
                  <th scope="col">#Id</th>
                  <th scope="col">Ord.</th>
                  <th scope="col">Patient</th>
                  <th scope="col">Medecin</th>
                  <th scope="col">Date presc.</th>
                  <th scope="col">Médicaments</th>
                  <th scope="col">Qté presc.</th>
                  <th scope="col">Qté sortie</th>
                  <th scope="col">Date Livr.</th>
                  

                  <th scope="col">Menage</th>
              </tr>
           </thead>
           <tbody>
              @foreach ($showSorties as $showSortie )
               <tr>
                 <th scope="row">{{$showSortie->id}}</th>
                 <td>{{$showSortie->prescription_id}}</td>
                 <td>{{$showSortie->nom_patient}}</td>
                 <td>{{$showSortie->nom_medecin}}</td>
                 <td>{{$showSortie->date_prescr}}</td>
                 <td>{{$showSortie->denomination}}</td>
                 <td>{{$showSortie->qty_med_presc}}</td>
                 <td>{{$showSortie->qty_sortie}}</td>
                 <td>{{$showSortie->date_sortie}}</td>

                 <td>
                    <a href="" class="btn btn-success"> Modifier </a>
                    <a href="" class="btn btn-danger"> Supprimer </a>
                 </td>
              </tr>  
              @endforeach
          </tbody>
      </table>
  </div>
  </div>
    

@endsection