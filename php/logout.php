<?php
session_start();
$_SESSION['loggedin'] = false;
$_SESSION['userID'] = "";
session_destroy();
header('Location: ../index.php');
exit;
?>