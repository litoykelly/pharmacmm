@extends ('layouts.main')

@section('content')

     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Liste Fournisseurs </h1>
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
                  <form method="GET" action="{{route('fournisseur.index')}}">
                       <div class="form-row align-items-center">
                          <div class="col">
                             <input type="search"  name="search" class="form-control mb-2" id="inlineFormInput" placeholder="fournisseur">
                          </div>
                          <div class="col">
                              <button type="submit" class="btn btn-primary mb-2"> Rechercher </button>
                          </div>
                       </div>
                  </form>
             </div>
             <div>
               <a href="{{route('fournisseur.create')}}"  class="btn btn-primary mb-2" class="float-rigth"> Ajouter</a>
             </div>
         </div>
      </div>

    <div class="card-body">
    <table class="table">
           <thead>
              <tr>
                  <th scope="col">#Id</th>
                  <th scope="col">Catégorie</th>
                  <th scope="col">Nom Fournisseur</th>
                  <th scope="col">Adresse Fournisseur</th>
                  <th scope="col">Tél. Fournisseur</th>
                  <th scope="col">Menage</th>
              </tr>
           </thead>
           <tbody>
              @foreach ($showFournisseurs as $showFournisseur )
               <tr>
                 <th scope="row">{{$showFournisseur->id}}</th>
                 <td>{{$showFournisseur->categorie}}</td>
                 <td>{{$showFournisseur->nom_fourni}}</td>
                 <td>{{$showFournisseur->adresse_fourni}}</td>
                 <td>{{$showFournisseur->tel_fourni}}</td>
                 

                 <td>
                    <a href="{{route('fournisseur.edit',$showFournisseur->id)}}" class="btn btn-success"> Modifier </a>
                    {{-- <a href="{{route('fournisseur.destroy',$showFournisseur->id)}}" class="btn btn-danger"> Supprimer </a> --}}
                 </td>
              </tr>  
              @endforeach
          </tbody>
          
      </table>
  </div>
  </div>
    

@endsection