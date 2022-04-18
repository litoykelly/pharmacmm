@extends ('layouts.main')

@section('content')

     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Médicaments </h1>
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
                  <form method="GET" action="{{route('stock.index')}}">
                       <div class="form-row align-items-center">
                          <div class="col">
                             <input type="search"  name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Search">
                          </div>
                          <div class="col">
                              <button type="submit" class="btn btn-primary mb-2"> Rechercher </button>
                          </div>
                       </div>
                  </form>
             </div>
             <div>
               <a href="{{route('produits.create')}}"  class="btn btn-primary mb-2" class="float-rigth"> Create</a>
             </div>
         </div>
      </div>

    <div class="card-body">
    <table class="table">
           <thead>
              <tr>
                  <th scope="col">Code Produit</th>
                  <th scope="col">Libellé</th>
                  <th scope="col">Stock</th>
                  {{-- <th scope="col">Action</th> --}}
              </tr>
           </thead>
           <tbody>
              @foreach ($produitStocks as $produitStock )
               <tr>
                 <th scope="row">{{$produitStock->id}}</th>
                 <td>{{$produitStock->denomination}}</td>
                 <td>{{$produitStock->stock}}</td>

                 {{-- <td>
                    <a href="{{route('produits.edit',$produitStock->id)}}" class="btn btn-success"> Modifier </a>
                    <a href="{{route('produits.destroy',$produitStock->id)}}" class="btn btn-danger"> Suppimer </a>
                 </td> --}}
              </tr>  
              @endforeach
          </tbody>
      </table>
  </div>
  </div>
    

@endsection