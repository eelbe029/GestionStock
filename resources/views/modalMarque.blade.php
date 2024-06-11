
<form method="GET" action="{{route('nouvelleMarque')}}">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajout d'une nouvelle marque</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body" >
        Saisissez le nom de la Marque a ajouter :
        <input class="form-control" placeholder="marque" name="name">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" id="subform" class="btn btn-primary">Ajouter</button>
    </div>
</form>
