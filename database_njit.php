<!--
    Jimmy Silva, 4/4/2024, IT202-006, Web Project Phase 4 jns@njit.edu
-->
<?php
function getDB() {
    $dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=jns';
    $username = 'jns';
    $password = 'IT202@jimsil';
    try{
        $db = new PDO($dsn,$username,$password);
        //echo '<p>you are connected to the njit database!</p>';
    } catch(PDOException $ex) {
        $error_message = $ex->getMessage();
        include('database_error.php');
        exit();
    }
    return $db;
}
?>