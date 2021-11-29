<?php
  require "../php-scripts/get_access.php";

  // Connect to the database
  include_once 'connect_to_database.php';

  // Validate inputs
  if ($_POST['old-pass'] == "")
  {
    // Empty
  }
  if ($_POST['new-pass'] == "")
  {
    // Empty
  }
  if ($_POST['new-pass'] != $_POST['confirm-new-pass'])
  {
    // Not matching passwords
  }
  $uid = $_SESSION['userID'];
  $get_salt = "SELECT Salt FROM Users WHERE UserID = $uid;";
  if (!$result = mysqli_query($conn, $get_salt))
  {
    echo "Error"; //Need better errors
  }
  else
  {
    $row = $result->fetch_assoc();
    $Salt = $row['Salt'];
    $Split = str_split($Salt, 10);
    $Salted = $Split[0] . $_POST["new-pass"] . $Split[1];
    $Hashed = hash('sha256', $Salted);

    $update_pass = "UPDATE Users SET Password = $Hashed WHERE UserID = $uid;";
    mysqli_query($conn, $update_pass);
    
    header("Location: ../pages/account_management.php#PasswordUpdated");
  }

?>