@extends('layouts.app')

@section('content')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h2">Articles en stock</h4>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">blank</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">placeholder</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                placeholder
            </button>
        </div>
    </div>
    <div class="card text-bg-light mt-5">
        <div class="card-header">DataTable :</div>

        <div class="card-body">
            <table class="table table-bordered table-hover" id="tableArticles">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Marque</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script src="JS/articlesenstock.js"></script>
@endsection
