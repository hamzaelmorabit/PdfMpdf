var options = {
  chart: {
    type: "bar",
  },
  series: [
    {
      name: "sales",
      data: [30, 40, 35, 50, 49, 60, 70, 91, 125],
    },
  ],
  xaxis: {
    categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999],
  },
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

// $(document).ready(function () {
//   $.ajax({
//     url: "http://localhost/testPhp/data.php",
//     method: "GET",
//     success: function (data) {
//       console.log(data);
//       var player = [];
//       var score = [];

//       for (var i in data) {
//         player.push("Player " + data[i].playerid);
//         score.push(data[i].score);
//       }

//       var chartdata = {
//         labels: player,
//         datasets: [
//           {
//             label: "Player Score",
//             backgroundColor: "rgba(200, 200, 200, 0.75)",
//             borderColor: "rgba(200, 200, 200, 0.75)",
//             hoverBackgroundColor: "rgba(200, 200, 200, 1)",
//             hoverBorderColor: "rgba(200, 200, 200, 1)",
//             data: score,
//           },
//         ],
//       };

//       var ctx = $("#mycanvas");

//       var barGraph = new Chart(ctx, {
//         type: "bar",
//         data: chartdata,
//       });
//     },
//     error: function (data) {
//       console.log(data);
//     },
//   });
// });




/* 
<!-- <?php // content="text/plain; charset=utf-8"
require_once('src/jpgraph.php');
require_once('src/jpgraph_line.php');

$datay = array(0, 25, 12, 47, 27, 27, 0);

// Setup the graph
$graph = new Graph(350, 250);
$graph->SetScale("intlin", 0, $aYMax = 50);

$theme_class = new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->SetMargin(40, 40, 50, 40);

$graph->title->Set('Inverted Y-axis');
$graph->SetBox(false);
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false, false);

// For background to be gradient, setfill is needed first.
$graph->ygrid->SetFill(true, '#FFFFFF@0.5', '#FFFFFF@0.5');
$graph->SetBackgroundGradient('#FFFFFF', '#00FF7F', GRAD_HOR, BGRAD_PLOT);

$graph->xaxis->SetTickLabels(array('17/03/2021
', '', '', '', '', '', '17/03/2021
'));
$graph->xaxis->SetLabelMargin(30);
$graph->yaxis->SetLabelMargin(20);

$graph->SetAxisStyle(AXSTYLE_BOXOUT);
$graph->img->SetAngle(180);

// Create the line
$p1 = new LinePlot($datay);
$graph->Add($p1);

$p1->SetFillGradient('#FFFFFF', '#F0F8FF');
$p1->SetColor('#aadddd');

// Output line
$graph->Stroke();

?> -->
 */