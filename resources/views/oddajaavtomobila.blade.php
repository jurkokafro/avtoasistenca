
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

            {{-- izpis vseh vozil, ki so trenutno prosta --}}
               
                <div class="card-header fw-bold">{{ __('PROSTA VOZILA') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                
                    <div class="col-12 d-flex fw-bold">
                                <div class="col-3">Registracija</div>
                                <div class="col-3">Znamka</div>
                                <div class="col-3">Model</div>
                                <div class="col-3">Oddaj vozilo</div>

                            </div >
                            <hr />

                   

                    @foreach ($freecars as $item)
                    
                            @if ($item->id ==  app('request')->input('id'))
                                <?php $voziloZaOddajo = $item->registracija ?>
                            @endif
                            
                            <div class="col-12 d-flex pb-1">
                                <div class="col-3">{{ $item->registracija }}</div>
                                <div class="col-3">{{ $item->znamka }}</div>
                                <div class="col-3">{{ $item->model }}</div>
                                <div class="col-3 btn btn-primary btn-sm"><a class="text-white text-decoration-none" href="./oddaja-vozila/create?id={{$item->id}}">Oddaj vozilo</a></div>
                            </div>

                               
                            @endforeach
                </div>

               
</div>


        {{-- prikaz forme za vnos podatkov o oddaji vozila v bazo --}}

        @if (app('request')->input('id')>0)
             <div class="card mt-3">
                <div class="card-header fw-bold">{{ __('Oddaj vozilo z reg. oznako') }} {{ $voziloZaOddajo  }}</div>

                <form method="get" action="./oddaja-vozila/create" >
                    <input type="text" id="id" name="id" value="{{app('request')->input('id')}}" hidden />
                    <input type="submit" value="Oddaj vozilo" >
                </form>
            </div>
        @endif

            
        </div>
    </div>
</div>
@endsection
