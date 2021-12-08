<?php
    include_once '../php-scripts/connect_to_database.php';

    session_start();
    // Global variables used to track users logged in and their access level
    $STATUS = false;
    $ACCESS = 0;
    // Checks session to see if user is logged in
    if (isset($_SESSION["loggedin"]))
    {
        $STATUS = true;
        // Need to query database to get the users access level
        if (!$result = mysqli_query($conn, "SELECT Access FROM Users WHERE UserID = " .$_SESSION['userID']. ";"))
        {
            echo "Error";
        }
        else
        {
            while ($row = $result->fetch_assoc())
            {
            // Sets global variable access to the users access level from the database
            $ACCESS = $row["Access"];
            }
        }
    }
?>