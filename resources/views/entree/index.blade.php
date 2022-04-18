@extends ('layouts.main')

@section('content')

     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Approvisionnement </h1>
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
                  <form method="GET" action="{{route('entree.index')}}">
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
               <a href="{{route('entree.create')}}"  class="btn btn-primary mb-2" class="float-rigth"> Ajouter</a>
             </div>
         </div>
      </div>

    <div class="card-body">
    <table class="table">
           <thead>
              <tr>
                  <th scope="col">#Id</th>
                  <th scope="col">Nom Produit</th>
                  <th scope="col">Numéro Lot</th>
                  <th scope="col">Qté entrée</th>
                  <th scope="col">Date Péremption</th>
                  <th scope="col">Date d'entrée</th>
                 {{--  <th scope="col">Action</th>
                  <th scope="col">Statut</th> --}}
              </tr>
           </thead>
           <tbody>
              @foreach ($showEntrees as $showEntree )
               <tr>
                 <th scope="row">{{$showEntree->id}}</th>
                 <td>{{$showEntree->denomination}}</td>
                 <td>{{$showEntree->num_lot}}</td>
                 <td>{{$showEntree->qty_ee}}</td>
                 <td>{{$showEntree->date_exp}}</td>
                 <td>{{$showEntree->date_appro}}</td>

                 {{-- <td><a href="{{route('entree.edit',$showEntree->id)}}" class="btn btn-success"> Modifier </a></td>
                 <td>{{$showEntree->statut}}</td>    --}}           
              </tr>  
              @endforeach
          </tbody>
          
      </table>
  </div>
  </div>
    

@endsection