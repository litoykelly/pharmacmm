@extends ('layouts.main')

@section('content')

     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Médicaments en Stock </h1>
    </div>
    
<div class="row">
     <div class="card mx-auto">

                <div> 
                   
                      <div class="alert alert-danger">
                         {{'Veiller retrancher la valeur supprimée de la valeur du Stock !!!'}}
                     </div>
                   
                </div>

         <div class="card-header">
            <div class="row">
                <div class="col">
                  {{-- <form method="GET" action="{{route('entree.index')}}">
                       <div class="form-row align-items-center">
                          <div class="col">
                             <input type="search"  name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Paracetamol">
                          </div>
                          <div class="col">
                              <button type="submit" class="btn btn-primary mb-2"> Rechercher </button>
                          </div>
                       </div>
                  </form> --}}
             </div>
             <div>
               <a href="{{route('stock.index')}}"  class="btn btn-primary mb-2" class="float-rigth"> OK</a>
             </div>
         </div>
      </div>

    
    

@endsection