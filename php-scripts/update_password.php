<?php
  require "../php-scripts/get_access.php";

  // Connect to the database
  include_once 'connect_to_database.php';

  // Validate inputs

  // CDL=> Handle SALT
  if (!$result = mysqli_query($conn, "UPDATE Users SET FirstName = '$first', LastName = '$last', Email = '$email', University = '$university', CourseTitle = '$course'
  WHERE UserID = ".$_SESSION['userID'].";"))
  {
    echo "Error"; # CDL=> Should handle errors better
  }
  else
  {
    header("Location: ../pages/account_management.php#PasswordUpdated");
  }

?>