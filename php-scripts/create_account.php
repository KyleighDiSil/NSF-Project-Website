<!--
Filename     : create_account.php
Author(s)    :
Date Created : Fall 2021
Description  : A php file to authenticate a user
-->

<?php
  // Connect to the database
  include_once 'connect_to_database.php';

  // Import Gitea wrapper
  include_once 'gitea_api_wrapper.php';

  // Validate inputs
  if ($_POST["firstName"] == "")
  {
    // Fail
    header("Location: ../pages/create_account.php#CreationFailure");
  }
  elseif ($_POST["lastName"] == "")
  {
    // Fail
    header("Location: ../pages/create_account.php#CreationFailure");
  }
  elseif ($_POST["email"] == "")
  {
    // Fail
    header("Location: ../pages/create_account.php#CreationFailure");
  }
  elseif ($_POST["university"] == "")
  {
    // Fail
    header("Location: ../pages/create_account.php#CreationFailure");
  }
  elseif ($_POST["course"] == "")
  {
    // Fail
    header("Location: ../pages/create_account.php#CreationFailure");
  }
  elseif ($_POST["password"] == "")
  {
    // Fail
    header("Location: ../pages/create_account.php#CreationFailure");
  }
  elseif ($_POST["passwordConfirmation"] == "")
  {
    // Fail
    header("Location: ../pages/create_account.php#CreationFailure");
  }
  elseif ($_POST["password"] != $_POST["passwordConfirmation"])
  {
    // Fail
    header("Location: ../pages/create_account.php#CreationFailure");
  }
  else
  {
    // Random string generation to augement the password complexity
    $salt = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(20/strlen($x)) )),1,20);

    // Take half of the string to put in front of password and the other for behind the password
    $Split = str_split($salt, 10);
    $Salted = $Split[0] . $_POST["password"] . $Split[1];

    // Hashing the password + salt for secure password storage
    $Hashed = hash('sha256', $Salted);

    // SQL Query to insert new user into database with pending statud
    $SQL = "INSERT INTO Users (FirstName, LastName, Email, Salt, Password, Access, University, CourseTitle) VALUES ( '" .$_POST['firstName']. "', '" .$_POST['lastName']. "', '" .$_POST['email']. "', '" .$salt. "', '" .$Hashed.  "', -1, '" .$_POST['university']. "', '" .$_POST['course']. "');";
    if (!$result = mysqli_query($conn, $SQL))
    {
      echo (mysqli_error($conn));
    }
    else
    {
      #addGiteaUser($_POST['firstName'], $_POST['lastName'], $_POST['email'], false);
      header("Location: ../index.php#AccountCreated");
    }
  }
?>