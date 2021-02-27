<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bob's Auto Parts - Customer Orders</title>
</head>
<body>
  <h1>Bob's Auto Parts</h1>
  <h2>Customer Orders are: </h2>
  <?php 

    $DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
    $ORDER_FILE  = $DOCUMENT_ROOT."/orders/orders.txt";
    @ $fp = fopen($ORDER_FILE, "rb");

    flock($fp, LOCK_EX);

    if (!$fp) {
      echo "<p>No orders pending."
          ."Please try again later.</p></body></html> ";

      exit;
    }

    while (!feof($fp)) {
      $order = fgets($fp, 9999);
      echo $order."<br />";
    }

  ?>
</body>
</html>