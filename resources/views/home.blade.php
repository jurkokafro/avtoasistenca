
@extends('layouts.app')



@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
               
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

                            <div class="col-12 d-flex pb-1">
                                <div class="col-3">{{ $item->registracija }}</div>
                                <div class="col-3">{{ $item->znamka }}</div>
                                <div class="col-3">{{ $item->model }}</div>
                                <div class="col-3 btn btn-primary btn-sm"><a class="text-white text-decoration-none" href="./oddaja-vozila/create?id={{ $item->id }} ">Oddaj vozilo</a></div>
                            </div>
                            @endforeach
                </div>
</div>
<div class="card mt-3">
                
                <div class="card-header fw-bold">{{ __('ODDANA VOZILA') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                
                    <div class="col-12 d-flex fw-bold">
                                <div class="col-2">Registracija</div>
                                <div class="col-2">Priimek</div>
                                <div class="col-2">Telefon</div>
                                <div class="col-3">Oddan do</div>
                                <div class="col-3">Prevzemi vozilo</div>

                            </div >
                            <hr />
                    <?php $i=0 ?>
                    @foreach ($usedcars as $item)
                            <?php $i++ ?>
                            
                            <div class="col-12 d-flex pb-1">
                                <div class="col-2">
                                {{ $item->registracija }}
                                </div>
                                <div class="col-2">{{ $item->najemnik_priimek }}</div>
                                <div class="col-2">{{ $item->najemnik_telefon }}</div>
                                <div class="col-3">
                                
                              
                                <?php  $datum_do = date('d.m.Y',strtotime($item->najem_do));
                                    
                                        $datum1 = date_create($datum_do);
                                        $datum2 = date_create(date('d.m.Y'));

                                    
                                        $razlika = date_diff($datum2, $datum1);
                                       // print_r($razlika);
                                ?>
                                {{
                                    
                                    
                                   $datum_do

                                }}
                            @if($datum2 > $datum1) 
                            &nbsp;&nbsp;<button class="btn btn-danger mt-0 mb-0 pt-0 pb-0"><b>!</b></button>
                            @elseif($datum2 == $datum1)

                            &nbsp;&nbsp;<button class="btn btn-warning pt-0 pb-0"><b>!</b></button>
                            @endif
                            
                            </div>
                              

                                <div><a class="text-white text-decoration-none btn btn-primary btn-sm" href="./prevzem-vozila?id={{$item->car_id}}">Prevzemi vozilo</a></div>
                                &nbsp;&nbsp;&nbsp;
                                <div><button class="text-white text-decoration-none btn btn-primary btn-sm" onclick="myFunction2({{ $i }});">Več</button></div>
                            </div>

                                <div id="myDIV{{$i}}" class="col-12" onclick="myFunction2({{ $i }});" style="display:none">
                                <br />
                                <div class="d-flex col-10">
                                    
                                        <div class="col-2"><b>{{ "Ime: " }}</b> <br />{{ $item->najemnik_ime }}</div>
                                        <div class="col-3"><b>{{ "Priimek: " }}</b> <br />{{ $item->najemnik_priimek }}</div>
                                        <div class="col-3"><b>{{ "Naslov: " }}</b> <br />{{ $item->najemnik_naslov }}</div>
                                        <div class="col-3"><b>{{ "Email: " }}</b> <br />{{ $item->najemnik_email }}</div>
                                        <div class="col-3"><b>{{ "Telefon: " }}</b> <br />{{ $item->najemnik_telefon }}</div>
                                </div>
                                <br />
                                <div class="d-flex col-10">
                                        <div class="col-2"><b>{{ "OD: " }}</b> <br />{{ date('d.m.Y', strtotime($item->najem_od)) }}</div>
                                        <div class="col-6"><b>{{ "DO: " }}</b> <br />{{ date('d.m.Y', strtotime($item->najem_do)) }}</div>
                                        <div class="col-3"><b>{{ "Stanje goriva: " }}</b> <br />{{ $item->gorivo }}</div>
                                        <div class="col-3"><b>{{ "Oddal: " }}</b> <br />{{ $item->name }} </div>
                                </div>
                                <br />
                                <div class="d-flex col-10">
                                        <div class="col-2"><b>{{ "Znamka: " }}</b> <br />{{ $item->znamka }}</div>
                                        <div class="col-6"><b>{{ "Model: " }}</b> <br />{{ $item->model }}</div>
                                        <div class="col-3"><b>{{ "Registracija: " }}</b> <br />{{ $item->registracija }}</div>
                                </div>
                                <br /><hr /><br />
                            </div>
                            @endforeach
                </div>
                


            </div>

            <div class="mt-3">
                <button type="button" class="btn btn-primary py-3 col-3"><a class="text-white text-decoration-none" href="./dodaj-vozilo/create">Dodaj novo vozilo</a></button>
                <button type="button" class="btn btn-primary py-3 col-4"><a class="text-white text-decoration-none" href="./pregled-izposoj">Pregled zadnjih izposoj</a></button>
                <button type="button" class="btn btn-primary py-3 col-3"><a class="text-white text-decoration-none" href="./izbris-vozila">Odstrani vozilo</a></button>
            </div>


          


            </div>

        </div>
    </div>
</div>
@endsection
