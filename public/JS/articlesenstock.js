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
})
$(document).on('click', '.assign', function() {
    var id = $(this).data('id');
    $.ajax({
        url: "articlemodal/"+id,
        method: "GET",
        success: function(response){
            console.log('test')
            $('#injectmodal').html(response)
        },
        error: function(xhr){
            console.log('tjjjjjj');
            console.error(xhr.responseText)
        }
    });
})
