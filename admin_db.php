<!--
    Jimmy Silva, 4/4/2024, IT202-006, Web Project Phase 4 jns@njit.edu
-->
<?php

function is_valid_user($user, $pass) {
    require_once('database_njit.php');

    $query = 'SELECT passwrd FROM toyAuth WHERE username = :username';
  
    $statement = $db->prepare($query);
  
    $statement->bindValue(':username', $user);
  
    $statement->execute();
  
    $row = $statement->fetch();
  
    $statement->closeCursor();  
  
    if ($row === false) {
  
      return false;
  
    } else {
  
      $hash = $row['passwrd'];
  
      //return password_verify(hash('md5',$pass), $hash);
      return password_verify($pass, $hash);
  
    }
}
?>