
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
               
              
                
                <div class="card-header fw-bold">{{ __('SEZNAM VOZIL ZA IZBRIS') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                
                    <div class="col-12 d-flex fw-bold">
                                <div class="col-2">Registracija</div>
                                <div class="col-2">Znamka</div>
                                <div class="col-3">Model</div>
                                <div class="col-1">Oddano?</div>
                                <div class="col-3"></div>

                            </div >
                            <hr />
                    <?php $i=0 ?>
                    @foreach ($allcars as $item)
                            <?php $i++ ?>
                            
                            <div class="col-12 d-flex pb-1">
                                <div class="col-2">{{ $item->registracija }} </div>
                                <div class="col-2">{{ $item->znamka }}</div>
                                <div class="col-3">{{ $item->model }}</div>
                                <div class="col-1 text-center"> 
                                    @if($item->isout==0) 
                                       {{ 'NE' }}
                                    
                                    @else 
                                        {{ 'DA' }}

                                    @endif
                                </div>
                                <div class="col-3 btn btn-primary btn-sm mx-5"><a class="text-white text-decoration-none" href="./izbris-vozila/delete?id={{ $item->id }} ">Izbriši vozilo</a></div>
                            </div>
                              
                               
                              
                            @endforeach
                </div>
                


            </div>

        </div>
    </div>
</div>
@endsection
