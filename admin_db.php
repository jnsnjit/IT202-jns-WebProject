<!--
    Jimmy Silva, 4/4/2024, IT202-006, Web Project Phase 4 jns@njit.edu
-->
<?php

function is_valid($email, $pass) {
  require_once('database_njit.php');

  $db = getDB();

  $query = 'SELECT passwrd FROM toyAuth WHERE email = :email';

  $statement = $db->prepare($query);

  $statement->bindValue(':email', $email);

  $statement->execute();

  $row = $statement->fetch();

  $statement->closeCursor();  

  if ($row === false) {

    return false;

  } else {

    $hash = $row['passwrd'];
    //return $hash;
    return password_verify($pass, $hash);
  }
}
?>