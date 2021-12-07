<?php
session_start();
// Clearing session properties and destroying it
$_SESSION['loggedin'] = false;
$_SESSION['userID'] = "";
session_destroy();
// Returns to home page
header('Location: ../index.php');
?>