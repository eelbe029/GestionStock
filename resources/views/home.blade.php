@extends('layouts.app')

@section('content')

    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h4 class="h2">Alertes</h4>
        </div>
        <div class="text-bg-light mt-5 container">
            <div class="row">
                <div class="col">
                    <div class="card me-4 bg-danger-subtle text-white">
                        <div class="card-header bg-danger align-content-center">
                            <h3>Routeur</h3>
                        </div>
                        <div class="card-footer bg-danger  pb-4">
                            <img style="width: 18px" src="dispo.png">
                            <h7 class="mt-2">Disponible : 2</h7>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-warning-subtle text-white">
                        <div class="card-header bg-warning align-content-center">
                            <h3>Clavier</h3>
                        </div>
                        <div class="card-footer bg-warning pb-4">
                            <img style="width: 18px" src="dispo.png">
                            <h7 class="mt-2">Disponible : 10</h7>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card ms-4 bg-primary-success text-white">
                        <div class="card-header bg-success align-content-center">
                            <h3>Ordinateurs</h3>
                        </div>
                        <div class="card-footer bg-success  pb-4">
                            <img style="width: 18px" src="dispo.png">
                            <h7 class="mt-2">Disponible : 100</h7>
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
