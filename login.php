<!--
    Jimmy Silva, 4/4/2024, IT202-006, Web Project Phase 4 jns@njit.edu
-->

<?php 
if (!isset($login_message)) {
$login_message = ' ';
}
?>

<!DOCTYPE html>
<html>
 <head>
    <link rel="stylesheet" href="style.css"/>
 </head>
 <body>
    <?php include("header.php"); ?>
 <main>
   <h1>Login</h1>
   <form action="authenticate.php" method="post">
     <label>Email:</label>
     <input type="text" name="email" value="">
     <br>
     <label>Password:</label>
     <input type="password" name="passwrd" value="">
     <br>
     <input type="submit" value="Login">
   </form>
   <p><?php echo $login_message; ?></p>
 </main>
 </body>
</html>