<!--
    Jimmy Silva, 4/4/2024, IT202-006, Web Project Phase 4 jns@njit.edu
-->
<?php

require_once('admin_db.php');

session_start();


$email = filter_input(INPUT_POST, 'email');

$password = filter_input(INPUT_POST, 'passwrd');

if (is_valid($email,$password)) {

  $_SESSION['is_valid_user'] = true;

  // redirect logged in user to default page

  $db = getDB();

  $query = 'SELECT firstName,lastName FROM toyAuth WHERE email = :email';

  $statement = $db->prepare($query);

  $statement->bindValue(':email', $email);

  $statement->execute();

  $row = $statement->fetch();

  $statement->closeCursor();
  
  $text = "Welcome, " . $row['lastName'] . ", " . $row['firstName'] . "!";

  echo $text;
  
  include('index.php');

} else {

 if ($email == NULL && $password == NULL) {

  $login_message ='You must login to view this page.';

 } else {

  $login_message = 'Invalid credentials.';
  

 }

  include('login.php');

}
?>