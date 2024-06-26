@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-around mt-5">
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
    <script src="JS/dashboard.js"></script>
@endsection
