
<fieldset disabled>
    <legend>Article a assigner:</legend>
    <div class="mb-3">
        <input type="text" id="disabledTextInput" placeholder="{{$article->marque->name}}" class="form-control">
        <input type="text" id="disabledTextInput" placeholder="{{$article->Model}}" class="form-control mt-2">
    </div>
</fieldset>
    <legend>Informations a renseinger:</legend>
    <div class="mb-3">
        <input type="text" id="search" name="emplacement" placeholder="Emplacement (Service ou Agence)" class="form-control">
        <input type="text" name="nom" placeholder="Nom de l'employee" class="form-control mt-2">

        <input type="hidden" name="articleID" value="{{$article->id}}">
    </div>

