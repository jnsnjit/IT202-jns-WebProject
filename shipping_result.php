
<?php
    $first_name = filter_input(INPUT_POST, 'first_name', FILTER_DEFAULT);
    $last_name = filter_input(INPUT_POST, 'last_name', FILTER_DEFAULT);
    $city = filter_input(INPUT_POST, 'city', FILTER_DEFAULT);
    $address = filter_input(INPUT_POST, 'address', FILTER_DEFAULT);
    $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_DEFAULT);
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
        <label>Address:</label>
        <span><?php echo $address; ?></span>
        <br>
        <label>City:</label>
        <span><?php echo $city; ?></span>
        <br>
        <label>Zipcode:</label>
        <span><?php echo $zipcode; ?></span>
        <?php include("footer.php"); ?>
    </body>
</html>