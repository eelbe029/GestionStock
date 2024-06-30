const el1 = document.getElementById('el1')
el1.classList.remove('text-white')
el1.classList.add('active')

window.onload = function () {
    $.ajax({
        type: "GET",
        url: "graphdisp",
        success: function(response){
            datagraph = []
            for (let i = 0; i < response.length; i++) {
                datagraph.push({
                    label: response[i].name,
                    y: response[i].QteDisponible
                })
            }
            var options = {
                animationEnabled: true,
                title: {
                    text: "Diversite actuelle du stock"
                },
                data: [{
                    type: "doughnut",
                    innerRadius: "40%",
                    showInLegend: true,
                    legendText: "{label}",
                    indexLabel: "{label}: #percent%",
                    dataPoints: datagraph
                }]
            }
            $("#chartContainer").CanvasJSChart(options);
        }
    })

}
