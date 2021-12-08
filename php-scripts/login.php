<!--
Filename     : login.php
Author(s)    :
Date Created : 21/10/28
Description  : A php file to authenticate a user
-->

<?php
  // Connect to the database
  include_once 'connect_to_database.php';

  // Validate inputs
  if ($_POST['username'] == "")
  {
    // Invalid login
    header("Location: ../pages/login.php#LoginFailure");
  }
  else
  {
    // Sets email attempt to all lowercase + no whitespace
    $EmailAttempt = strtolower(trim($_POST['username']));
  }

  if ($_POST['password'] == "")
  {
    // Invalid login
    header("Location: ../pages/login.php#LoginFailure");
  }
  else
  {
    // Stores password without whitespace
    $PasswordAttempt = trim($_POST['password']);
  }

  // Construct Query
  $sql = "SELECT * FROM users WHERE (Email = '$EmailAttempt' AND Access > 0) LIMIT 1;";

  // Execute Query and ensure no errors occurred
  if (!$result = mysqli_query($conn, $sql))
  {
    echo (mysqli_error($conn));
    header("Location: ../pages/login.php#LoginFailure");
  }
  else
  {
    session_start();
    $row = $result->fetch_assoc();

    // Gets salt from database and cuts it in half
    $Split = str_split($row['Salt'], 10);

    // Adds salt to front and back of password
    $Salted = $Split[0] . $PasswordAttempt . $Split[1];

    // Hash password for security
    $Hashed = hash('sha256', $Salted);

    // Checks password is same as database
    if ($row['Password'] == $Hashed)
    {
      // Sets session property to show user is logged in with userID
      $_SESSION['loggedin'] = true;
      $_SESSION['userID'] = $row['UserID'];
      header("Location: ../index.php");
    }
    else
    {
      header("Location: ../pages/login.php#LoginFailure");
    }
  }
?>