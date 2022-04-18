@extends ('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Retirer médicaments/Modifier </h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                     {{ __('MAJ Utilisateur') }}
                     <a href="{{route('sortie.index')}}" class="float-right"> Retour </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sortie.update',$sortie->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="medicament_id" class="col-md-4 col-form-label text-md-end">{{ __('Nom Produit') }}</label>

                            <div class="col-md-6">
                                <select name="medicament_id" id="medicament_id" class="form-control @error('medicament_id') is-invalid @enderror" name="medicament_id"  
                                value="{{ old('medicament_id',$sortie->medicament_id) }}" required autocomplete="medicament_id" autofocus>
                                    
                                    @foreach ($denomination as $row )
                                           <option value="{{$row->id}}"> {{$row->denomination}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="qty_sortie" class="col-md-4 col-form-label text-md-end">{{ __('Quantité') }}</label>

                            <div class="col-md-6">
                                <input id="qty_sortie" type="qty_sortie" class="form-control @error('qty_sortie') is-invalid @enderror" name="qty_sortie" 
                                   value="{{ old('qty_sortie',$sortie->qty_sortie) }}" required autocomplete="qty_sortie">

                                @error('qty_sortie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date_sortie" class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date_sortie" type="date_sortie" class="form-control @error('date_sortie') is-invalid @enderror" name="date_sortie" 
                                   value="{{ old('date_sortie',$sortie->date_sortie) }}" required autocomplete="date_sortie">

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
                                    {{ __('Modifier') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="m-2 p-2">
             <form method="POST" action="{{route('sortie.destroy',$sortie->id)}}">
               @csrf
               @method ('DELETE')
               <button class="btn btn-danger"> Delete {{ $sortie->username}} </button>
             </form>
            </div>
        </div>
    </div>
</div>
@endsection