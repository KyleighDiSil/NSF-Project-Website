<?php
  require "../php-scripts/get_access.php";

  // Connect to the database
  include_once 'connect_to_database.php';

  // Validate inputs
  if ($_POST['old-pass'] == "")
  {
    // No old password entered
    header("Location: ../pages/account_management.php#UpdateFailed");
  }
  if ($_POST['new-pass'] == "")
  {
    // No new password entered
    header("Location: ../pages/account_management.php#UpdateFailed");
  }
  if ($_POST['new-pass'] != $_POST['confirm-new-pass'])
  {
    // New password does not match confirmation of new password
    header("Location: ../pages/account_management.php#UpdateFailed");
  }
  $uid = $_SESSION['userID'];
  $get_salt = "SELECT (Salt Password) FROM Users WHERE UserID = $uid;";
  if (!$result = mysqli_query($conn, $get_salt))
  {
    echo "Error"; //Need better errors
  }
  else
  {
    $row = $result->fetch_assoc();
    $Salt = $row['Salt'];
    $Split = str_split($Salt, 10);
    
    // Check if old password is correct
    $old_hashed = hash('sha256', $Split[0] . $_POST["old-pass"] . $Split[1]);
    if ($old_hashed != $row['Password'])
    {
      // Password doesn't match
      header("Location: ../pages/account_management.php#UpdateFailed");
    }
    else
    {
      // Get salt from sql query and put the salt around it
      $Salted = $Split[0] . $_POST["new-pass"] . $Split[1];
      
      // Hash password to store in the database
      $Hashed =a hash('sha256', $Salted);

      // SQL query to update the users passwords
      $update_pass = "UPDATE Users SET Password= '$Hashed' WHERE UserID = $uid;";
      mysqli_query($conn, $update_pass);
      
      header("Location: ../pages/account_management.php#PasswordUpdated");
    }
  }
?>
