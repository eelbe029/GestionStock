const el1 = document.getElementById('el1')
el1.classList.remove('text-white')
el1.classList.add('active')

window.onload = function () {
    $.ajax({
        type: "GET",
        url: "graphdisp",
        success: function(response){
            data = []
            response.forEach((item,index)=>{
                data.push({
                    label: item.name,
                    y: item.QteDisponible
                })
            })
            var options = {
                animationEnabled: true,
                title: {
                    text: "Diversite actuelle du stock"
                },
                data
            }
            $("#chartContainer").CanvasJSChart(options);
        }
    })

}
