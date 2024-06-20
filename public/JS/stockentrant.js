const el5 = document.getElementById('el5')
el5.classList.remove('text-white')
el5.classList.add('active')
$(document).ready(function() {
    $('.js-example-basic-single').select2({
        height: 200
    });
});

$(document).on('click', '.assign', function() {
    $.ajax({
        url: "modalType",
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
$(document).on('click', '.assign2', function() {
    $.ajax({
        url: "modalMarque",
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

$('#my-timeline').roadmap(myEvents,{
    eventsPerSlide: 3,
    slide: 1,
    prevArrow: '<button class="prev">Previous</button>',
    nextArrow: '<button class="next">Next</button>'
});
$(document).on('click', '.ajt', function() {
    valeur = document.getElementsByClassName('ajt')[0].value
    document.getElementById('f').innerHTML += '<div class="card-footer bg-light">' +
        '<div class="d-flex">\n' +
        '                            <select class="form-control js-example-basic-single">\n' +
        '                                @foreach($collection as $type)\n' +
        '                                    <option>{{$type->name}}</option>\n' +
        '                                @endforeach\n' +
        '                            </select>\n' +
        '                            <button type="button" class="assign ms-1 btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+</button>\n' +
        '                        </div>' +
        '<div class="d-flex mt-3">\n' +
        '                            <select class="form-control mt-3 js-example-basic-single">\n' +
        '                                @foreach($marques as $marque)\n' +
        '                                    <option>{{$marque->name}} </option>\n' +
        '                                @endforeach\n' +
        '                            </select>\n' +
        '                            <button type="button" class="assign2 btn btn-outline-success ms-1 btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+</button>\n' +
        '                        </div>'+
        '<input class="form-control mt-3" placeholder="Model">\n' +
        '<input class="form-control mt-3" placeholder="Nombre">'+
        '</div>'
})

