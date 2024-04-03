<?php

require_once('admin_db.php');

session_start();


$email = filter_input(INPUT_POST, 'email');

$password = filter_input(INPUT_POST, 'password');

if (is_valid_admin_login($email, $password)) {

  $_SESSION['is_valid_admin'] = true;

  // redirect logged in user to default page

  echo "<p>You have successfully logged in.</p>";

} else {

 if ($email == NULL && $password == NULL) {

  $login_message ='You must login to view this page.';

 } else {

  $login_message = 'Invalid credentials.';

 }

  include('login.php');

}
?>