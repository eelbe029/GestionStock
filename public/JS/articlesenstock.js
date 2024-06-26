

const el3 = document.getElementById('el3')
el3.classList.remove('text-white')
el3.classList.add('active')

$(function() {
    $('#tableArticles').DataTable({
        processing: true,
        serverSide: true,
        ajax: "articledata",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'marque', name: 'marque' },
            { data: 'Model', name: 'Model'},
            { data: 'type', name: 'type' },
            { data: 'actions', name: 'actions'}
        ]
    });
});
$(document).on('click', '.assign', function() {
    var id = $(this).data('id')
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
});

$(document).on('click', '.historique', function() {
    const id = $(this).data('id');
    $.ajax({
        url: "historique/"+id,
        method: "GET",
        success: function(response){
            let i = 0;
            myEvents = []
            $.each(response, function(index, value){
                myEvents.push({
                    date: response[i].DateAssignement,
                    content: response[i].personnel.nom
                })
                myEvents.push({
                    date: response[i].DateDissociation,
                    content: "Dissocie"
                })
                i++
            })
            $('#my-timeline').roadmap(myEvents,{
                eventsPerSlide: 3,
                slide: 1,
                prevArrow: '<button class="prev btn btn-sm btn-outline-primary"> < </button>',
                nextArrow: '<button class="next btn btn-sm btn-outline-primary"> > </button>'
            })
        }})
})
