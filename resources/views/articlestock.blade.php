@extends('layouts.app')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <form method="GET" action="{{route('articleassign')}}">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Assigner a un employe</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="injectmodal">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" id="subform" class="btn btn-primary">Assigner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Deuxieme Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Historique de l'article</h5>
                </div>
                <div class="modal-body" id="my-timeline">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Body -->
    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h4 class="h2">Articles en stock</h4>

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
