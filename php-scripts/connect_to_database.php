<?php
/**
 * Filename    : connect_to_database.php
 *
 * Author(s)   : Chris Lloyd, Owen Casciotti, Kyleigh DiSilvestro,
 *             : Tim Guyer, Avery Hawn, Derryk Taylor
 *
 * Description : A php file to connect to the database for this website.
 */
  $dbServerName = "localhost";
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