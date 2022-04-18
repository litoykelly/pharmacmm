@extends ('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Regler Ordonnance </h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                 <div> 
                   @if (session()->has('message'))
                      <div class="alert alert-danger">
                         {{session('message')}}
                     </div>
                   @endif
                </div>

                {{ __('Reglement Ordonnance') }}

                <a href="{{route('prescription.index')}}" class="float-right"> Retour </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sortie.store',$prescription->id)}}">
                        @csrf
                         {{-- @method ('PUT')  --}}

                        <div class="row mb-3">
                            <label for="prescription_id" class="col-md-4 col-form-label text-md-end">{{ __('Code ordonnance') }} </label>

                             <div class="col-md-6">
                                 <input name="prescription_id" id="id" class="form-control @error('prescription_id') is-invalid @enderror" 
                                         value="{{ old('id',$prescription->id) }}" required autofocus>
                                   
                                @error('prescription_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <label for="nom_patient" class="col-md-4 col-form-label text-md-end">{{ __('Nom Patient') }} </label>

                             <div class="col-md-6">
                                 <select name="num_fiche" id="num_fiche" class="form-control @error('num_fiche') is-invalid @enderror" 
                                         value="{{ old('num_fiche',$prescription->num_fiche) }}" required autofocus>
                                   
                                    @foreach ($nomPatient as $row )
                                           <option value="{{$row->num_fiche}}"> {{$row->nom_patient}} </option>
                                    @endforeach
                                 </select>

                                @error('nom_patient')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}


                         {{--   <div class="row mb-3">
                            <label for="nom_medecin" class="col-md-4 col-form-label text-md-end">{{ __('Medecin') }} </label>

                            <div class="col-md-6">
                                 <select name="matricule_medecin" id="matricule_medecin" class="form-control @error('matricule_medecin') is-invalid @enderror" 
                                         value="{{ old('matricule_medecin',$prescription->matricule_medecin) }}" required  autofocus>
                                   
                                    <option value="1198">CEDRIC</option>
                                    <option value="1197">PIKA</option>   

                                 </select>

                                @error('matricule_medecin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{--  <div class="row mb-3">
                            <label for="service" class="col-md-4 col-form-label text-md-end">{{ __('Service') }}</label>

                            <div class="col-md-6">
                                <input id="service" type="text" class="form-control @error('service') is-invalid @enderror" name="service" 
                                       value="{{ old('service',$prescription->service) }}" required autofocus> 

                                @error('service')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div> --}}

                         <div class="row mb-3">
                            <label for="denomination" class="col-md-4 col-form-label text-md-end">{{ __('Médicament') }} </label>

                            <div class="col-md-6">
                                 <select name="medicament_id" id="medicament_id" class="form-control @error('medicament_id') is-invalid @enderror" 
                                         value="{{ old('medicament_id') }}" required autocomplete="medicament_id" autofocus>
                                   
                                    @foreach ($denomination as $row )
                                           <option value="{{$row->id}}"> {{$row->denomination}} </option>
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
                                       value="{{ old('qty_med_presc',$prescription->qty_med_presc) }}" required  autofocus> 

                                @error('qty_med_presc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="qty_sortie" class="col-md-4 col-form-label text-md-end">{{ __('Quantité Livrée') }}</label>

                            <div class="col-md-6">
                                <input id="qty_sortie" type="text" class="form-control @error('qty_sortie') is-invalid @enderror" name="qty_sortie" 
                                       value="{{ old('qty_sortie') }}" required  autofocus> 

                                @error('qty_med_presc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="date_sortie" class="col-md-4 col-form-label text-md-end">{{ __('Date Livraison') }}</label>

                            <div class="col-md-6">
                                <input id="date_sortie" type="text" class="form-control @error('date_sortie') is-invalid @enderror" name="date_sortie" 
                                       value="{{ old('date_sortie') }}" required  autofocus> 

                                @error('date_sortie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                         </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Retirer du stock') }}
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