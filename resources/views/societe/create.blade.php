@extends ('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Société </h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ __('Création Société') }}
                <a href="{{route('societe.index')}}" class="float-right"> Retour </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('societe.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nom_societe" class="col-md-4 col-form-label text-md-end">{{ __('Nom Societé') }}</label>

                            <div class="col-md-6">
                                <input id="nom_societe" type="text" class="form-control @error('nom_societe') is-invalid @enderror" name="nom_societe" 
                                       value="{{ old('nom_societe') }}" required autocomplete="nom_societe" autofocus>

                                @error('nom_societe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="province_societe" class="col-md-4 col-form-label text-md-end">{{ __('Province Société') }}</label>

                            <div class="col-md-6">
                                <input id="province_societe" type="text" class="form-control @error('province_societe') is-invalid @enderror" name="province_societe" 
                                     value="{{ old('province_societe') }}" required autocomplete="province_societe" autofocus>

                                @error('province_societe')
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