/* 
<!-- <?php header('Access-Control-Allow-Origin: *'); ?>
<?php echo $string = '{
  "name":"hamza",
  "age":"33,}'; ?> --> */
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

/* 

  {
    "type": "section",
    "left_text": "Patient Profile",
    "right_text": "",
    "columns": "2",
    "values": [
      {
        "type": "key_value",
        "key": "Name",
        "value": "Image Test"
      },
      {
        "type": "key_value",
        "key": "MRN",
        "value": "1"
      },
      {
        "type": "key_value",
        "key": "DOB",
        "value": "17/03/2021"
      },
      {
        "type": "key_value",
        "key": "Location",
        "value": ""
      },

      {
        "type": "key_value",
        "key": "Compte",
        "value": "0/M"
      },
      { "type": "key_value", "key": "Compte1", "value": "" },
      {
        "type": "key_value",
        "key": "Compte1",
        "value": ""
      },

      {
        "type": "key_value",
        "key": "Compte12",
        "value": "Hamza"
      },

      {
        "type": "key_value",
        "key": "Wound",
        "value": "Wound test"
      }
    ]
  },

  {
    "type": "section",
    "left_text": "Wound",
    "right_text": "",
    "columns": "2",
    "values": [
      {
        "type": "key_value",
        "key": "Etiology",
        "value": "Diabetic"
      },
      {
        "type": "key_value",
        "key": "Onset Date",
        "value": "17/03/2021"
      },
      {
        "type": "key_value",
        "key": "Location",
        "value": "Elbow, Right"
      },
      {
        "type": "key_value",
        "key": "Assessment",
        "value": "07/05/2021 11:35"
      },

      {
        "type": "key_value",
        "key": "Status",
        "value": "Active"
      },
      {
        "type": "key_value",
        "key": "Clinician",
        "value": ""
      },
      {
        "type": "key_value",
        "key": "Facility acquired",
        "value": "No"
      }
    ]
  },

  {
    "type": "images",
    "left_text": "Images",
    "right_text": "17/03/2021 04:41 PM",
    "columns": "2",
    "values": [
      {
        "type": "key_value",
        "key": "Initial",
        "value": "17/03/2021 04:38 PM"
      },
      {
        "type": "key_value",
        "key": "Current",
        "value": "17/03/2021 04:41 PM"
      },

      {
        "type": "image",
        "key": "",
        "value": "./images/woundFinal.png"
      },

      {
        "type": "image",
        "key": "",
        "value": "./images/woundInitial.png"
      },
      {
        "type": "key_value",
        "key": "L x W x D",
        "value": "6.3 x 7.8 x 1.4 cm³"
      },
      {},
      {
        "type": "key_value",
        "key": "Area",
        "value": "35.8 cm²"
      },
      {},
      {
        "type": "key_value",
        "key": "Volume",
        "value": "50 cm³"
      },
      {},
      {
        "type": "key_value",
        "key": "Type",
        "value": "Regular"
      }
    ]
  },
  
  
   {
    "type": "graph",
    "left_text": "Images",
    "right_text": "17/03/2021 04:41 PM",
    "columns": "2",
    "values": [
      {
        "type": "key_value",
        "key": "Max depth",
        "value": ""
      },
      {
        "type": "key_value",
        "key": "Area",
        "value": ""
      },

      {
        "type": "graph",
        "key": "",
        "val1": 1.4,
        "val2": 1.5,
        "val3": 1.3,
        "val4": 1.4,
        "valMax": 2,
        "colorTop": "247377",
        "color": "56a1b7"
      },
      {
        "type": "graph",
        "key": "",
        "val1": 35.8,
        "val2": 36.5,
        "val3": 37.1,
        "val4": 36,
        "valMax": 40,
        "color": "ffc850",
        "colorTop": "fad000"
      },
      {
        "type": "key_value",
        "key": "Volume",
        "value": ""
      },
      {
        "type": "key_value",
        "key": "Tissue",
        "value": ""
      },
      {
        "type": "graph",
        "key": "",
        "val1": 50,
        "val2": 31.7,
        "val3": 48.3,
        "val4": 36,
        "valMax": 60,
        "color": "B3D4FC",
        "colorTop": "2487ff"
      },

      {
        "type": "graph_area",
        "key": "",

        "granulation": 77,
        "slough": 16,
        "eschar": 7,
        "colorTop": "247377",
        "color": "6495ED"
      }
    ]
  }
  */
