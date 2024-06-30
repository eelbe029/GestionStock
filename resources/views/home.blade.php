@extends('layouts.app')

@section('content')

    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h4 class="h2">Alertes</h4>
        </div>
        <div class="text-bg-light mt-5 container">
            <div class="row">
                @foreach($types as $type)
                    @if($type->QteDisponible <= 5)
                        <div class="col">
                            <div class="card me-4 bg-danger-subtle text-white">
                                <div class="card-header bg-danger align-content-center">
                                    <h3>{{$type->name}}</h3>
                                </div>
                                <div class="card-footer bg-danger  pb-4">
                                    <img style="width: 18px" src="dispo.png">
                                    <h7 class="mt-2">Disponible : {{$type->QteDisponible}}</h7>
                                </div>
                            </div>
                        </div>
                    @elseif($type->QteDisponible < 10)
                        <div class="col">
                            <div class="card bg-warning-subtle text-white">
                                <div class="card-header bg-warning align-content-center">
                                    <h3>{{$type->name}}</h3>
                                </div>
                                <div class="card-footer bg-warning pb-4">
                                    <img style="width: 18px" src="dispo.png">
                                    <h7 class="mt-2">Disponible : {{$type->QteDisponible}}</h7>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col">
                            <div class="card ms-4 bg-primary-success text-white">
                                <div class="card-header bg-success align-content-center">
                                    <h3>{{$type->name}}</h3>
                                </div>
                                <div class="card-footer bg-success  pb-4">
                                    <img style="width: 18px" src="dispo.png">
                                    <h7 class="mt-2">Disponible : {{$type->QteDisponible}}</h7>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="mt-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h4 class="h2">Etat actuel</h4>
        </div>
        <div class="card pb-5 container d-flex justify-content-start" >
                <div class="mt-3">
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                </div>
        </div>
    </div>
    <script src="JS/dashboard.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
@endsection
