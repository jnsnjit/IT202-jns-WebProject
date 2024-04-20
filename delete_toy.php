<?php
require_once("database_njit.php");
$db = getDB();

$toy_id = filter_input(INPUT_POST, 'toy_id',FILTER_VALIDATE_INT);

//delete the product from database

if ($toy_id != false){
    $query = 'DELETE FROM toy WHERE toyID = :toy_ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':toy_ID',$toy_id);
    $success = $statement->execute();
    $statement->closeCursor();
    echo "<p>your delete statement status is $success</p>";


//display the product list page
}
include('shop_database.php');
?>