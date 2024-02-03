<html>
    <header>
        <title>Shipping Address Page</title>
        <link rel="stylesheet" href="index.css" />
    </header>
    <body>
        <?php include("header.php"); ?>
        <form action="name.php" method="post">
            <label>First Name: </label>
            <input type="text"name="first_name" />
            <br>
            <label>Last Name</label>
            <input type="text"name="last_name" />
            <br>
            <label>Shipping Address</label>
            <input type="text"name="address" />
            <br>
            <input type="submit" class="button"/>
        </form>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <?php include("footer.php"); ?>
    </body>
</html>