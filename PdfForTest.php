<?php

require __DIR__ . '/vendor/autoload.php';
  // $mpdf = new \Mpdf\Mpdf(['setAutoTopMargin' => 'pad']);
$mpdfConfig = array(
				// 'mode' => 'utf-8', 
				// 'format' => 'A4',    // format - A4, for example, default ''
				'default_font_size' => 0,     // font size - default 0
				'default_font' => '',    // default font family
				'margin_left' => 10,    	// 15 margin_left
				'margin_right' => 10,    	// 15 margin right
				//  'mgt' => 222,     // 16 margin top
				//  'mgb' => 222,    	// margin bottom
				//  'margin_header' => 5,     // 9 margin header
				//  'margin_footer' => 5,     // 9 margin footer
				// 'orientation' => 'P'  	// L - landscape, P - portrait
          // 'format' => 'A4'.('Lq' == 'L' ? '-L' : ''),
			);
$mpdf = new \Mpdf\Mpdf(  array_merge($mpdfConfig,[
       'setAutoTopMargin' => 'stretch'])


//     [
//       // 'setAutoTopMargin' => 'stretch',
//    // $mpdfConfig
// 'margin_left' => 10,    
// 				'margin_right' => 10,
//     'autoMarginPaddingB' => 2

//      ,'format' =>  [254, 236]],

  );


// $mpdf->mirrorMargins = 12;	//
// <img src="./images/ekareTitle.PNG" width="30%"  height="8%"/>
// Use different Odd/Even headers and footers and mirror margins
// <table width="100%" height="2100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000088;">
// <tr>
// <td>
// rowspan="3">Telephone:</td>
// </tr>
// <tr>
// <td width="33%" ><span style="font-weight: bold;">Right header</span></td>
// </tr>
// <tr>
// <td width="33%" ><span style="font-weight: bold;">Right header</span></td>
// </tr>
// <tr>
// <td width="33%" ><span style="font-weight: bold;">Right header</span></td>
// </tr></table>Patient Name: Image Test

$stylesheet = file_get_contents('mpdfstyleA4.css');
$mpdf->WriteHTML($stylesheet,1);
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
    <td style="padding-left:45%;font-size:11px">
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
$headerE = '
<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000088;"><tr>
<td width="33%"><span style="font-weight: bold;">Outer header</span></td>
<td width="33%" align="center"><img src="sunset.jpg" width="126px" /></td>
<td width="33%" style="text-align: right;">Inner header div <span style="font-size:14pt;">{PAGENO}</span></td>
</tr></table>
';

 $assessments2 = array(
    array("Account:",'Hamza21'),
     array("Site:", 'Asm'),
    array("City/State:","admin"),
    array("Generated by:","Test"));
$footer =  insertTable($assessments2,'margin-top:0.5%;margin-bottom:0.5%;',2,false);

/* '<
<table width="100%"

 >
 <tr>
<td ><span >Outer header</span></td>
<td ><span style="font-weight: bold;">Outer header</span></td>
</tr>
 <tr>
<td ><span >Outer header</span></td>
<td ><span style="font-weight: bold;">Outer header</span></td>
</tr>
 <tr>
<td ><span >Outer header</span></td>
<td ><span style="font-weight: bold;">Outer header</span></td>
</tr>
</table>
'; */
$footerE = '<div align="center">See <a href="http://mpdf1.com/manual/index.php">documentation manual</a></div>';

$string = file_get_contents("./data.json");
$json = json_decode($string, true);

// echo $json["type"];

// echo $json[0]["type"];
// echo '<br />';
// echo $json[0]["left_text"];
// echo '<br />';
// echo $json[0]["columns"];
// echo '<br />';
// echo $json[0]["right_text"];
// echo '<br />';
// echo $json[0]["values"][0]["type"];
// foreach ($json as $key => $value) {
//         foreach ($value as $key => $val) {
//          if(!is_array($val)){
//            echo $key . 'array=>' . $val . '<br />'; }
//           else {
//             $value1 = json_encode($val, true);
//             echo $value1;

// }}

  $mpdf->SetHeader($header);
// $mpdf->SetHTMLHeader($headerE,'E');
// // $mpdf->SetHTMLFooter($footer);
// $mpdf->SetHTMLFooter($footerE,'E');
$mpdf->SetFooter($footer);
$m = 222; 
$graphLink = 'graph2.php?id=1';
 $patient_profile = array(
    array("Name",   'Image Test'),
    array("MRN",  1),
    array("DOB", "12/03/2021" ),
    array("Location", ),
    array("Age/Sex:",  '0/M ' ),
    array("Braden score",' Consult clinical staff '),
    array("Braden score",' Consult clinical staff '),
    array("Braden score",' Consult clinical staff '),
    array("Braden score",' Consult clinical staff '),
    array("Braden score",' Consult clinical staff '),
    array("Braden score",' Consult clinical staff '),
    array("",''),
    array("Braden score",' Consult clinical staff '),
);

 $wound = array(
    array("Etiology:",'Diabetic'),
    array("Onset Date:","17/03/2021"),
    array("Location:","Elbow, Right"),
    // array("Assessment Date:","07/05/2021 11:35 AM" ),
    array("Assessment:","07/05/2021 11:35 " ),
    array("Status:", 'Active'),
    array("Clinician:",'0/M '),
    array("Facility acquired",'No'),
);
    $mp="./images/woundFinal.png";

 $images = array(
    array("Initial:",'17/03/2021 04:38 PM'),
    array("Current:","17/03/2021 04:41 PM"),
    array("src","./images/woundInitial.png"),
    array("src",$mp),
  
);

 $images2 = array(
      array("Etiology:",'Diabetic'),
      array("Facility acquired",'No'),

      array("Onset Date:","17/03/2021dd"),
      array("Location:","Elbow, Right"),
 
);


 $assessments = array(
    array("Facility acquired",'No'),
     array("Status:", 'Active'),
    array("Onset Date:","17/03/2021"),
    array("assessments:","Elbow, Right"),

    array("Assessment:","07/05/2021 11:35 " ),
    array("Status:", 'Active'),
    array("Clinician:",'0/M '),
    array("Facility acquired",'No'),
     array("Status:", 'Active'),
    array("Clinician:",'0/M '),
    array("Facility acquired",'No'),
     array("Status:", 'Active'),
    array("Clinician:",'0/M '),
    array("Facility acquired",'No'),
);
$string = file_get_contents("./data.json");
$json = json_decode($string, true);
  $someObject  = json_decode(json_encode($json),true);

function insertTable($myTableArrayBody,$style,$column1) {

     $i = $column1;
    $seTableStr = '<table style='.$style.'><tbody>';

    foreach ($myTableArrayBody[0]["values"] as $key=>$val){
        $seTableStr .= '<tr>';
         if(isset($val["type"]) && $i % 2 != 0 ) {
          //  $seTableStr .= '<td style="font-weight:bold;padding-top:2%">'.$val["key"].'<td>';

           if($val["type"] != 'image')
          { $seTableStr .= '<td style="font-weight:bold;">' . $val["key"]. '</td>';

               $seTableStr .= '<td style="padding-left:43%;font-weight:bold;">' .$val["value"] . '</td>';        
        }   else  
              $seTableStr .= '<td style="padding-left:43%"><img src="'.$val['value'].'" width="32%" /></td>';

        }
        $i++;
     $seTableStr .= '</tr>';

    // while (isset($myTableArrayBody[$y][$x])) {
    //     $conditionSkipItem = $i%2==$y_;
    //     if($y_ == 2) $conditionSkipItem = true;
       
    //     $seTableStr .= '<tr>';
    //     while (isset($myTableArrayBody[$y][$x]) && $conditionSkipItem) {
    //       if(!$isTypeImage){ 
                  
    //         if($x ==  1) $seTableStr .= '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $myTableArrayBody[$y][$x] . '</td>';
    //         else $seTableStr .= '<td style="font-weight:bold;">' . $myTableArrayBody[$y][$x] . '</td>';
    //       }
    //       else{
    //           $mm=$myTableArrayBody[$y][$x];
    //           $word="src";
    //             if($x ==  0) {
    //                 if(strrchr($myTableArrayBody[$y][$x], $word))
    //                   $seTableStr .= '<td style="font-weight:bold;padding-top:2%"><img src="'.$myTableArrayBody[$y][1].'" width="32%" height="32%" /></td>';
    //                 else 
    //                   $seTableStr .= '<td style="font-weight:bold;">'.$mm.'</td>'; } 

    //                 else 
    //                 if(!strrchr($myTableArrayBody[$y][0], $word))
    //                 $seTableStr .=  '<td style="position:absolute;padding-left: -89px;">' . $myTableArrayBody[$y][$x] . '</td>';}
                  
    //               $x++;
    //           }
    //             $seTableStr .= '</tr>';
    //             $x = 0;
    //             $i++;
    //             $y++;

    // }

}
    $seTableStr .= '</tbody></table>';
    return $seTableStr;
}

 function section($headerType,$column1,$column2){
          $titleStyle="title";
          if($headerType!=''){
           $section =  '<div class='.$titleStyle.'>'.$headerType.'</div>';
          }
          $section .=  '
            <table width="100%"
            style="border-bottom: 0px solid #000000; 
            vertical-align: top; 
            font-family: serif; font-size: 11px;">
            <tr>
            <td width="33%;">'.$column1.'</td>

            <td width="10% ;color:red"></td>  
            <td width="33%;">'.$column2.'</td>
            </tr></table>';

          return $section;
}
$html1 = insertTable($someObject,'margin-top:0.5%;margin-bottom:0.5%;',0);
$html2 = insertTable($someObject,'margin-top:0.5%;margin-bottom:0.5%;',1);
// $html12 = insertTable($wound,'margin-top:0.5%;margin-bottom:0.5%;',0,false);
// $html22 = insertTable($wound,'margin-top:0.5%;margin-bottom:0.5%;',1,false);
// $html23 = insertTable($images,'margin-top:0.5%;margin-bottom:0.5%;',0,true);
// $html233 = insertTable($images,'margin-top:0.5%;margin-bottom:0.5%;',1,true);
// $tableImages = insertTable($images2,'margin-top:0.5%;margin-bottom:0.5%;',2,false);
// $assessmentsTable = insertTable($assessments,'margin-top:0.5%;margin-bottom:10%;',2,false);
 

$section = section("Patient Profile",$html1,$html2);
// $section2 = section("Wound",$html12,$html22);
// $section22 = section("Images",$html23,$html233);
//  $section2_2 = section('',$tableImages,'');
// $section2_3 = section('assessments',$assessmentsTable,'');

// '.$section2 .'

$html = '
<html>

<h3 class="tit">WOUND ASSESSMENT REPORT</h3>
'.$section .'

    <h1 class="hero"> done</h1>
<img src="./images/woundFinal.png" alt="" width="32%" height="32%">
<img src="./images/woundFinal.png" alt="" width="32%" height="32%">
<img src="./images/woundFinal.png" alt="" width="32%" height="32%">
<img src="./images/woundFinal.png" alt="" width="32%" height="32%">
<img src="./images/woundFinal.png" alt="" width="32%" height="32%">
<img src="./images/woundFinal.png" alt="" width="32%" height="32%">
<img src="./images/woundFinal.png" alt="" width="32%" height="32%">
<img src="./images/woundFinal.png" alt="" width="32%" height="32%">
<img src="./images/woundFinal.png" alt="" width="32%" height="32%">
<img src="./images/woundFinal.png" alt="" width="32%" height="32%">
<img src="./images/woundFinal.png" alt="" width="32%" height="32%">


</html>
';

// $mpdf->WriteHTML($graphLink);
$mpdf->WriteHTML($html);

$mpdf->Output();
exit;


?>

<!-- Page break; Section and title same block;Image url;graph area chart ...  -->


<!-- 
function insertTable($myTableArrayBody,$style,$y_,$isTypeImage) {
    $x = 0;
    $i =0;
    $y = 0;
  

    $seTableStr = '<table style='.$style.'><tbody>';
    while (isset($myTableArrayBody[$y][$x])) {
        $conditionSkipItem = $i%2==$y_;
        if($y_ == 2) $conditionSkipItem = true;
       
        $seTableStr .= '<tr>';
        while (isset($myTableArrayBody[$y][$x]) && $conditionSkipItem) {
          if(!$isTypeImage){ 
                  
            if($x ==  1) $seTableStr .= '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $myTableArrayBody[$y][$x] . '</td>';
            else $seTableStr .= '<td style="font-weight:bold;">' . $myTableArrayBody[$y][$x] . '</td>';
          }
          else{
              $mm=$myTableArrayBody[$y][$x];
              $word="src";
                if($x ==  0) {
                    if(strrchr($myTableArrayBody[$y][$x], $word))
                      $seTableStr .= '<td style="font-weight:bold;padding-top:2%"><img src="'.$myTableArrayBody[$y][1].'" width="32%" height="32%" /></td>';
                    else 
                      $seTableStr .= '<td style="font-weight:bold;">'.$mm.'</td>'; } 

                    else 
                    if(!strrchr($myTableArrayBody[$y][0], $word))
                    $seTableStr .=  '<td style="position:absolute;padding-left: -89px;">' . $myTableArrayBody[$y][$x] . '</td>';}
                  
                  $x++;
              }
                $seTableStr .= '</tr>';
                $x = 0;
                $i++;
                $y++;

    }
    $seTableStr .= '</tbody></table>';
    return $seTableStr;
} -->