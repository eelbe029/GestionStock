@extends('layouts.app')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content" id="injectmodal">
            </div>
        </div>
    </div>
    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h4 class="h2">Saisie de stock entrant</h4>
            <div class="btn-toolbar mb-2 mb-md-0">

            </div>
        </div>
        <div class="container d-flex">
            <div class="card text-bg-light  col me-5">
                <div class="card-header">
                    Article a saisir
                </div>
                <form>
                    <div class="card-body ">
                        <div class="d-flex">
                            <select class="form-control js-example-basic-single">
                                @foreach($collection as $type)
                                    <option>{{$type->name}}</option>
                                @endforeach
                            </select>
                            <button type="button" class="assign ms-1 btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+</button>
                        </div>
                        <div class="d-flex mt-3">
                            <select class="form-control mt-3 js-example-basic-single">
                                @foreach($marques as $marque)
                                    <option>{{$marque->Marque}}</option>
                                @endforeach
                            </select>
                            <button type="button" class="assign2 btn btn-outline-success ms-1 btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+</button>
                        </div>
                        <input class="form-control mt-3" placeholder="Model">
                        <input class="form-control mt-3" placeholder="Nombre">
                    </div>
                    <div class="card-footer bg-light">
                        <button type="submit" class=" btn btn-primary">Continuer</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script src="JS/stockentrant.js"></script>
@endsection
