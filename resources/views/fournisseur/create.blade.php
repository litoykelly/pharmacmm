@extends ('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Fournisseurs </h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ __('Création Médicaments') }}
                <a href="{{route('fournisseur.index')}}" class="float-right"> Retour </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('fournisseur.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="categorie" class="col-md-4 col-form-label text-md-end">{{ __('Catégorie') }}</label>

                            <div class="col-md-6">
                                <select id="categorie" type="text" class="form-control @error('categorie') is-invalid @enderror" name="categorie" 
                                       value="{{ old('categorie') }}" required autocomplete="categorie" autofocus>

                                    <option value="">--Choisir une option svp--</option>
                                    <option value="Fournisseur">Fournisseur</option>
                                    <option value="Dépot">Dépot</option>   

                                </select>       

                                @error('categorie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nom_fourni" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom_fourni" type="text" class="form-control @error('nom_fourni') is-invalid @enderror" name="nom_fourni" 
                                     value="{{ old('nom_fourni') }}" required autocomplete="nom_fourni" autofocus>

                                @error('nom_fourni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="adresse_fourni" class="col-md-4 col-form-label text-md-end">{{ __('Adresse') }}</label>

                            <div class="col-md-6">
                                <input id="adresse_fourni" type="text" class="form-control @error('adresse_fourni') is-invalid @enderror" name="adresse_fourni" 
                                       value="{{ old('adresse_fourni') }}" required autocomplete="adresse_fourni" autofocus> 

                                @error('adresse_fourni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="tel_fourni" class="col-md-4 col-form-label text-md-end">{{ __('Tél.') }}</label>

                            <div class="col-md-6">
                                <input id="tel_fourni" type="text" class="form-control @error('tel_fourni') is-invalid @enderror" name="tel_fourni" 
                                       value="{{ old('tel_fourni') }}" required autocomplete="tel_fourni" autofocus> 

                                @error('tel_fourni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Créer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection