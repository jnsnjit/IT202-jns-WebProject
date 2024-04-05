<!--
    Jimmy Silva, 4/4/2024, IT202-006, Web Project Phase 4 jns@njit.edu
-->
<?php

require_once('admin_db.php');

session_start();


$username = filter_input(INPUT_POST, 'username');

$password = filter_input(INPUT_POST, 'passwrd');

if (is_valid_user($username, $password)) {

  $_SESSION['is_valid_user'] = true;

  // redirect logged in user to default page

  echo "<p>You have successfully logged in.</p>";

  include('login.php');

} else {

 if ($username == NULL && $password == NULL) {

  $login_message ='You must login to view this page.';

 } else {

  $login_message = 'Invalid credentials.';

 }

  include('login.php');

}
?>