<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
  <h1>Bob's Auto Parts</h1>
  <h2>Order Results</h2>
  <?php 

    $date = date('H:i, jS F Y');
    echo '<p>Order processed at '.$date.'</p>';

    $tireqty = $_POST['tireqty'];
    $oilqty = $_POST['oilqty'];
    $sparkqty = $_POST['sparkqty'];
    $address = $_POST['address'];

    echo '<p>Your order is as follows</p>';
    echo $tireqty.' tires <br/>';
    echo $oilqty.' bottles of oil <br/>';
    echo $sparkqty.' spark plugs <br/>';

    define("TIREPRICE", 100);
    define("OILPRICE", 30);
    define("SPARKPRICE", 40);

    $totalqty = $tireqty + $oilqty + $sparkqty;
    $totalamt = $tireqty*TIREPRICE + $oilqty*OILPRICE + $sparkqty*SPARKPRICE;

    echo "<p>Total of order is $ $totalamt.</p>";
    echo "<p>Shipping address is $address </p>";

    $DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
    $ORDER_FILE  = $DOCUMENT_ROOT."/orders/orders.txt";
    @ $fp = fopen($ORDER_FILE, "ab");

    flock($fp, LOCK_EX);

    if (!$fp) {
      echo "<p>Your order could not be processed at this time."
          ."Please try again later.</p></body></html> ";

      exit;
    }

    $outputstring = $date."\t".$tireqty." tires \t".$oilqty." oil \t".$sparkqty
    ." spark plugs\t\$".$totalamt."\t".$address."\n";

    fputs($fp, $outputstring, strlen($outputstring));
    flock($fp, LOCK_UN);
    fclose($fp);

  ?>
</body>
</html>