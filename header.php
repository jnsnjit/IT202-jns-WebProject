<!--
    Jimmy Silva, 4/4/2024, IT202-006, Web Project Phase 4 jns@njit.edu
-->
<head>
    <link rel="stylesheet" href="style.css" />
</head>
<header>
    <!-- header for all pages -->
    <img src="images/store_logo.png" style="float:right; margin-right:10px;" alt= "bad image" width="75"/>
    <h1 style="color:blanchedalmond;">Welcome to Blockitic</h1>
    <ul>
        <?php if(isset($_SESSION['is_valid_user'])): ?> 
            <li><a href="index.php">Home</a></li>
            <li><a href="shop_database.php">Toy List</a></li>
            <li><a href="create.php">Create a Toy</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="shipping.php">Shipping</a></li>
        <?php else: ?>
            <li><a href="index.php">Home</a></li>
            <li><a href="shop_database.php">Toy List</a></li>
            <li><a href="login.php">Login</a></li>
        <?php endif ?>
    </ul>
    <br>
</header>
