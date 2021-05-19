<?php



// load dependencies via Composer
require __DIR__ . '/vendor/autoload.php';



// $dom = new Document();
// $dom->loadFromUrl("http://localhost/testPhp/test.php");
// $links = $dom->find('.classname a');

// foreach ($links as $link) {
//     echo $link->getAttribute('href');
// }
/* foreach($nodes as $node) {
     echo "$node";
    $classes = $node->getAttribute('name');
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

</script>

<?php $shop = array(
    array("rose",   1.25),
    array("daisy",  0.75),
    array("orchid", 1.15 ),
);
   foreach ($shop as $row) :
    echo $row[1];
   endforeach;
?>


   <?php if (count($shop) > 0): ?>
<table style="float:right;margin-right:13%">
  <thead>
    <tr>
    </tr>
  </thead>
  <tbody>
<?php foreach ($shop as $row): 
  // array_map('htmlentities', $row);
   ?>
    <tr>
      <td><?php echo implode('</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $row); ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>

 <?php if (count($shop) > 0): ?>
<table style="margin-right:13%">
  <thead>
    <tr>
    </tr>
  </thead>
  <tbody>
<?php foreach ($shop as $row): 
  // array_map('htmlentities', $row);
   ?>
    <tr>
      <td><?php echo implode('</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $row); ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>

    <!-- <h1>Send PDF as Attachement</h1>

    <p>Fill out the Details to generate the pdf</p>

    <form action="test.php" method="post">
    
        <input type="text" placeholder="First Name" name="fname" class="form-control" required>
        <input type="text" placeholder="Last Name" name="lname" class="form-control" required>
        <input type="email" placeholder="Email" name="email" class="form-control" required>

        <textarea name="message" placeholder="Message" class="form-control" required>

        </textarea>

        <button class="btn btn-success" type="submit">Send</button>

    </form> -->
<img src="graph.php"/>
</div>

</body>
</html>