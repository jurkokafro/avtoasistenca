@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

            <div class="card-header fw-bold"><h3 class="mt-2">Dodaj novo vozilo</h3></div>


                <form method="POST" action="/dodaj-vozilo" enctype="multipart/form-data" method="post">
                        @csrf
                     

                        <div class="row mb-3 pt-3">
                            <label for="znamka" class="col-md-4 col-form-label text-md-end">{{ __('Znamka avtomobila:') }}</label>

                            <div class="col-md-6">
                                <input id="znamka" type="text" class="form-control @error('znamka') is-invalid @enderror" name="znamka" value="{{ old('znamka') }}" required autocomplete="znamka" autofocus>

                                @error('znamka')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3 pt-3">
                            <label for="model" class="col-md-4 col-form-label text-md-end">{{ __('Model avtomobila:') }}</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}" required autocomplete="model" autofocus>

                                @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3 pt-3">
                            <label for="registracija" class="col-md-4 col-form-label text-md-end">{{ __('Registerska oznaka:') }}</label>

                            <div class="col-md-6">
                                <input id="registracija" type="text" class="form-control @error('registracija') is-invalid @enderror" name="registracija" value="{{ old('registracija') }}" required autocomplete="registracija" autofocus>

                                @error('registracija')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary px-4 py-2">
                                    {{ __('Dodaj vozilo') }}
                                </button>
                            </div>
                        </div>
                </form>
            </div>            
        </div>
    </div>
</div>
@endsection
