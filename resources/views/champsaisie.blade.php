<div class="card-footer bg-light">
    <div class="d-flex">
        <select class="form-control js-example-basic-single">
            @foreach($collection as $type)
                <option>{{$type->name}}</option>
            @endforeach
        </select>
        <button type="button" class="assign ms-1 btn btn-outline-success btn-sm" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">+
        </button>
    </div>
    <div class="d-flex mt-3">
        <select class="form-control mt-3 js-example-basic-single">
            @foreach($marques as $marque)
                <option>{{$marque->name}} </option>
            @endforeach
        </select>
        <button type="button" class="assign2 btn btn-outline-success ms-1 btn-sm" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">+
        </button>
    </div>
    <input class="form-control mt-3" placeholder="Model">
    <input class="form-control mt-3" placeholder="Nombre">
</div>
