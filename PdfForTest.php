<?php

require __DIR__ . '/vendor/autoload.php';
// $mpdf = new \Mpdf\Mpdf(['setAutoTopMargin' => 'pad']);
$mpdfConfig = array(
  // 'mode' => 'utf-8', 
  // 'format' => 'A4',    // format - A4, for example, default ''
  'default_font_size' => 0,     // font size - default 0
  'default_font' => '',    // default font family
  'margin_left' => 10,      // 15 margin_left
  'margin_right' => 10,      // 15 margin right
  //  'mgt' => 222,     // 16 margin top
  //  'mgb' => 222,    	// margin bottom
  //  'margin_header' => 5,     // 9 margin header
  //  'margin_footer' => 5,     // 9 margin footer
  // 'orientation' => 'P'  	// L - landscape, P - portrait
  // 'format' => 'A4'.('Lq' == 'L' ? '-L' : ''),
);
$mpdf = new \Mpdf\Mpdf(
  array_merge(
    $mpdfConfig,
    [
      'setAutoTopMargin' => 'stretch',  'setAutoBottomMargin' => 'pad'
    ]
  )

  //     [
  //       // 'setAutoTopMargin' => 'stretch',
  //    // $mpdfConfig
  // 'margin_left' => 10,    
  // 				'margin_right' => 10,
  //     'autoMarginPaddingB' => 2

  //      ,'format' =>  [254, 236]],

);

$stylesheet = file_get_contents('mpdfstyleA4.css');
$mpdf->WriteHTML($stylesheet, 1);
// $mPdf->shrink_tables_to_fit = 1;

$header = '
<table idth="100%" height="2100%"  style="
 
border-bottom: 1px solid #000000; vertical-align: top; font-family: serif; font-size: 3pt;" >

  <tr style="margin:1330%;">
    <th rowspan="3"><img src="./images/ekareTitle.PNG" width="25%"  height="6%"/></th>
    <td style="


    padding-left:45%;font-size:11px;"><span style="

    font-weight:bold">Patient Name:</span>&nbsp;&nbsp; Image Test</td>
  </tr>
  <tr style="float:right">
    <td style="padding-left:45%;font-size:11px;
    font-family: Arial, Helvetica, sans-serif;">
    <span style="font-weight:bold;
      

    ">MRN:</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1</td>
  </tr>
   <tr>
    <td style="padding-left:45%;font-size:11px;
      color: DarkGray;
    ">
    <span style="font-weight:bold;
    padding-right:120px;
    ">Report Date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 17/05/2021 03:05 AM&nbsp;&nbsp;&nbsp;</td>
  </tr>

  <tr>
    <td style="padding-left:0px;"> </td>
  </tr>
  <tr>
    <td style="padding-left:px;"> </td>
  </tr> <tr>
    <td style="padding-left:px;"> </td>
  </tr>
</table>
';



$footerE = '<div align="center">See <a href="http://mpdf1.com/manual/index.php">documentation manual</a></div>';

$string = file_get_contents("./data.json");
$json = json_decode($string, true);

$mpdf->SetHeader($header);

$m = 222;
$graphLink = 'graph2.php?id=1';

$string = file_get_contents("./data.json");
$json = json_decode($string, true);
$someObject  = json_decode(json_encode($json), true);

function insertTable($myTableArrayBody, $nbrColumns, $style, $column1)
{
  $indexJsonArray = 0;
  $i = $column1;
  $b = true;
  $seTableStr = '<table  style=' . $style . '><tbody>';
  $styleTd = $column1 == 1 ? "font-size: 10.5px;padding-left:63px"
    :
    "font-size: 10.5px;padding-left:90px;";
  $seTableStr2 = $seTableStr;
  if ($indexJsonArray < sizeof($myTableArrayBody)) {
    foreach ($myTableArrayBody["values"] as $key => $val) {
      if ($nbrColumns == 2) {
        $seTableStr .= '<tr>';
        if ($i % 2 != 0) { // for the skip an column or row
          if (isset($val["type"])) { // test if there is a type => $val["value] -> error
            if ($val["type"] == 'image') { // if type is image

              $seTableStr .= '<td colspan="2" style="font-size: 10.5px;font-weight:bold;"><img src="' . $val['value'] . '" 
            
              width="74%" 
              height="74.15%"  ></td>';
            } else if ($val["type"] == 'graph') {
              $graphLink = 'graph.php?para0=50&para1=31.7&para2=48.3&para3=36';

              $seTableStr .= '<td colspan="2"><img src="' . $graphLink . '" ></td>';
            } else {
              $seTableStr .= '<td style="font-size: 10.5px;font-weight:bold;">' . $val["key"] . ':</td>';

              $seTableStr .= '<td style="' . $styleTd . '">' . $val["value"] . '</td>';
            }
          } else {
            $seTableStr .= '<td style="font-size: 10.5px;font-weight:bold;"></td>';
          }
        }
        $i++;
        $seTableStr .= '</tr>';
      } else if ($nbrColumns == 3) {
        if ($i % 3 == 0 && $b) {
          $b = false;
          $seTableStr .= '<tr style="padding-top:12%"> ';
        }
        if (isset($val["type"])) {
          if (($val["type"]) == "image") {
            $seTableStr .= '
                    <td style="padding-right:8%">
                         <img src="' . $val['value'] . '" 
                    width="74%" 
                    height="74.15%" >
                    </td>';
          } else
            $seTableStr .= '
                    <td style="position:absolute;font-size: 25.5px;padding-bottom:9%;padding-top:1%">
                     ' . $val['value'] . '</td>';
        }
        if ($i % 3 == 0) {
          $seTableStr .= '</tr>';

          $b = true;
        };
        $i++;
      } else {
        if (isset($val["type"])) {
          $seTableStr .= '<tr style="width:100%;">';
          $seTableStr .= '<td style="font-size:  10.5px;font-weight:bold;"> 
                        ' . $val['key'] . '
                   
                    </td>
          <td style="font-size:  10.5px;padding-left:8%;" >
           ' . $val['value'] . '</td>';
          $seTableStr .= '</tr>';
        }
      }
    }
    $seTableStr .= '</tbody></table>';


    return $seTableStr;
  }
}

function section($left_text, $right_text, $nbrColumns, $column1, $column2, $column3)
{
  $styleColumn = "gwt-Label";
  if ($nbrColumns != 2 && $nbrColumns != 1) $styleColumn = "gwt-Label22";

  $section1 = '

   <div  style="position:absolute ;display: block-inline;width: 100%; "
   class="sectio"
   >
  
            <div class="gwt-Label2" >
            <div style="margin-right:222%;float:left">' . $left_text . '</div>
            <div style="padding-left:70%">' . $right_text . '</div></div>

        <br/>
        <div style="display: block-inline; ">';
  if ($nbrColumns == 1)   $section1 .= ' <div style="font-family: sans-serif;
  font-size: 4px;float: left;
  width: 100%;" >' . $column1 . '</div>';
  else if ($nbrColumns == 2)
    $section1  .= ' <div class=' . $styleColumn . ' >' . $column2 . '</div>
            <div class=' . $styleColumn . ' >' . $column1 . '</div>';
  else if ($nbrColumns == 3)          $section1  .=  '<div class=' . $styleColumn . ' >' . $column1 . '</div>';
  $section1  .=   '</div></div>';

  return $section1;
}

for ($i = 0; $i < sizeof($someObject); $i++) {
  # code...
  if ($someObject[$i]["columns"] == 2) {
    $html1 = insertTable($someObject[$i],  $someObject[$i]["columns"], 'margin-top:-4%;margin-bottom:1%;', 1);
    $html2 = insertTable($someObject[$i],  $someObject[$i]["columns"], 'margin-top:-4%;margin-bottom:1%;', 0);
  } else if ($someObject[$i]["columns"] == 3) {
    $html1 = insertTable($someObject[$i],  $someObject[$i]["columns"], 'margin-top:-2.5%;margin-bottom:1%;', 0);
  } else {
    $html1 = insertTable($someObject[$i],  $someObject[$i]["columns"], 'margin-top:-2%;margin-bottom:1%;', 0);
    $html2 = "";
    $html3 = "";
  }

  $section = section($someObject[$i]["left_text"], $someObject[$i]["right_text"], $someObject[$i]["columns"], $html1, $html2, $html3);
  $html___ .= '<div >' . $section . '</div>';
}

$footer = insertTable($someObject[0], 2, 'margin-top:2%;;', 0, 0);
$mpdf->SetFooter($footer);

// include 'graph.php';

$graphLink = 'graph.php?para0=50&para1=31.7&para2=48.3&para3=36';

// Output line
// $graph->Stroke();
// $htm2l = '<div><img src="' . $graphLink . '" ></div>';
// ' . $htm2l . '
$html = '
<html>


<h3 class="tit">WOUND ASSESSMENT REPORT</h3>
' . $html___ . '



</html>
';

// $mpdf->WriteHTML($graphLink);
$mpdf->WriteHTML($html);

$mpdf->Output();
exit;


?>

<!-- Page break; Section and title same block;Image url;graph area chart ...  -->