// $( document ).ready(function() {
    
//     var ctx1 = document.getElementById("chart1").getContext("2d");
//     var data1 = {
//         labels: ["January", "February", "March", "April", "May", "June", "July"],
//         datasets: [
//             {
//                 label: "My Second dataset",
//                 fillColor: "rgba(243,245,246,0.9)",
//                 strokeColor: "rgba(243,245,246,0.9)",
//                 pointColor: "rgba(243,245,246,0.9)",
//                 pointStrokeColor: "#fff",
//                 pointHighlightFill: "#fff",
//                 pointHighlightStroke: "rgba(243,245,246,0.9)",
//                 data: [0, 48, 40, 19, 86, 27, 90]
//             }],
        
//     };
//     // Chart.types.Line.extend({
//     //   name: "LineAlt",
//     //   initialize: function () {
//     //     Chart.types.Line.prototype.initialize.apply(this, arguments);

//     //     var ctx = this.chart.ctx;
//     //     var originalStroke = ctx.stroke;
//     //     ctx1.stroke = function () {
//     //       ctx1.save();
//     //       ctx1.shadowColor = 'rgba(0, 0, 0, 0.4)';
//     //       ctx1.shadowBlur = 10;
//     //       ctx1.shadowOffsetX = 8;
//     //       ctx1.shadowOffsetY = 8;
//     //       originalStroke.apply(this, arguments)
//     //       ctx1.restore();

//     //     }
//     //   }
//     // });
//     var chart1 = new Chart(ctx1).LineAlt(data1, {
//         scaleShowGridLines : true,
//         scaleGridLineColor : "rgba(0,0,0,.005)",
//         scaleGridLineWidth : 0,
//         scaleShowHorizontalLines: true,
//         scaleShowVerticalLines: true,
//         bezierCurve : true,
//         bezierCurveTension : 0.4,
//         pointDot : true,
//         pointDotRadius : 4,
//         pointDotStrokeWidth : 2,
//         pointHitDetectionRadius : 2,
//         datasetStroke : true,
// 		tooltipCornerRadius: 2,
//         datasetStrokeWidth : 0,
//         datasetFill : false,
//         legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
//         responsive: true
//     });
    
// });