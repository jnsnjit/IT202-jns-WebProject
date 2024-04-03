<!--
    Jimmy Silva, 2/14/2024, IT202-006, Web Project Phase 3 jns@njit.edu
-->
<?php

session_start();

$_SESSION = [];  // Clear all session data from memory

session_destroy();     // Clean up the session ID

$login_message = 'You have been logged out.';

include('login.php');

?>