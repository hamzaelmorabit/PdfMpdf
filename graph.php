<?php // content="text/plain; charset=utf-8"

require_once('src/jpgraph.php');
require_once('src/jpgraph_line.php');

$datay1 = array(
    // $_GET['para0'],
    // $_GET['para1'],
    // $_GET['para2'],
    // $_GET['para3'],
    60, 0, 48.3, 36
);
$datay2 = array(
    60, 0, 48.3, 36
);

// Setup the graph
$graph = new Graph(335, 200);
$graph->SetScale("textlin");

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

$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetFillGradient('#B3D4FC', '#B3D4FC');
$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();
