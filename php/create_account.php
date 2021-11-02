<!--
Filename     : create_account.php
Author(s)    :
Date Created : Fall 2021
Description  : A php file to authenticate a user
-->

<?php
  // Connect to the database
  include_once 'connect_to_database.php';

  // Validate inputs
  if ($_POST["firstName"] == "")
  {
    // Fail
  }
  elseif ($_POST["lastName"] == "")
  {
    // Fail
  }
  elseif ($_POST["email"] == "")
  {
    // Fail
  }
  elseif ($_POST["university"] == "")
  {
    // Fail
  }
  elseif ($_POST["course"] == "")
  {
    // Fail
  }
  elseif ($_POST["password"] == "")
  {
    // Fail
  }
  elseif ($_POST["passwordConfirmation"] == "")
  {
    // Fail
  }
  elseif ($_POST["password"] != $_POST["passwordConfirmation"])
  {
    // Fail
  }
  
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $salt = '';
  for ($i = 0; $i < 20; $i++) {
    $randstring = $characters[rand(0, strlen($characters))];
  }

  $Split = str_split($salt, 10);
  $Salted = $Split[0] . $_POST["password"] . $Split[1];
  $Hashed = hash('sha256', $Salted);

  $SQL = "INSERT INTO Users (FirstName, LastName, Email, Salt, Password, Access, University, CourseTitle) VALUES ($_POST['firstName'] $_POST['lastName'] $_POST['email'] $salt $Hashed '-1' $_POST['university'] $_POST['course'] );"

  if (!$result = mysqli_query($conn, $SQL))
  {
    echo (mysqli_error($conn));
  }
  else
  {
    header("Location: ../index.html#AccountCreated");
  }

?>