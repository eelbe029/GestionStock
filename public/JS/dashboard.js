const el1 = document.getElementById('el1')
el1.classList.remove('text-white')
el1.classList.add('active')

window.onload = function () {

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
            dataPoints: [
                { label: "Ordinateurs", y: 5594 },
                { label: "Claviers", y: 4000 },
                { label: "Souris", y: 4000 },
                { label: "Routeurs", y: 57 },
                { label: "Reste", y: 390 }
            ]
        }]
    };
    $("#chartContainer").CanvasJSChart(options);

}
