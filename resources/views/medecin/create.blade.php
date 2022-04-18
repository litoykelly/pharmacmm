@extends ('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Medecins </h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ __('Création Médecin') }}
                <a href="{{route('medecin.index')}}" class="float-right"> Retour </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('medecin.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="matricule_medecin" class="col-md-4 col-form-label text-md-end">{{ __('Matricule Medecin') }}</label>

                            <div class="col-md-6">
                                <input id="matricule_medecin" type="text" class="form-control @error('matricule_medecin') is-invalid @enderror" name="matricule_medecin" 
                                       value="{{ old('matricule_medecin') }}" required autocomplete="matricule_medecin" autofocus>

                                @error('matricule_medecin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nom_medecin" class="col-md-4 col-form-label text-md-end">{{ __('Nom Medecin') }} </label>

                               <div class="col-md-6">
                                <input id="nom_medecin" type="text" class="form-control @error('nom_medecin') is-invalid @enderror" name="nom_medecin" 
                                       value="{{ old('nom_medecin') }}" required autocomplete="nom_medecin" autofocus>

                                @error('nom_medecin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       <div class="row mb-3">
                            <label for="grade_medecin" class="col-md-4 col-form-label text-md-end">{{ __('Grade Medecin') }} </label>

                               <div class="col-md-6">
                                <input id="grade_medecin" type="text" class="form-control @error('grade_medecin') is-invalid @enderror" name="grade_medecin" 
                                       value="{{ old('grade_medecin') }}" required autocomplete="grade_medecin" autofocus>

                                @error('grade_medecin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fonction_medecin" class="col-md-4 col-form-label text-md-end">{{ __('Fonction Patient') }}</label>

                            <div class="col-md-6">
                                <input id="fonction_medecin" type="text" class="form-control @error('fonction_medecin') is-invalid @enderror" name="fonction_medecin" 
                                       value="{{ old('fonction_medecin') }}" required autocomplete="fonction_medecin" autofocus> 

                                @error('fonction_medecin')
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