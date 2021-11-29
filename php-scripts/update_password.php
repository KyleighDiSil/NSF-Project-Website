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

  $get_salt = "SELECT Salt from users where ID = $_SESSION['userID'];";
  if (!$result = mysqli_query($conn, $get_salt))
  {
    echo "Error"; //Need better errors
  }
  else
  {
    $row = $result->fetch_assoc();
    $Salt = $row['Salt'];
    $Salted = $Split[0] . $_POST["new-pass"] . $Split[1];
    $Hashed = hash('sha256', $Salted);

    $update_pass = "UPDATE Users SET Password = $Hashed WHERE ID = $_SESSION['userID'];";
    mysqli_query($conn, $update_pass);
    
    header("Location: ../pages/account_management.php#PasswordUpdated");
  }

?>