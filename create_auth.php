<!--
    Jimmy Silva, 4/4/2024, IT202-006, Web Project Phase 4 jns@njit.edu
-->
<?php

$toyCode = filter_input(INPUT_POST, 'toyCode', FILTER_DEFAULT);
$toyName = filter_input(INPUT_POST, 'toyName', FILTER_DEFAULT);
$description = filter_input(INPUT_POST, 'description', FILTER_DEFAULT);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$toyCategoryID = filter_input(INPUT_POST, 'toyCategory',FILTER_DEFAULT);
$sale = 1;
$error_m = '';

// validating 
if ($price === FALSE) {
    $error_m .= 'Price must be a valid number. <br>';
} else if ( $price > 1000 ){
    $error_m .= 'Price of the toy must be a less then 1000$. <br>';
} else if ($price <= 0){
    $error_m .= 'Price must be greater than zero. <br>';
}
if ($toyName == NULL || $description == NULL) {
    $error_m .= "Invalid product data. Check all fields and try again.";
}
if($error_m != '') {
    include('create.php');
    exit();
}
// apply formatting
$price = number_format($price, 2);

require_once('database_njit.php');
$db = getDB();
//check if toyCode is unique, sql query
$query = 'INSERT INTO toy
                 (toyCategoryID, toyCode, toyName, onSale, description, price, dateCreated)
              VALUES
                 (:toy_category_id, :toy_code, :toy_name,:toy_sale,:description,:price,NOW())';
$statement = $db->prepare($query);
$statement->bindValue(':toy_category_id', $toyCategoryID);
//line that potentially can cause error.
$statement->bindValue(':toy_code', $toyCode);
//

$statement->bindValue(':toy_name', $toyName);
$statement->bindValue(':toy_sale', $sale);
$statement->bindValue(':description', $description);
$statement->bindValue(':price', $price);
//$statement->bindValue(':date_created', 'NOW()');
try{
    $success = $statement->execute();
    //echo '<p>you are connected to the njit database!</p>';
} catch(PDOException $ex) {
    $error_m .= 'duplicate entry of toy code, create a different code.';
    include('create.php');
    exit();
}
$statement->closeCursor();
include('shop_database.php')
//echo print_r($toyCode);
?>