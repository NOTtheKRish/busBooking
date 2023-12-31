<?php
  // We need to use sessions, so you should always start sessions using the below code.
  session_name("BusUserSession");
  session_start();
  // If the user is not logged in redirect to the login page...
  if (!isset($_SESSION['loggedin'])) {
    header('Location: ../company-login.php');
    exit;
  }else{
    $currentTime = time();
    if($currentTime >= $_SESSION['expire']){
        session_unset();
        session_destroy();
        header('Location: ../company-login.php');
    }
  }
?>
