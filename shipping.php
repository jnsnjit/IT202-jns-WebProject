<?php
  // check var
  if( !isset($first_name)) { $first_name = ''; }
  if( !isset($last_name)) { $last_name = ''; }
  if( !isset($address)) { $address = ''; }
  if( !isset($city)) { $city = ''; }
  if( !isset($zipcode)) { $zipcode = ''; }
?>

<html>
    <header>
        <title>Shipping Address Page</title>
        <link rel="stylesheet" href="index.css" />
    </header>
    <body>
        <?php include("header.php"); ?>
        <!-- form for shipping request -->
        <form action="shipping_result.php" method="post">
            <label>First Name: </label>
            <input type="text"name="first_name" value="<?php echo htmlspecialchars($first_name); ?>"/>
            <br>
            <label>Last Name</label>
            <input type="text"name="last_name" value="<?php echo htmlspecialchars($last_name); ?>"/>
            <br>
            <label>Street Address</label>
            <input type="text"name="address" value="<?php echo htmlspecialchars($address); ?>" />
            <br>
            <label>City</label>
            <input type="text"name="city" value="<?php echo htmlspecialchars($city); ?>"/>
            <br>
            <label>Zip Code</label>
            <input type="text"name="zipcode" value="<?php echo htmlspecialchars($zipcode); ?>" />
            <br>
            <!-- submit button -->
            <input type="submit" class="button" />
        </form>
        <?php include("footer.php"); ?>
    </body>
</html>