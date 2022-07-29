
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                


        {{-- prikaz forme za vnos podatkov o oddaji vozila v bazo --}}
        @if (app('request')->input('id')>0)
           
        
             
              <div class="card-header fw-bold"><h3 class="mt-2">{{ __('Oddaj vozilo '.$freecartorent[0]->znamka .' '.$freecartorent[0]->model.' z reg. oznako') }} {{ $freecartorent[0]->registracija  }}</h3></div>

          

        <form method="POST" action="/oddaja-vozila" enctype="multipart/form-data" method="post">
                        @csrf
                        
                       
                        <div class="row mb-3 pt-3">
                            <label for="najemnik_ime" class="col-md-4 col-form-label text-md-end">{{ __('Ime') }}</label>

                            <div class="col-md-6">
                                <input id="najemnik_ime" type="text" class="form-control @error('name') is-invalid @enderror" name="najemnik_ime" value="{{ old('najemnik_ime') }}" required autocomplete="najemnik_ime" autofocus>

                                @error('najemnik_ime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="najemnik_priimek" class="col-md-4 col-form-label text-md-end">{{ __('Priimek') }}</label>

                            <div class="col-md-6">
                                <input id="najemnik_priimek" type="text" class="form-control @error('najemnik_priimek') is-invalid @enderror" name="najemnik_priimek" value="{{ old('najemnik_priimek') }}" required autocomplete="najemnik_priimek" autofocus>

                                @error('najemnik_priimek')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="najemnik_naslov" class="col-md-4 col-form-label text-md-end">{{ __('Naslov') }}</label>

                            <div class="col-md-6">
                                <input id="najemnik_naslov" type="text" class="form-control @error('najemnik_naslov') is-invalid @enderror" name="najemnik_naslov" value="{{ old('najemnik_naslov') }}" required autocomplete="najemnik_naslov" autofocus>

                                @error('najemnik_naslov')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="najemnik_email" class="col-md-4 col-form-label text-md-end">{{ __('Email naslov') }}</label>

                            <div class="col-md-6">
                                <input id="najemnik_email" type="email" class="form-control @error('email') is-invalid @enderror" name="najemnik_email" value="{{ old('najemnik_email') }}" required autocomplete="najemnik_email">

                                @error('najemnik_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="najemnik_telefon" class="col-md-4 col-form-label text-md-end">{{ __('Telefon') }}</label>

                            <div class="col-md-6">
                                <input id="najemnik_telefon" type="text" class="form-control @error('name') is-invalid @enderror" name="najemnik_telefon" value="{{ old('najemnik_telefon') }}" required autocomplete="najemnik_telefon" autofocus>

                                @error('najemnik_telefon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="gorivo" class="col-md-4 col-form-label text-md-end">{{ __('Gorivo') }}</label>

                            <div class="col-md-6">
                                <input id="gorivo" type="text" class="form-control @error('name') is-invalid @enderror" name="gorivo" value="{{ old('gorivo') }}" required autocomplete="gorivo" autofocus>

                                @error('gorivo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr />

                        <div class="row mb-3">
                            <label for="najem_od" class="col-md-4 col-form-label text-md-end">{{ __('Najem od') }}</label>

                            <div class="col-md-6">
                                <input id="najem_od" type="date" class="form-control @error('najem_od') is-invalid @enderror" name="najem_od"  value="{{ date('Y-m-d') }}" required autocomplete="najem_od" autofocus>

                                @error('najem_od')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="najem_do" class="col-md-4 col-form-label text-md-end">{{ __('Najem do') }}</label>

                            <div class="col-md-6">
                                <input id="najem_do" type="date" class="form-control @error('najem_do') is-invalid @enderror" name="najem_do"  required autocomplete="najem_do" autofocus>

                                @error('najem_do')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <input type="hidden" id="car_id" name="car_id" value= "{{ app('request')->input('id') }}" />
                        <input type="hidden" id="vrnjen_dne" name="vrnjen_dne" value= "" />
                       





                    

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Oddaj vozilo') }}
                                </button>
                            </div>
                        </div>
                    </form>

       
        @endif

            
        </div>
    </div>
</div>
@endsection
