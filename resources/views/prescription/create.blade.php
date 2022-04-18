@extends ('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Prescription </h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ __('Prescription') }}
                <a href="{{route('prescription.index')}}" class="float-right"> Retour </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('prescription.store')}}">
                        @csrf
                        <div class="row mb-3">
                            <label for="nom_patient" class="col-md-4 col-form-label text-md-end">{{ __('Nom Patient') }} </label>

                             <div class="col-md-6">
                                 <select name="num_fiche" id="num_fiche" class="form-control @error('num_fiche') is-invalid @enderror" 
                                         value="{{ old('num_fiche') }}" required autocomplete="num_fiche" autofocus>
                                   
                                    <option value="">--Selectionner Patient--</option>
                                    @foreach ($nomPatient as $row1 )
                                           <option value="{{$row1->num_fiche}}"> {{$row1->nom_patient}} </option>
                                    @endforeach
                                 </select>

                                @error('num_fiche')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="nom_medecin" class="col-md-4 col-form-label text-md-end">{{ __('Medecin') }} </label>

                            <div class="col-md-6">
                                 <select name="matricule_medecin" id="matricule_medecin" class="form-control @error('matricule_medecin') is-invalid @enderror" 
                                         value="{{ old('matricule_medecin') }}" required autocomplete="matricule_medecin" autofocus>
                                   
                                    <option value="">--Selectionner Medecin--</option>
                                    <option value="1198">CEDRIC</option>
                                    <option value="1197">PIKA</option>   

                                 </select>

                                @error('matricule_medecin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          <div class="row mb-3">
                            <label for="service" class="col-md-4 col-form-label text-md-end">{{ __('Service') }}</label>

                            <div class="col-md-6">
                                <input id="service" type="text" class="form-control @error('service') is-invalid @enderror" name="service" 
                                       value="{{ old('service') }}" required autocomplete="service" autofocus> 

                                @error('service')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="denomination" class="col-md-4 col-form-label text-md-end">{{ __('Medicament') }} </label>

                            <div class="col-md-6">
                                 <select name="medicament_id" id="medicament_id" class="form-control @error('medicament_id') is-invalid @enderror" 
                                         value="{{ old('medicament_id') }}" required autocomplete="medicament_id" autofocus>
                                   
                                     <option value="">--Selectionner medicament--</option>
                                      @foreach ($denomination as $row1 )
                                           <option value="{{$row1->id}}"> {{$row1->denomination}} </option>
                                      @endforeach
                                    
                                 </select>

                                @error('denomination')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="qty_med_presc" class="col-md-4 col-form-label text-md-end">{{ __('Quantité demandée') }}</label>

                            <div class="col-md-6">
                                <input id="qty_med_presc" type="text" class="form-control @error('qty_med_presc') is-invalid @enderror" name="qty_med_presc" 
                                       value="{{ old('qty_med_presc') }}" required autocomplete="qty_med_presc" autofocus> 

                                @error('qty_med_presc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date_prescr" class="col-md-4 col-form-label text-md-end">{{ __('Date Prescrition') }}</label>

                            <div class="col-md-6">
                                <input id="date_prescr" type="text" class="form-control @error('date_prescr') is-invalid @enderror" name="date_prescr" 
                                       value="{{ old('date_prescr') }}" required autocomplete="date_prescr" autofocus> 

                                @error('date_prescr')
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