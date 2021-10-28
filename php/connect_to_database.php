<!--
Filename     : connect_to_database.php
Author(s)    :
Date Created : 21/10/28
Description  : A php file to connect to the database for this website
-->

<?php
  $dbServerName = "localhost:3307";
  $dbUsername = "root";
  $dbPassword = "";
  $dbName = "NSFDatabase";

  // Connect to database
  $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

  // Ensure connection valid
  if (mysqli_connect_errno() || ($conn == null))
  {
    echo("Database connection failed!");
  }
?>