@extends('layouts.app')

@section('content')
    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h4 class="h2">Stock Detaille</h4>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href = "/stock" type="button" class="btn btn-outline-primary d-flex align-items-center gap-1" id="Modifier table">
                    Vue Generale
                </a>
            </div>
        </div>
        <div class="card text-bg-light mt-5">
            <div class="card-header">DataTable :</div>

            <div class="card-body">
                <table class="table table-bordered table-hover" id="tableArticles">
                    <thead>
                    <tr>
                        <th>Type</th>
                        <th>Marque</th>
                        <th>Model</th>
                        <th>Quantite Totale</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <script src="JS/stockdetails.js"></script>
@endsection
