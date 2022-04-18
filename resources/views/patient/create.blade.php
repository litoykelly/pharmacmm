@extends ('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Patients </h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ __('Création Médicaments') }}
                <a href="{{route('patient.index')}}" class="float-right"> Retour </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('patient.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="num_fiche" class="col-md-4 col-form-label text-md-end">{{ __('Num. Fiche') }}</label>

                            <div class="col-md-6">
                                <input id="num_fiche" type="text" class="form-control @error('num_fiche') is-invalid @enderror" name="num_fiche" 
                                       value="{{ old('num_fiche') }}" required autocomplete="num_fiche" autofocus>

                                @error('num_fiche')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                          <div class="row mb-3">
                            <label for="nom_societe" class="col-md-4 col-form-label text-md-end">{{ __('Nom Société') }} </label>

                            <div class="col-md-6">
                                 <select name="societe_id" id="societe_id" class="form-control @error('societe_id') is-invalid @enderror" 
                                         value="{{ old('societe_id') }}" required autocomplete="societe_id" autofocus>
                                   
                                   <option value="">--Choisir la société svp--</option>
                                    @foreach ($nomSociete as $row )
                                           <option value="{{$row->id}}"> {{$row->nom_societe}} {{$row->province_societe}} </option>
                                    @endforeach
                                 </select>

                                @error('nom_societe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cat_patient" class="col-md-4 col-form-label text-md-end">{{ __('Catégorie Patient') }}</label>

                            <div class="col-md-6">
                                <select id="cat_patient" type="text" class="form-control @error('cat_patient') is-invalid @enderror" name="cat_patient" 
                                        value="{{ old('cat_patient') }}" required autocomplete="cat_patient" autofocus>

                                    <option value="">--Choisir la catégorie svp--</option>
                                    <option value="Employé">Employé</option>
                                    <option value="Conjoint(e)">Conjoint(e) de L'employé</option>
                                    <option value="Enfant de L'employé">Enfant de L'employé</option>    

                                </select>       

                                @error('categorie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nom_patient" class="col-md-4 col-form-label text-md-end">{{ __('Nom Patient') }}</label>

                            <div class="col-md-6">
                                <input id="nom_patient" type="text" class="form-control @error('nom_patient') is-invalid @enderror" name="nom_patient" 
                                       value="{{ old('nom_patient') }}" required autocomplete="nom_patient" autofocus> 

                                @error('nom_patient')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="age_patient" class="col-md-4 col-form-label text-md-end">{{ __('Age Patient') }}</label>

                            <div class="col-md-6">
                                <input id="age_patient" type="text" class="form-control @error('age_patient') is-invalid @enderror" name="age_patient" 
                                       value="{{ old('age_patient') }}" required autocomplete="age_patient" autofocus> 

                                @error('age_patient')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="sexe_patient" class="col-md-4 col-form-label text-md-end">{{ __('Sexe Patient') }}</label>

                            <div class="col-md-6">
                                <input id="sexe_patient" type="text" class="form-control @error('sexe_patient') is-invalid @enderror" name="sexe_patient" 
                                       value="{{ old('sexe_patient') }}" required autocomplete="sexe_patient" autofocus> 

                                @error('sexe_patient')
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