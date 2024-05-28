const el2 = document.getElementById('el2')
el2.classList.remove('text-white')
el2.classList.add('active')

$(function() {
    $('#tableArticles').DataTable({
        processing: true,
        serverSide: true,
        ajax: "articledata",
        columns: [
            { data: 'ID', name: 'ID' },
            { data: 'marque', name: 'marque' },
            { data: 'model', name: 'model'},
            { data: 'type', name: 'type' },
            { data: 'actions', name: 'actions'}
        ]
    });
});
