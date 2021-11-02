<?php
    include_once '../php-scripts/connect_to_database.php';

    session_start();
    $STATUS = false;
    $ACCESS = 0;
    if (isset($_SESSION["loggedin"]))
    {
        $STATUS = true;
        if (!$result = mysqli_query($conn, "SELECT Access FROM Users WHERE UserID = " .$_SESSION['userID']. ";"))
        {
            echo "Error";
        }
        else
        {
            while ($row = $result->fetch_assoc())
            {
            $ACCESS = $row["Access"];
            }
        }
    }
?>