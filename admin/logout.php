<?php
   session_start();
   
   // Unset all of the session variables.
   $_SESSION = array();

   header('location: ../index.php');
?>