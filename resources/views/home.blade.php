@extends('layouts.app')

@section('content')

    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h4 class="h2">Alertes</h4>
        </div>
        <div class="text-bg-light mt-5 container">
            <div class="row">
                <div class="col">
                    <div class="card me-4 bg-primary-subtle text-white">
                        <div class="card-header bg-primary align-content-center">
                            <h3>Ordinateurs</h3>
                        </div>
                        <div class="card-footer bg-primary  pb-4">
                            <img style="width: 18px" src="dispo.png">
                            <h7 class="mt-2">Disponible : 100</h7>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-primary-subtle text-white">
                        <div class="card-header bg-primary align-content-center">
                            <h3>Routeur</h3>
                        </div>
                        <div class="card-footer bg-primary  pb-4">
                            <img style="width: 18px" src="dispo.png">
                            <h7 class="mt-2">Disponible : 70</h7>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card ms-4 bg-primary-subtle text-white">
                        <div class="card-header bg-primary align-content-center">
                            <h3>Clavier</h3>
                        </div>
                        <div class="card-footer bg-primary pb-4">
                            <img style="width: 18px" src="dispo.png">
                            <h7 class="mt-2">Disponible : 50</h7>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h4 class="h2">Etat actuel</h4>
        </div>
    </div>
    <script src="JS/dashboard.js"></script>
@endsection
