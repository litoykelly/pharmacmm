@extends ('layouts.main')

@section('content')

     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Liste Medecins </h1>
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
                  <form method="GET" action="{{route('medecin.index')}}">
                       <div class="form-row align-items-center">
                          <div class="col">
                             <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Patient">
                          </div>

                          <div class="col">
                              <button type="submit" class="btn btn-primary mb-2"> Rechercher </button>
                          </div>
                       </div>
                  </form>
             </div>
             
             <div>
               <a href="{{route('medecin.create')}}"  class="btn btn-primary mb-2" class="float-rigth"> Ajouter</a>
             </div>
         </div>
      </div>

    <div class="card-body">
    <table class="table">
           <thead>
              <tr>
                  <th scope="col">#Id</th>
                  <th scope="col">Matricule</th>
                  <th scope="col">Nom Medecin</th>
                  <th scope="col">Grade</th>
                  <th scope="col">Fonction</th>
                  <th scope="col">Manage</th>
                 
              </tr>
           </thead>

           <tbody>
              @foreach ($showMedecins as $showMedecin)
               <tr>
                 <th scope="row">{{$showMedecin->id}}</th>
                 <td>{{$showMedecin->matricule_medecin}}</td>
                 <td>{{$showMedecin->nom_medecin}}</td>
                 <td>{{$showMedecin->grade_medecin}}</td>
                 <td>{{$showMedecin->fonction_medecin}}</td>
                 <td> 
                  <a href="" class="btn btn-success"> Modifier </a>
                    <a href="" class="btn btn-danger"> Suppimer </a>                  
                 </td>
              </tr>  
              @endforeach
          </tbody>
      </table>
  </div>
  </div>
    

@endsection