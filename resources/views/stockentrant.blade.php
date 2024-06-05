@extends('layouts.app')

@section('content')
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
                        <div class="input-group mb-3">
                            <select class="form-control js-example-basic-single">
                                @foreach($collection as $type)
                                    <option>{{$type->name}}</option>
                                @endforeach
                            </select>
                            <button type="button" class="btn btn-outline-primary btn-sm">Nouveau type</button>
                        </div>
                        <div class="input-group mb-3">
                            <select class="form-control mt-2 js-example-basic-single">
                                @foreach($marques as $marque)
                                    <option>{{$marque->Marque}}</option>
                                @endforeach
                            </select>
                            <button type="button" class="btn btn-outline-primary btn-sm">Nouvelle marque</button>
                        </div>
                        <input class="form-control mt-2" placeholder="Nombre">
                    </div>
                    <div class="card-footer bg-light">
                        <button type="submit" class=" btn btn-primary">Continuer</button>
                    </div>
                </form>
            </div>
            <div class="card text-bg-light  col">
                <div class="card-body">

                </div>
            </div>
        </div>

    </div>
    <script src="JS/stockentrant.js"></script>
@endsection
