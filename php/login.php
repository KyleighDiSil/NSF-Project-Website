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
    $UsernameAttempt = "NULL";
  }
  else
  {
    $UsernameAttempt = trim($_POST['username']);
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
  $sql = "SELECT (Email) FROM account WHERE Email LIKE '$UsernameAttempt' AND password = '$PasswordAttempt';";

  // Execute Query and ensure no errors occurred
  if (!$result = mysqli_query($conn, $sql))
  {
    echo (mysqli_error($conn));
  }
  else
  {
    if ($result->num_rows > 0)
    {
      header("Location: ../html/index.html#LoginSuccess");
    }
    else
    {
      header("Location: ../html/index.html#LoginFailure");
    }
  }
?>