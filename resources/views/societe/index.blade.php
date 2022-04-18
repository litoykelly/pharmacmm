@extends ('layouts.main')

@section('content')

     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Liste de Société </h1>
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
                  <form method="GET" action="{{route('societe.index')}}">
                       <div class="form-row align-items-center">
                          <div class="col">
                             <input type="search"  name="search" class="form-control mb-2" id="inlineFormInput" placeholder="société">
                          </div>
                          <div class="col">
                              <button type="submit" class="btn btn-primary mb-2"> Search </button>
                          </div>
                       </div>
                  </form>
             </div>
             <div>
               <a href="{{route('societe.create')}}"  class="btn btn-primary mb-2" class="float-rigth"> Ajouter</a>
             </div>
         </div>
      </div>

    <div class="card-body">
    <table class="table">
           <thead>
              <tr>
                  <th scope="col">#Id</th>
                  <th scope="col">Nom Sociétéé</th>
                  <th scope="col">Province Société</th>
                  <th scope="col">Manage</th>
              </tr>
           </thead>
           <tbody>
              @foreach ($showSocietes as $showSociete)
               <tr>
                 <th scope="row">{{$showSociete->id}}</th>
                 <td>{{$showSociete->nom_societe}}</td>
                 <td>{{$showSociete->province_societe}}</td>
                 <td>
                    <a href="{{route('societe.edit',$showSociete->id)}}" class="btn btn-success"> Modifier </a>
                    {{-- <a href="{{route('societe.destroy',$showSociete->id)}}" class="btn btn-danger"> Suppimer </a> --}}
                   
                 </td>
              </tr>  
              @endforeach
          </tbody>
      </table>
  </div>
  </div>
    

@endsection