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
    eventsPerSlide: 4,
    orientation: 'auto'
});

