<?php



// load dependencies via Composer
require __DIR__ . '/vendor/autoload.php';

// $jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';

// $obj = json_decode($jsonobj);

// echo $obj->Peter;
// echo $obj->Ben;
// echo $obj->Joe;

$string = file_get_contents("./data.json");
$json = json_decode($string, true);
$aaa = array(0 => 100);
$array = array(0 => 100, "color" => $aaa);
print_r(($array["color"][0]));
// Convert JSON string to Object
$someObject  = json_decode(json_encode($json), true);

echo "<pre>";
print_r($someObject[0]["type"]);
// echo "<pre>";
$item = array($someObject[1]["values"][1]); // Dump all data of the Object
// echo "<pre>";
// print_r(gettype($item));      // Dump all data of the Object
print_r(($item[0]));

function tableSection($someObject, $column1)
{
  $i = $column1;
  $title = $someObject[0]["type"];

  $seTableStr = '<table width="100%"       ><tbody>';

  foreach ($someObject[0]["values"] as $key => $val) {
    $seTableStr .= '<tr>';
    if (isset($val["type"]) && $i % 2 != 0) {
      $seTableStr .= '<td style="font-weight:bold;padding-top:2%">' . $val["key"] . '<td>';

      if ($val["type"] != 'image')
        $seTableStr .= '<td style="padding-left:43%;font-weight:bold;">' . $val["value"] . '</td>';
      else
        $seTableStr .= '<td style="padding-left:43%"><img src="' . $val['value'] . '" width="32%" /></td>';
    }
    $i++;
    $seTableStr .= '</tr>';
  }

  $seTableStr .= '</tbody></table>';

  return [$seTableStr, $title];
}

function section($headerType, $column1, $column2)
{
  $titleStyle = "title";
  if ($headerType != '') {
    $section =  '<div class=' . $titleStyle . '>' . $headerType . '</div>';
  }
  $section .=  '
            <table width="100%"
            style="border-bottom: 0px solid #000000; 
            vertical-align: top; 
            font-family: serif; font-size: 11px;">
            <tr>
            <td width="33%;">' . $column1 . '</td>

            <td width="10% ;color:red"></td>  
            <td width="33%;">' . $column2 . '</td>
            </tr></table>';

  return $section;
}
$section = section(tableSection($someObject, 1)[1], tableSection($someObject, 1)[0], tableSection($someObject, 0)[0]);

$x = 0;
$i = 0;
$y = 0;
echo $section;

//     while (isset($patient_profile[$y][$x])) {
//   echo "ff";

//         while (isset($patient_profile[$y][$x]) ) {
//   echo "<pre>";

// echo($patient_profile[$y][$x]);  
//   echo "</pre>";

//                   $x++;
//               }

//                 $x = 0;
//                 $i++;
//                 $y++;

// }
// 
// Dump all data of the Object
// print_r(($item[1]));      // Dump all data of the Object
echo "<pre>";
print_r(sizeof($someObject)); //      // Dump all data of the Object
echo "<pre>";
//   echo $someObject[0]->first_name;

// $array = json_decode($json, true);
// print_r($array);
// echo gettype($json[0]["values"]);
// echo '<br />';
// echo $json[0]["left_text"];
// echo '<br />';
// echo $json[0]["columns"];
// echo '<br />';
// echo $json[0]["right_text"];
// echo '<br />';
// echo $json[0]["values"][0]["type"];
// echo '<br />';
// echo '<br />';
// echo '<br /> New line';

// $dom = new Document();
// $dom->loadFromUrl("http://localhost/testPhp/test.php");
// $links = $dom->find('.classname a');

// foreach ($links as $link) {
//     echo $link->getAttribute('href');
// }
/* foreach($nodes as $node) {
     echo "$node";
    $classes = $node->    array("Braden score",' Consult clinical staff '),
Attribute('name');
    echo "$classes";
}
 */

/* if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['message']))
{
    $fname = $_POST['fname'];

    $lname = $_POST['lname'];

    $email = $_POST['email'];

    $message = $_POST['message'];

    // a new instance of the library

    $mpdf = new \Mpdf\Mpdf();

    $data = "";

    $data .= "<h1>Your Details</h1>";

    $data .= "<strong>First Name</strong> " . $fname . "<br>";

    $data .= "<strong>Last Name</strong> " . $lname . "<br>";

    $data .= "<strong>Email</strong> " . $email . "<br>";

    $data .= "<strong>Message</strong> " . $message . "<br>";
    $data .= '<h1>dd</h1>';

    $mpdf->WriteHtml($data);

    // $mpdf->output();   
    

} */

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<p>dHllo</p>');

//  $mpdf->Output(); 


?>
<!DOCTYPE html>
<html>

<head>
  <title>Generating PDF from HTML fORM using MPDF Library</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css" />
</head>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="jsChart.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- 
<script src="jsChart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->

<body>
  <div class="container mt-5">
    <div id="test">ss</div>
    <button onclick="test()">Click</button>
    <div id="chart" name="report"></div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
      var options = {
        image: {
          src: [],
          width: 300,
          height: 400
        },
        chart: {
          type: "line",
        },
        series: [{
          name: "sales",
          data: [30, 40, 35, 50, 49, 60, 70, 91, 125],
        }, ],
        xaxis: {
          categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999],
        },
      };

      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
    </script>

    <?php $shop = array(
      array("rose",   1.25),
      array("daisy",  0.75),
      array("orchid", 1.15),
    );
    foreach ($shop as $row) :
      echo $row[1];
    endforeach;
    ?>


    <?php if (count($shop) > 0) : ?>
      <table style="float:right;margin-right:13%">
        <thead>
          <tr>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($shop as $row) :
            // array_map('htmlentities', $row);
          ?>
            <tr>
              <td style="font-weight: bold"><?php echo implode('</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $row); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>

    <?php if (count($shop) > 0) : ?>
      <table style="margin-right:13%">
        <thead>
          <tr>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($shop as $row) :
            // array_map('htmlentities', $row);
          ?>
            <tr>
              <td><?php echo implode('</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $row); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>


    <img src="graph.php" />
  </div>

</body>

</html>