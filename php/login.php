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
  $sql = "SELECT * FROM account WHERE Email = '$EmailAttempt';";

  // Execute Query and ensure no errors occurred
  if (!$result = mysqli_query($conn, $sql))
  {
    echo (mysqli_error($conn));
  }
  else
  {
    // Salt Password
    while ($row = $result->fetch_assoc())
    {
      $Split = str_split($row['Salt'], 10);
      $Salted = $Split[0] . $PasswordAttempt . $Split[1];
      $Hashed = hash('sha256', $Salted);

      if ($row['Password'] == $Hashed)
      {
        header("Location: ../html/index.html#LoginSuccess");
      }
      else
      {
        header("Location: ../html/index.html#LoginFailure");
      }
    }
  }
?>