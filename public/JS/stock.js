const el2 = document.getElementById('el2')
el2.classList.remove('text-white')
el2.classList.add('active')

$(function() {
    $('#tableArticles').DataTable({
        processing: true,
        serverSide: true,
        ajax: "generalstockview",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'QteDisponible', name: 'QteDisponible' },
            { data: 'QteSortante', name: 'QteSortante' }
        ]
    });
});
