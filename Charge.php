<?php
// // include('phpFiles.php');
// require __DIR__ . '/vendor/autoload.php';
// $mpdf = new \Mpdf\Mpdf();

// 			// $mpdf->showWatermarkText = true;
// $html = file_get_contents('./phpFiles.php');
// $myVar = htmlspecialchars($html, ENT_QUOTES);
// // echo($myVar);
// 		$mpdf->WriteHTML('<watermarktext content="DRAFT" alpha="0.4" />');

// 		$mpdf->SetFooter('Document Title');
// 		//  $html=$this->load->view('welcome_message');
// 		$mpdf->WriteHTML($html);
// 		$mpdf->Output();

  require_once __DIR__ . '/vendor/autoload.php';

  $mpdf = new \Mpdf\Mpdf();

$html = '<bookmark content="Start of the Document" /><div>Section 1 text</div>';

 $mpdf->Image('./images/frontcover.png', 220, 220, 210, 297, 'png', '', true, false);

	$mpdf->Output();

        
        ?>  




		
<!--

<?php

$obj_1 = array("one" => "One", "two" => "Two", "three" => "Three");
$obj_2 = array("one" => "Four", "two" => "Five", "three" => "Six");
$obj_3 = array("one" => "Seven", "two" => "Eight", "three" => "Nine");

$obj_4 = array("one" => "One", "two" => "Two", "three" => "Three");
$obj_5 = array("one" => "Four", "two" => "Five", "three" => "Six");
$obj_6 = array("one" => "Seven", "two" => "Eight", "three" => "Nine");
class store {
    var $name = 'Name.';
    var $price = 'I am bar.';
    var $description   = 'I am r.';
}

$store = new store();




$html.='<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">
		table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			}

			td, th {
			  border: 1px solid #dddddd;
			  text-align: left;
			  padding: 8px;
			}

			tr:nth-child(even) {
			  background-color: #dddddd;
			}
			img{
				max-width: 50px; height: auto; display: block;
			}
	</style>
</head>
<body>
	  <div id="chart" name="report"></div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<div id="container">
	<!-- <div class="char"></div> -->
		<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<table >
			<tr>
				<td>no</td>
				<td>name</td>
				<td>price</td>
				<td>description</td>
		
			</tr>
			<tbody>'.
				$i=1;

              for ($i=1; $i < 7; $i++) {

  foreach (${"obj_".$i} as $key => $value) {
       
					
				
				'<tr>
                <td>'.  $i++.'</td>
				<td>'.   $value.'</td>
				<td>'.  $value.'</td>
				<td>'.   $value.'</td></tr>'.}}
$html.=				
		
'

			
		
			</tbody>
		</table>

</div>
	<script>
var options = {
    series: [{
  data: [{
    x: new Date("2018-02-12").getTime(),
    y: 76
  }, {
    x: new Date("2018-02-12").getTime(),
    y: 76
  }]
}], 
series: [23, 11, 54, 72, 12],
labels: ["Apple", "Mango", "Banana", "Papaya", "Orange"]
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

</script>
</body>
</html>';

 require_once __DIR__ . '/vendor/autoload.php';

  $mpdf = new \Mpdf\Mpdf();

// $html = '<bookmark content="Start of the Document" /><div>Section 1 text</div>';

 $mpdf->Image('./images/frontcover.png', 220, 220, 210, 297, 'png', '', true, false);
		$mpdf->WriteHTML($html);
		$mpdf->Output();

?>
  -->