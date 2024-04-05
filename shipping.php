<!--
    Jimmy Silva, 4/4/2024, IT202-006, Web Project Phase 4 jns@njit.edu
-->
<?php
  // check session
  require_once('check_login.php');
  // check var
  if( !isset($first_name)) { $first_name = ''; }
  if( !isset($last_name)) { $last_name = ''; }
  if( !isset($address)) { $address = ''; }
  if( !isset($city)) { $city = ''; }
  if( !isset($zipcode)) { $zipcode = ''; }
  if( !isset($shipdate)) { $shipdate = ''; }
  if( !isset($orderdate)) { $orderdate = ''; }
  if( !isset($dimensions)) { $dimensions = ''; }
  if( !isset($price)) { $price = ''; }
?>

<html>
    <header>
        <title>Shipping Address Page</title>
        <link rel="stylesheet" href="style.css" />
    </header>
    <body>
        <?php include("header.php"); ?>
        <?php
      if( !empty($error_message) ) {
        echo "<p>";
        echo $error_message;
        echo "</p>";
      }
    ?>
        <!-- form for shipping request -->
        <form action="shipping_result.php" method="post">
            <label>First Name: </label>
            <input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>"/>
            <br>
            <label>Last Name</label>
            <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>"/>
            <br>
            <label>Street Address</label>
            <input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>" />
            <br>
            <label>City</label>
            <input type="text" name="city" value="<?php echo htmlspecialchars($city); ?>"/>
            <br>
            <label>Zip Code</label>
            <input type="text" name="zipcode" value="<?php echo htmlspecialchars($zipcode); ?>" />
            <br>
            <label>Ship Date</label>
            <input type="text" name="shipdate" value="<?php echo htmlspecialchars($shipdate); ?>" />
            <br>
            <label>Order Date</label>
            <input type="text" name="orderdate" value="<?php echo htmlspecialchars($orderdate); ?>" />
            <br>
            <label>Package Dimensions</label>
            <input type="text" name="dimensions" value="<?php echo htmlspecialchars($dimensions); ?>" />
            <br>
            <label>Total Price</label>
            <input type="text" name="price" value="<?php echo htmlspecialchars($price); ?>" />
            <br>
            <!-- submit button -->
            <input type="submit" class="button" />
        </form>
        <?php include("footer.php"); ?>
    </body>
</html>