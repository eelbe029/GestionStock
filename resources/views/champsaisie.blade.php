<div class="card-footer bg-light">
    <div class="d-flex">
        <select name="type-{{$val}}" class="form-control js-example-basic-single-{{$val}}">
            @foreach($collection as $type)
                <option>{{$type->name}}</option>
            @endforeach
        </select>
        <button type="button" class="assign ms-1 btn btn-outline-success btn-sm" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">+
        </button>
    </div>
    <div class="d-flex mt-3">
        <select name ="marque-{{$val}}" class="form-control mt-3 js-example-basic-single-{{$val}}">
            @foreach($marques as $marque)
                <option>{{$marque->name}} </option>
            @endforeach
        </select>
        <button type="button" class="assign2 btn btn-outline-success ms-1 btn-sm" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">+
        </button>
    </div>
    <input class="form-control mt-3" name="model-{{$val}}" placeholder="Model">
    <input class="form-control mt-3" name="nombre-{{$val}}" placeholder="Nombre">
</div>

