<?php

function addToyAuth($user, $password,$email,$firstName,$lastName) {
   require_once('database_njit.php');
   $db = getDB();
   $hash = password_hash($password, PASSWORD_DEFAULT);
   $query = 'INSERT INTO toyAuth(username,passwrd,email,firstName,lastName,dateCreated)
             VALUES (:username,:passwrd,:email,:firstName,:lastName,NOW())';
   $statement = $db->prepare($query);
   $statement->bindValue(':username', $user);
   $statement->bindValue(':passwrd', $hash);
   $statement->bindValue(':email', $email);
   $statement->bindValue(':firstName', $firstName);
   $statement->bindValue(':lastName', $lastName);
   $statement->execute();
   $statement->closeCursor();
}

//addToyAuth("username1","password2","jimbob@gmail.com","Jimmy","Silva");
//addToyAuth("username2","password1","aarkum@gmail.com","Aaradhya","Kumar");
//addToyAuth("username3","password3","hammah@gmail.com","Hamza","Mahmoud");

?>