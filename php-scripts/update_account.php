<!--
Filename     : update_account.php
Author(s)    :
Date Created : Fall 2021
Description  : A php file to update a user's details
-->

<?php
  require "../php-scripts/get_access.php";

  // Connect to the database
  include_once 'connect_to_database.php';

  if (!$result = mysqli_query($conn, "SELECT FirstName, LastName, Email, University, CourseTitle, UserID FROM Users WHERE UserID = ".$_SESSION['userID'].";"))
  {
      echo "Error"; # CDL=> Should handle errors better
  }
  else
  {
      while ($row = $result->fetch_assoc())
      {
          $first = $row["FirstName"];
          $last = $row["LastName"];
          $email = $row["Email"];
          $university = $row["University"];
          $course = $row["CourseTitle"];
      }
  }

  // Validate inputs
  if ($_POST["first-name"] != "")
  {
    $first = $_POST["first-name"];
  }
  elseif ($_POST["last-name"] != "")
  {
    $last = $_POST["last-name"];
  }
  elseif ($_POST["email"] != "")
  {
    $email = $_POST["email"];
  }
  elseif ($_POST["university"] != "")
  {
    $university = $_POST["university"];
  }
  elseif ($_POST["course"] != "")
  {
    $course = $_POST["course"];
  }

  if (!$result = mysqli_query($conn, "UPDATE Users SET FirstName = '$first', LastName = '$last', Email = '$email', University = '$university', CourseTitle = '$course'
  WHERE UserID = ".$_SESSION['userID'].";"))
  {
    echo "Error"; # CDL=> Should handle errors better
  }
  else
  {
    header("Location: ../pages/account_management.php#AccountUpdated");
  }

?>