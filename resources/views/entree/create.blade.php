@extends ('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Approvisionnement </h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ __('Approvisionner') }}
                <a href="{{route('entree.index')}}" class="float-right"> Retour </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('entree.store') }}">
                        @csrf


                        <div class="row mb-3">
                            <label for="nom_fourni" class="col-md-4 col-form-label text-md-end">{{ __('Fournisseur') }} </label>

                             <div class="col-md-6">
                                 <select name="fournisseur_id" id="fournisseur_id" class="form-control @error('fournisseur_id') is-invalid @enderror" 
                                         value="{{ old('fournisseur_id') }}" required autocomplete="fournisseur_id" autofocus>
                                   
                                    @foreach ($nomFourni as $row1 )
                                           <option value="{{$row1->id}}"> {{$row1->nom_fourni}} </option>
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
                            <label for="denomination" class="col-md-4 col-form-label text-md-end">{{ __('Libellé Médicament') }} </label>

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
                            <label for="num_lot" class="col-md-4 col-form-label text-md-end">{{ __('Numéro série') }}</label>

                            <div class="col-md-6">
                                <input id="num_lot" type="text" class="form-control @error('num_lot') is-invalid @enderror" name="num_lot" 
                                     value="{{ old('num_lot') }}" required autocomplete="num_lot" autofocus>

                                @error('num_lot')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date_exp" class="col-md-4 col-form-label text-md-end">{{ __('Date d\'expiration') }}</label>

                            <div class="col-md-6">
                                <input id="date_exp" type="text" class="form-control @error('date_exp') is-invalid @enderror" name="date_exp" 
                                       value="{{ old('date_exp') }}" required autocomplete="date_exp" autofocus> 

                                @error('date_exp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="qty_ee" class="col-md-4 col-form-label text-md-end">{{ __('Quantité') }}</label>

                            <div class="col-md-6">
                                <input id="qty_ee" type="text" class="form-control @error('qty_ee') is-invalid @enderror" name="qty_ee" 
                                       value="{{ old('qty_ee') }}" required autocomplete="qty_ee" autofocus> 

                                @error('qty_ee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="date_appro" class="col-md-4 col-form-label text-md-end">{{ __('Date d\'appro.') }}</label>

                            <div class="col-md-6">
                                <input id="date_appro" type="text" class="form-control @error('date_appro') is-invalid @enderror" name="date_appro" 
                                       value="{{ old('date_appro') }}" required autocomplete="date_appro" autofocus> 

                                @error('date_appro')
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