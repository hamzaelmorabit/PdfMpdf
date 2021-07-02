<?php // content="text/plain; charset=utf-8"
require_once('src/jpgraph.php');
require_once('src/jpgraph_line.php');

$datay2 = array(
    $_GET['granulation'] + $_GET['slough'], 90, 92, 90
);
$datay1 = array($_GET['granulation'], 77, 73, 77);

$datay3 = array(100, 100, 100, 100);
$datay4 = array(105, 105, 105, 105);
$datay5 = array(0, 10, 0, 0);

// Setup the graph
$graph = new Graph(335, 200);
$graph->SetScale("textlin");

$graph->img->SetAntiAliasing(false);
// $graph->title->Set('Filled Y-grid');
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
// $graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("red");
// $p1->SetLegend('Line 1');
$p1->SetFillGradient('#ff6a89', '#ff6a89'); #red

// Create the second line
$p2 = new LinePlot($datay2);
$p2->SetColor("#f3be57");
$p2->SetFillGradient('#f3be57', '#f3be57');

$p3 = new LinePlot($datay3);
$graph->Add($p3);
$p3->SetColor("#B3D4FC");
$p3->SetFillGradient('#B3D4FC', '#B3D4FC');

$p4 = new LinePlot($datay4);
$p5 = new LinePlot($datay5);
// $p5->SetColor("white");
$graph->Add($p5);
$graph->Add($p4);
$p4->SetColor("white");
$graph->Add($p2);
$graph->Add($p1);
$graph->legend->SetFrameWeight(1);

$graph->Stroke();
