@extends ('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Médicaments </h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                     {{ __('MAJ Médicaments') }}
                     <a href="{{route('produits.index')}}" class="float-right"> Retour </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('produits.update',$produit->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="denomination" class="col-md-4 col-form-label text-md-end">{{ __('Libelle') }}</label>
                            <div class="col-md-6">
                                <input id="denomination" type="text" class="form-control @error('denomination') is-invalid @enderror" 
                                name="denomination" value="{{ old('denomination', $produit->denomination) }}" required>

                                @error('denomination')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="prix_unitaire" class="col-md-4 col-form-label text-md-end">{{ __('Prix Unitaire') }}</label>
                            <div class="col-md-6">
                                <input id="prix_unitaire" type="text" class="form-control @error('prix_unitaire') is-invalid @enderror" 
                                name="prix_unitaire" value="{{ old('prix_unitaire', $produit->prix_unitaire) }}" required>

                                @error('prix_unitaire')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="stock" class="col-md-4 col-form-label text-md-end">{{ __('Stock') }}</label>
                            <div class="col-md-6">
                                <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror" 
                                name="stock" value="{{ old('stock', $produit->stock) }}" required>

                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Mettre à Jour') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="m-2 p-2">
             <form method="POST" action="{{route('produits.destroy',$produit->id)}}">
               @csrf
               @method ('DELETE')
               <button class="btn btn-danger"> Delete {{ $produit->denomination}} </button>
             </form>
            </div>
        </div>
    </div>
</div>
@endsection