<?php
  include_once 'connect_to_database.php';
  $checks = $_POST['checkbox'];
  $temp = [];
  for ($i = 0; $i < count($checks)-1; $i++)
  {
    if ($checks[$i] == "no" && $checks[$i+1] == "Yes")
    {
      array_push($temp, 'Yes');
      $i++;
    }
    else
    {
      array_push($temp, 'No');
    }
  }
  if ($checks[$i] == 'no')
  {
    array_push($temp, 'No');
  }
  $checks = $temp;
  for ($i = 0; $i < count($checks); $i++)
  {
    echo $checks[$i]." ";
  }
  if (isset($_POST['approve']))
  {
    for ($i = 0; $i <= count($_POST['email']); $i++)
    {
      if ($checks[$i]=="Yes")
      {
        $access = $_POST['access'][$i];
        mysqli_query($conn, "UPDATE Users SET Access=$access WHERE Email='".$_POST['email'][$i]."'");
      }
    }
  } 
  else 
  {
    // print_r($_POST['email']);
    for ($i = 0; $i < count($_POST['email']); $i++)
    {
      // echo $_POST['email'][$i];
      if ($checks[$i]=="Yes")
      {
        echo $_POST['email'][$i];
        mysqli_query($conn, "DELETE FROM Users WHERE Email='".$_POST['email'][$i]."'");
      }
    }
  }
  header("Location: ../pages/account_management.php");

  // $access = $_POST['access'];
  // $emails = $_POST['email'];
  // $button = isset($_POST['approve']) ? 'Approve' : 'Delete';

?>