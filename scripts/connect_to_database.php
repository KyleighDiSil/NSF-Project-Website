<!--
Filename: connect_to_database.php
Name: Seth Canfield, Nick Brown, Chris Lloyd
Date: 18/12/12
Description: A php file to connect to the SectorAptManager database
-->

<?php
    $dbServerName = "128.153.220.125:42068";
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