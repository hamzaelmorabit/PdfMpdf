
<?php

use Mpdf\Tag\Br;

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
// $mpdf = new \Mpdf\Mpdf([
//   'margin_left' => '7',
//   'margin_right' => '7',
//   'margin_top' => '7',
//   'margin_bottom' => '7',
// ]);
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
// $mpdf->autoPageBreak = false;

// $mPdf->shrink_tables_to_fit = 1;


// $string = file_get_contents("./formatB.json");
include 'converter.php';
// echo gettype($string);
// echo "<br/>";
// echo "<br/>";
// echo "<br/>";
// echo gettype(convertFormatA());
$json = json_decode(convertFormatA(), true);
$someObject  = json_decode(json_encode($json), true);
// echo $someObject;
$header = '<table class="headerTable">
  <tr>
    <th rowspan="3"><img src="' . $someObject[0]["values"][0]["value"] . '" width="25%"  height="6%"/></th>
    <td style="padding-left:45%;font-size:11px;"><span style="
    font-weight:bold">Patient Name:</span>&nbsp;&nbsp; ' . $someObject[0]["values"][1]["value"] . '</td>
  </tr>
  <tr style="float:right">
    <td style="padding-left:45%;font-size:11px;
    font-family: Arial, Helvetica, sans-serif;">
    <span style="font-weight:bold;
    ">MRN:</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ' . $someObject[0]["values"][2]["value"] . '</td>
  </tr>
   <tr>
    <td style="padding-left:45%;font-size:11px;
      color: DarkGray;
    ">
    <span style="font-weight:bold;
    padding-right:120px;
    ">Report Date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ' . $someObject[0]["values"][3]["value"] . '&nbsp;&nbsp;&nbsp;</td>
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
$mpdf->SetHeader($header);


function templateTableTwoColumn($myTableArrayBody, $style)
{

  $i = 0;

  $seTableStr = '<table  style=' . $style . '><tbody>';
  $styleTd1 = "font-size: 10.5px;padding-left:63px";
  $styleTd2 =  "font-size: 10.5px;padding-left:90px;";
  $seTableStr2 = $seTableStr;
  $add_dots = $myTableArrayBody["type"] == "graph" ? "" : ":";



  foreach ($myTableArrayBody["values"] as  $val) {
    // $tmp = '<tr style="display: block;break-inside: avoid;">';
    $tmp = '<tr>';

    if (isset($val["type"])) { // test if there is a type => $val["value] -> error
      if ($val["type"] == 'image') { // if type is image

        $tmp .= '<td 
        colspan="2" style="margin-top:2%;break-inside: avoid;font-size: 10.5px;font-weight:bold;"><img src="' . $val['value'] . '" 
            
              width="74%" 
              height="74.15%"  ></td>';
      } else if (
        $val["type"] == 'graph'
        || $val["type"] ==
        'graph_area'
      ) {


        //  echo  $string ;
        // $graphLink
        // =
        $graphLink
          = 'graph.php?values=' . ($val["values"]) . '&valMax=' . $val['valMax'] . '&color=' . $val['color'] . '&colorTop=' . $val['colorTop'];
        // = 'graph.php?val1=' . ($val["val1"]) . '&val2=' . $val['val2'] . '&val3=' . $val['val3'] . '&val4=' . $val['val4'] . '&valMax=' . $val['valMax'] . '&color=' . $val['color'] . '&colorTop=' . $val['colorTop'];
        if ($val["type"] == 'graph_area')
          $graphLink  = 'graph2.php?granulation=' . ($val["granulation"]) . '&slough=' . $val['slough'] . '&eschar=' . $val['eschar'];
        $tmp .= '<td colspan="2" style="padding-top:8px"><img src="' . $graphLink . '" ></td>';
      } else {

        $tmp .= '<td style="font-size: 10.5px;font-weight:bold;">' . $val["key"] . '' . $add_dots . '</td>';

        $tmp .= '<td style="' .  $styleTd1 . '">' . $val["value"] . '</td>';
      }
    } else {
      $tmp .= '<td style="font-size: 10.5px;font-weight:bold;"></td>';
    }

    $tmp .= '</tr>';
    $i % 2 ? $seTableStr .= $tmp :  $seTableStr2 .= $tmp;
    $i++;
  }


  $seTableStr .= '</tbody></table>';
  $seTableStr2 .= '</tbody></table>';


  return [$seTableStr, $seTableStr2];
}

function templateTableOneColumn(&$myTableArrayBody, $style)
{
  if (isset($myTableArrayBody["values"])) {
    $seTableStr = '<table  style=' . $style . '><tbody>';
    foreach ($myTableArrayBody["values"] as  $val) {
      if (isset($val["type"])) {
        $seTableStr .= '<tr style="width:100%;">';
        $seTableStr .= '<td style="font-size:  10.5px;font-weight:bold;"> 
                        ' . $val['key'] . '
                   
                    </td>
          <td style="font-size:  10.5px;padding-left:8%;" >
           ' .  $val['value'] . '</td>';
        $seTableStr .= '</tr>';
      }
    }
    $seTableStr .= '</tbody></table>';
  } else {
    $seTableStr = $seTableStr = '<table  style=' . $style . '><tbody>
    <tr style="width:100%;">';
    $seTableStr .= '<td style="background-color:#ffcccb;font-size:  12px;width:98%;height:18%"><i>Please consult clinical staff for details</i></td><td></td></tr>';
    $seTableStr .= '</tbody></table>';
  }
  return $seTableStr;
}

function templateTableThreeColumn($myTableArrayBody, $style)
{
  $seTableStr = '<table  style=' . $style . '><tbody>';
  $i = 0;
  $b = true;
  foreach ($myTableArrayBody["values"] as  $val) {
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
  }
  $seTableStr .= '</tbody></table>';


  return $seTableStr;
}

function section($left_text, $right_text, $nbrColumns, $column1, $column2)
{
  $styleColumn = "gwt-Label";
  if ($nbrColumns != 2) $styleColumn = "gwt-Label22";

  $section1 = '<div style="break-inside: avoid; height:fit-content" class="section1">
                 <div class="gwt-Label2" >
                  <div class="left_text">' . $left_text . '</div>
                  <div class="right_text">' . $right_text . '</div></div>

  
                  <div style="display: inline; ">';
  if ($left_text == 'graph_measurement')
    $section1 = '';
  if ($nbrColumns == 2)
    $section1  .= ' <div class=' . $styleColumn . ' >' . $column2 . '</div>
                   <div class=' . $styleColumn . ' >' . $column1 . '</div>';
  else         $section1  .=  '<div class=' . $styleColumn . ' >' . $column1 . '</div>';
  $section1  .=   '</div></div>';

  return $section1;
}
$html___ = '';
for ($i = 2; $i < sizeof($someObject); $i++) {
  $html2 = '';
  if ($someObject[$i]["columns"] == 2)
    [$html2, $html1]  = templateTableTwoColumn($someObject[$i],  'margin-top:1.5%;margin-bottom:2%;break-inside: avoid');

  else if ($someObject[$i]["columns"] == 3)
    $html1 = templateTableThreeColumn($someObject[$i], 'margin-top:6%;margin-bottom:1%;');
  else
    $html1 = templateTableOneColumn($someObject[$i], 'margin-top:0.5%;margin-bottom:1%;');

  if (
    $someObject[$i]["type"] == 'graph' ||
    $someObject[$i]["type"] == 'images_appendix'
  )  $section = '<pagebreak>';
  else $section = '<div></div>';

  $section .= section($someObject[$i]["left_text"], $someObject[$i]["right_text"], $someObject[$i]["columns"], $html1, $html2);
  $html___ .=  $section;
  // $html___ .= '<div>' . $section . '</div>';
}

$footer = templateTableOneColumn($someObject[1],  'margin-top:2%;');
$mpdf->SetFooter($footer);

$html = '
<html >
<h3 style="font-family: sans-serif">WOUND ASSESSMENT REPORT</h3>
' . $html___ . '
</html >
';

// $mpdf->WriteHTML($graphLink);
$mpdf->WriteHTML($html);

$mpdf->Output('pdfInSight.pdf');
exit;

  //  {
  //       "type": "graph",
  //       "key": "",
  //       "val1": 35.8,
  //       "val2": 36.5,
  //       "val3": 37.1,
  //       "val4": 36,
  //       "valMax": 40,
  //       "color": "ffc850",
  //       "colorTop": "fad000"
  //     },
