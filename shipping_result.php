<!--
    Jimmy Silva, 2/14/2024, IT202-006, Web Project Phase 3 jns@njit.edu
-->
<?php
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_DEFAULT);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_DEFAULT);
    $city = filter_input(INPUT_POST, 'city', FILTER_DEFAULT);
    $address = filter_input(INPUT_POST, 'address', FILTER_DEFAULT);
    $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_VALIDATE_INT);
    $shipdate = filter_input(INPUT_POST, 'shipdate', FILTER_DEFAULT);
    $orderdate = filter_input(INPUT_POST, 'orderdate', FILTER_DEFAULT);
    $dimensions = filter_input(INPUT_POST, 'dimensions', FILTER_VALIDATE_INT);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

    $error_message = '';
    // validate price
  if ($price === FALSE) {
    $error_message .= 'Price must be a valid number. <br>';
  } else if ( $price > 1000 ){
    $error_message .= 'Price must be a less then 1000$. <br>';
  } else if ($price <= 0){
    $error_message .= 'Price must be greater than zero. <br>';
  }

  if ($dimensions === FALSE) {
    $error_message .= 'Dimensions must be a valid number.<br>';
  } else if ( $dimensions <= 0 ){
    $error_message .= 'Dimensions must be a valid number. <br>';
  } else if ( $dimensions > 36){
    $error_message .= 'Dimensions must be less then 36 inches <br>';
  }

  if ($zipcode === FALSE) {
    $error_message .= 'Zip Code must be a valid number.<br>';
  } else if ( strlen((string)$zipcode) !== 5 ){
    $error_message .= 'Zip Code must be a length of 5 numbers.<br>';
  }

  if($error_message != '') {
    include('shipping.php');
    exit();
  }


  // apply formatting
  $price = '$' . number_format($price, 2);
?>
<html>
    <header>
        <title>Shipping Address Page</title>
        <link rel="stylesheet" href="style.css" />
    </header>
    <body>
        <?php include("header.php"); ?>
        <!-- form for shipping request -->
        <h2>Your Receipt</h2>
        <label>First Name:</label>
        <span><?php echo $first_name; ?></span>
        <br>
        <label>Last Name:</label>
        <span><?php echo $last_name; ?></span>
        <br>
        <label>From Address:</label>
        <span>Newark, NJ, 156 Warren Street</span>
        <br>
        <label>To Address:</label>
        <span><?php echo $address; ?></span>
        <br>
        <label>City:</label>
        <span><?php echo $city; ?></span>
        <br>
        <label>Zipcode:</label>
        <span><?php echo $zipcode; ?></span>
        <br>
        <label>Shipped by:</label>
        <span>UPS</span>
        <br>
        <label>Shipping Class:</label>
        <span>Priority Mail</span>
        <br>
        <label>Shipping Number:</label>
        <span>196264982819</span>
        <br>
        <label>Ship Date:</label>
        <span><?php echo $shipdate; ?></span>
        <br>
        <label>Order Date:</label>
        <span><?php echo $orderdate; ?></span>
        <br>
        <label>Package Dimensions:</label>
        <span><?php echo $dimensions; ?></span>
        <br>
        <label>Total Price:</label>
        <span><?php echo $price; ?></span>
        <br>
        <img src="images/barcode.png" alt= "bad image" width="75"/> 
        <?php include("footer.php"); ?>
    </body>
</html>