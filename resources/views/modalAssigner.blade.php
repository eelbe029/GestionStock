
<fieldset disabled>
    <legend>Article a assigner:</legend>
    <div class="mb-3">
        <input type="text" id="disabledTextInput" placeholder="{{$article->marque->name}}" class="form-control">
        <input type="text" id="disabledTextInput" placeholder="{{$article->Model}}" class="form-control mt-2">
    </div>
</fieldset>
    <legend>Informations a renseinger:</legend>
    <div class="mb-3">
        <div class="mb-3">
            <select type="text" id="search" name="emplacement" placeholder="Emplacement (Service ou Agence)" class="js-example-basic-single form-control ">
                @foreach($employees AS $emp)
                    <option>{{$emp->emplacement}}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <select type="text" name="nom" placeholder="Nom de l'employee" class="js-example-basic-single form-control ">
                @foreach($employees AS $emp)
                    <option>{{$emp->nom}}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="articleID" value="{{$article->id}}">
    </div>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            dropdownParent: $('#staticBackdrop'),
            width:'resolve'
        });
    });
</script>
