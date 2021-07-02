<?php // content="text/plain; charset=utf-8"

require_once('src/jpgraph.php');
require_once('src/jpgraph_line.php');

// $datay1 = array(

//     $_GET['val1'],

//     $_GET['val2'],
//     $_GET['val3'],
//     $_GET['val4'],
//     // 60, 0, 48.3, 36
//     // 1.4, 1.5, 1.3,  1.4
//     // 35.8,   36.5, 37.1, 36
// );
$datay2 = array(
    // 60, 0, 48.3, 36
    // 2, 0, 0, 0
    $_GET['valMax'], 0, 0, 0

);

// Setup the graph
$graph = new Graph(335, 200);
$graph->SetScale("textlin");
// $graph->SetScale('intlin');

$theme_class = new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->SetBox(false);
$graph->ygrid->SetFill(true, '#FFFFFF@0.5', '#FFFFFF@0.5');
$graph->SetMargin(30, 10, 10, 25);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false, false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels(array('               17/03/2021', '', '', '17/03/2021               '));
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line

// $p1->SetLegend('Line 1');


$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#fff");

$p1 = new LinePlot(explode(",",substr($_GET['values'] , 1, strlen($_GET['values']) - 2)));
$graph->Add($p1);
$p1->SetColor("#" . $_GET['colorTop']); # 6495ED
// $p1->SetFillGradient('#B3D4FC', '#B3D4FC');
$p1->SetFillGradient(
    "#" . $_GET['color'],
    "#" . $_GET['color']
);
// $p1->SetFillGradient('#247377', '#247377');
$graph->legend->SetFrameWeight(1);
#247377
// Output line
$graph->Stroke();


// {
//     "type": "section",
//     "left_text": "Patient Profile",
//     "right_text": "",
//     "columns": "2",
//     "values": [
//       {
//         "type": "key_value",
//         "key": "Name",
//         "value": "Image Test"
//       },
//       {
//         "type": "key_value",
//         "key": "MRN",
//         "value": "1"
//       },
//       {
//         "type": "key_value",
//         "key": "DOB",
//         "value": "17/03/2021"
//       },
//       {
//         "type": "key_value",
//         "key": "Location",
//         "value": ""
//       },

//       {
//         "type": "key_value",
//         "key": "Compte",
//         "value": "0/M"
//       },
//       { "type": "key_value", "key": "Compte1", "value": "" },
//       {
//         "type": "key_value",
//         "key": "Compte1",
//         "value": ""
//       },

//       {
//         "type": "key_value",
//         "key": "Compte12",
//         "value": "Hamza"
//       },

//       {
//         "type": "key_value",
//         "key": "Wound",
//         "value": "Wound test"
//       }
//     ]
//   },

//   {
//     "type": "section",
//     "left_text": "Wound",
//     "right_text": "",
//     "columns": "2",
//     "values": [
//       {
//         "type": "key_value",
//         "key": "Etiology",
//         "value": "Diabetic"
//       },
//       {
//         "type": "key_value",
//         "key": "Onset Date",
//         "value": "17/03/2021"
//       },
//       {
//         "type": "key_value",
//         "key": "Location",
//         "value": "Elbow, Right"
//       },
//       {
//         "type": "key_value",
//         "key": "Assessment",
//         "value": "07/05/2021 11:35"
//       },

//       {
//         "type": "key_value",
//         "key": "Status",
//         "value": "Active"
//       },
//       {
//         "type": "key_value",
//         "key": "Clinician",
//         "value": ""
//       },
//       {
//         "type": "key_value",
//         "key": "Facility acquired",
//         "value": "No"
//       }
//     ]
//   },

//   {
//     "type": "images",
//     "left_text": "Images",
//     "right_text": "17/03/2021 04:41 PM",
//     "columns": "2",
//     "values": [
//       {
//         "type": "key_value",
//         "key": "Initial",
//         "value": "17/03/2021 04:38 PM"
//       },
//       {
//         "type": "key_value",
//         "key": "Current",
//         "value": "17/03/2021 04:41 PM"
//       },

//       {
//         "type": "image",
//         "key": "",
//         "value": "./images/woundFinal.png"
//       },

//       {
//         "type": "image",
//         "key": "",
//         "value": "./images/woundInitial.png"
//       },
//       {
//         "type": "key_value",
//         "key": "L x W x D",
//         "value": "6.3 x 7.8 x 1.4 cm³"
//       },
//       {},
//       {
//         "type": "key_value",
//         "key": "Area",
//         "value": "35.8 cm²"
//       },
//       {},
//       {
//         "type": "key_value",
//         "key": "Volume",
//         "value": "50 cm³"
//       },
//       {},
//       {
//         "type": "key_value",
//         "key": "Type",
//         "value": "Regular"
//       }
//     ]
//   },

//   {
//     "type": "Assessments",
//     "left_text": "Assessments",
//     "right_text": "",
//     "columns": "1",
//     "values": [
//       {
//         "type": "key_value",
//         "key": "Wound edge",
//         "value": "Rolled, Epithelialized"
//       },
//       {},
//       {
//         "type": "key_value",
//         "key": "Peri-wound",
//         "value": "Erythema, Ecchymosis, Indurated"
//       },
//       {},

//       {
//         "type": "key_value",
//         "key": "Pain",
//         "value": "4 - With-movement"
//       },
//       {},

//       {
//         "type": "key_value",
//         "key": "Drainage",
//         "value": "Minimum: Sanguineous"
//       },
//       {},
//       {
//         "type": "key_value",
//         "key": "Odor",
//         "value": "Malodorous"
//       },
//       {},
//       {
//         "type": "key_value",
//         "key": "Infection",
//         "value": "YES"
//       },
//       {},
//       {
//         "type": "key_value",
//         "key": "Clinical",
//         "value": "DP L:Biphasic, PT L:Biphasic, AB L:2, DP R:Biphasic, PT R:1+, AB R:3, BG:23"
//       },
//       {},
//       {
//         "type": "key_value",
//         "key": "Tunneling",
//         "value": "Direction 5,2 - 23 cm"
//       },
//       {},
//       {
//         "type": "key_value",
//         "key": "Undermining",
//         "value": "Direction 5,2 - 23 cm"
//       },
//       {},
//       {
//         "type": "key_value",
//         "key": "Stage",
//         "value": "N/A"
//       },
//       {},
//       {
//         "type": "key_value",
//         "key": "Non-removable",
//         "value": "No"
//       },
//       {},
//       {
//         "type": "key_value",
//         "key": "device/dressing",
//         "value": "Regular"
//       },
//       {},
//       {
//         "type": "key_value",
//         "key": "Push Score",
//         "value": "Regular"
//       },
//       {},
//       {
//         "type": "key_value",
//         "key": "Notes",
//         "value": "Account admin 07/05/2021 11:35 AM: Testy noyrd"
//       }
//     ]
//   },

//   {
//     "type": "images",
//     "left_text": "Images",
//     "right_text": "17/03/2021 04:41 PM",
//     "columns": "3",
//     "values": [
//       {
//         "type": "image",
//         "key": "22/12/2020",
//         "value": "./images/woundFinal.png"
//       },

//       {
//         "type": "image",
//         "key": "",
//         "value": "./images/woundInitial.png"
//       },
//       {
//         "type": "image",
//         "key": "22/12/2020",
//         "value": "./images/woundFinal.png"
//       },

//       {
//         "type": "z",
//         "key": "22/12/2020",
//         "value": "7/03/2021 04:40 PM"
//       },
//       {
//         "type": "z",
//         "key": "22/12/2020",
//         "value": "7/03/2021 04:42 PM"
//       },
//       {
//         "type": "z",
//         "key": "22/12/2020",
//         "value": "7/03/2021 05:41 PM"
//       },
//       {
//         "type": "image",
//         "key": "22/12/2020",
//         "value": "./images/woundFinal.png"
//       },

//       {
//         "type": "image",
//         "key": "",
//         "value": "./images/woundInitial.png"
//       },
//       {
//         "type": "image",
//         "key": "22/12/2020",
//         "value": "./images/woundFinal.png"
//       },

//       {
//         "type": "z",
//         "key": "22/12/2020",
//         "value": "7/03/2021 04:40 PM"
//       },
//       {
//         "type": "z",
//         "key": "22/12/2020",
//         "value": "7/03/2021 04:42 PM"
//       },
//       {
//         "type": "z",
//         "key": "22/12/2020",
//         "value": "7/03/2021 05:41 PM"
//       }
//     ]
//   },
