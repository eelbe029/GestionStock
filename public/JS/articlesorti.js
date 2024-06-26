const el4 = document.getElementById('el4')
el4.classList.remove('text-white')
el4.classList.add('active')
$(function() {
    $('#tableArticles').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/articlesortidata",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'marque', name: 'marque' },
            { data: 'Model', name: 'Model'},
            { data: 'type', name: 'type' },
            { data: 'emplacement', name: 'emplacement'},
            { data: 'nom', name: 'nom' },
            { data: 'actions', name: 'actions'}
        ]
    });
});
$(document).on('click', '.delete', function() {
    var HistoricId = $(this).data('id');
    if (confirm('Êtes-vous sûr de vouloir dissocier?')) {
        $.ajax({
            url: "dissocier/"+HistoricId,
            method: "GET",
            success: function(response){
                $('#tableArticles').DataTable().destroy();
            },
            error: function(xhr){
                console.error(xhr.responseText)
            }
        });
        $('#tableArticles').DataTable().ajax.reload();
    }
});
