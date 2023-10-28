<?php
session_unset();
session_destroy();
// Remove cookie variables
$days = 1;
setcookie("BusUserSession","", time() - ($days * 24 * 60 * 60 * 100),"/");
// Redirect to the login page:
header('Location: index.php');
?>
