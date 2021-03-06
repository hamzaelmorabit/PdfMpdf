s
		

		<?php

if (!isset($_REQUEST['html'])) { $_REQUEST['html'] = ''; }

 require_once __DIR__ . '/vendor/autoload.php';

  $mpdf = new \Mpdf\Mpdf();

//==============================================================

$html = '


<body>
<div id="chart"></div>
<h3>Images</h3>
<h4>Gamma correction in PNG images</h4>

<table border="0" cellpadding="10" cellspacing="1" style="font-size: 8pt">
  <tbody>
  <tr>
    <td align="center" bgcolor="#cc9900"><img src="data:image/jpeg;base64,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" alt="" width="48" height="48"></td>
    <td><font size="1">&nbsp;</font></td>
    <td align="center" bgcolor="#cc9900"><img src="cc9900_003.png" alt="" width="48" height="48"></td>
    <td><font size="1">&nbsp;</font></td>
    <td align="center" bgcolor="#cc9900"><img src="cc9900.png" alt="" width="48" height="48"></td>
    <td><font size="1">&nbsp;</font></td>
    <td align="center" bgcolor="#cc9900"><img src="cc9900_004.png" alt="" width="48" height="48"></td>
    <td><font size="1">&nbsp;</font></td>
    <td align="center" bgcolor="#cc9900"><img src="cc9900_002.png" alt="" width="48" height="48"></td>
    <td><font size="1">&nbsp;</font></td>
    <td align="center" bgcolor="#cc9900"><img src="cc9900_005.png" alt="" width="48" height="48"></td>
  </tr>
  <tr>
    <td align="center">Unlabelled GIF image<br />(the usual kind)</td>
    <td><font size="1">&nbsp;</font></td>
    <td align="center">Unlabelled PNG image<br />(no gamma info)</td>
    <td><font size="1">&nbsp;</font></td>
    <td align="center">PNG image with gamma 1/1.6<br />(i.e. 0.625)</td>
    <td><font size="1">&nbsp;</font></td>
    <td align="center">PNG image with gamma 1/2.2<br />(i.e. 0.4545)</td>
    <td><font size="1">&nbsp;</font></td>
    <td align="center">sRGB PNG image<br />("absolute colorimetric" rendering intent "sRGB")</td>
    <td><font size="1">&nbsp;</font></td>
    <td align="center">iCCP PNG images<br />("gamma 1.0" pixel data, linear ICC profiles: "iCCPGamma 1.0 profile")</td>
  </tr>
</tbody></table>

<img src="bach1.png" />

';
//==============================================================
if (isset($_REQUEST['html']) && $_REQUEST['html']) { echo $html; exit; }
//==============================================================
// for ($i=0; $i < 10; $i++) { 
// 	$mpdf->WriteHTML($html);
// $mpdf->WriteHTML($html);
// $mpdf->WriteHTML($html);
// }

 $mpdf->WriteHTML($html);
$mpdf->Output(); 


exit;



?>

