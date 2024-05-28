const el3 = document.getElementById('el3')
el3.classList.remove('text-white')
el3.classList.add('active')

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
