<!--
    Jimmy Silva, 4/4/2024, IT202-006, Web Project Phase 4 jns@njit.edu
-->
<?php 
if(null !== session_start()){
    //nothing
}else{
    if(isset($_SESSION['is_valid_user']) == false ){
        echo "you are not supposed to be here>:( <br>";
        echo "please login first";
        include('login.php');
    }
}
?>