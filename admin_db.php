<?php

function is_valid_admin_login($email, $password) {
    require_once('database_njit.php');

    $query = 'SELECT password FROM toyAuth WHERE username = :username';
  
    $statement = $db->prepare($query);
  
    $statement->bindValue(':username', $email);
  
    $statement->execute();
  
    $row = $statement->fetch();
  
    $statement->closeCursor();  
  
    if ($row === false) {
  
      return false;
  
    } else {
  
      $hash = $row['passwrd'];
  
      return password_verify(hash('md5',$password), $hash);
  
    }
}
?>