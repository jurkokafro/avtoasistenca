@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header fw-bold"><h3 class="mt-2">Seznam vseh izposoj</h3></div>
            
            <div class="col-11 d-flex pb-1 m-4 fw-bold border-bottom">
                    <div class="col-1">IME</div>
                    <div class="col-1">PRIIMEK</div>
                    <div class="col-1">NASLOV</div>
                    <div class="col-2">EMAIL</div>
                    <div class="col-1">TEL</div>
                    <div class="col-1">GORIVO</div>
                    <div class="col-2">NAJEM OD</div>
                    <div class="col-2">NAJEM DO</div>
                    <div class="col-2">VRNJEN DNE</div>
                </div>
        
        
            @foreach ($seznamizposoj as $item)

                <div class="col-11 d-flex pb-1 m-4 border-bottom">
                    <div class="col-1">{{ $item->najemnik_ime }}</div>
                    <div class="col-1">{{ $item->najemnik_priimek }}</div>
                    <div class="col-1">{{ $item->najemnik_naslov }}</div>
                    <div class="col-2">{{ $item->najemnik_email }}</div>
                    <div class="col-1">{{ $item->najemnik_telefon }}</div>
                    <div class="col-1">{{ $item->gorivo }}</div>
                    <div class="col-2">{{ $item->najem_od }}</div>
                    <div class="col-2">{{ $item->najem_do }}</div>
                    <div class="col-2">{{ $item->vrnjen_dne }}</div>
                </div>
            @endforeach
            </div>            
        </div>
    </div>
</div>
@endsection
