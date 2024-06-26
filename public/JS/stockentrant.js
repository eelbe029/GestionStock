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

$(document).on('click', '.ajt', function() {
    valeur = document.getElementsByClassName('ajt')[0].value
    $.ajax({
        url : "champsaisie/" + valeur,
        method: "GET",
        success: function(response){
            document.getElementById('f').innerHTML += response
            $(document).ready(function() {
                $('.js-example-basic-single-'+valeur).select2({
                    height: 200
                });
            });
            document.getElementsByClassName('ajt')[0].value = Number(valeur) + 1
        }
    })
})

