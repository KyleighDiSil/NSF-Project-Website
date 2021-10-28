<!--
Filename: login.php
Name: Chris lloyd
Date: 21/10/02
Description: The page that validates login info from the database
-->

<?php
    // Connect to the database
    include_once 'connect_to_database.php';

    // Validate inputs
    if ($_POST['username'] == "")
    {$UsernameAttempt = "NULL";}
    else
    {$UsernameAttempt = trim($_POST['username']);}

    if ($_POST['password'] == "")
    {$PasswordAttempt = "NULL";}
    else
    {$PasswordAttempt = trim($_POST['password']);}

    // Construct Query
    $sql = "SELECT (username) FROM LoginAccount WHERE username LIKE '$UsernameAttempt' AND password = '$PasswordAttempt';";

    // Execute Query and error check // CDL=>
    if (!$result = mysqli_query($conn, $sql))
    {
        echo (mysqli_error($conn));
    }
    else
    {
        if ($result->num_rows > 0)
        {
            header("Location: ../index.php#LoginSuccess");
        }
        else
        {
            header("Location: ../index.php#LoginFailure");
        }
    }
?>