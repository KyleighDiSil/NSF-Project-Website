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
    $EmailAttempt = "NULL";
  }
  else
  {
    $EmailAttempt = strtolower(trim($_POST['username']));
  }

  if ($_POST['password'] == "")
  {
    $PasswordAttempt = "NULL";
  }
  else
  {
    $PasswordAttempt = trim($_POST['password']);
  }

  // Construct Query
  $sql = "SELECT * FROM users WHERE (Email = '$EmailAttempt');"; // CDL=> and Access > 0

  // Execute Query and ensure no errors occurred
  if (!$result = mysqli_query($conn, $sql))
  {
    echo "Error";
  }
  else
  {
    session_start();
    // Salt Password
    while ($row = $result->fetch_assoc())
    {
      $Split = str_split($row['Salt'], 10);
      $Salted = $Split[0] . $PasswordAttempt . $Split[1];
      $Hashed = hash('sha256', $Salted);

      if ($row['Password'] == $Hashed)
      {
        $_SESSION['loggedin'] = true;
        $_SESSION['userID'] = $row['UserID'];
        header("Location: ../index.php");
      }
      else
      {
        header("Location: login.php#Login Failure");
      }
    }
    exit;
  }
?>