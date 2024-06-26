

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
var myEvents = [
    {
        date: 'Q1 - 2018',
        content: 'Lorem ipsum dolor sit amet'
    },
    {
        date: 'Q2 - 2018',
        content: 'Lorem ipsum dolor sit amet'
    },
    {
        date: 'Q3 - 2018',
        content: 'Lorem ipsum dolor sit amet'
    },
    {
        date: 'Q4 - 2018',
        content: 'Lorem ipsum dolor sit amet'
    }
];


const modalhist = document.getElementById('userModal');

$(document).on('click', '.historique', function() {
    const id = $(this).data('id');
    $.ajax({
        url: "historique/"+id,
        method: "GET",
        success: function(response){
            let i = 0;
            const j = 0;
            var myEvents = response.map(function(item){
                if (i%2 === 0){
                    i++
                    return {
                        date: item.DateAssignement,
                        content: item.personnel.nom
                    }
                }
                else {
                    i++
                    return {
                        date: item.DateDissociation ,
                        content:"dissocie"
                    }
                }


            })

            $('#my-timeline').roadmap(myEvents,{
                eventsPerSlide: 3,
                slide: 1,
                prevArrow: '<button class="prev btn btn-sm btn-outline-primary">Previous</button>',
                nextArrow: '<button class="next btn btn-sm btn-outline-primary">Next</button>'
            })
        }})
})
