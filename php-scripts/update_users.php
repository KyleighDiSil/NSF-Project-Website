<?php
  include_once 'connect_to_database.php';

  // A lot of weird logic is about to happen. Please bear with me

  // Gets list of check boxes
  $checks = $_POST['checkbox'];
  
  // Temporary list for tracking checks
  $temp = [];

  // Looping through all but the last check box
  for ($i = 0; $i < count($checks)-1; $i++)
  {
    // Need to check for no followed by Yes. This indicates a checkbox clicked.
    if ($checks[$i] == "no" && $checks[$i+1] == "Yes")
    {
      // If so, add yes to temp list and increment counter to account for checking two indices
      array_push($temp, 'Yes');
      $i++;
    }
    else
    {
      // Otherwise add no and only increment once
      array_push($temp, 'No');
    }
  }

  // Checking the last index for a no
  if ($checks[$i] == 'no')
  {
    // Add No to temp if true
    array_push($temp, 'No');
  }

  // Set checks to temp
  $checks = $temp;
  // Weird logic is done

  // Looping through list of checked boxes
  for ($i = 0; $i < count($checks); $i++)
  {
    echo $checks[$i]." ";
  }
  // If approve button was clicked
  if (isset($_POST['approve']))
  {

    // Loop through all emails in table
    for ($i = 0; $i <= count($_POST['email']); $i++)
    {
      // If the checkbox was clicked
      if ($checks[$i]=="Yes")
      {
        // Get new access level
        $access = $_POST['access'][$i];
        // Run SQL query to update that new access
        mysqli_query($conn, "UPDATE Users SET Access=$access WHERE Email='".$_POST['email'][$i]."'");
      }
    }
  } 
  else // If the delete button was clicked
  {
    // Loop through all emails in the list
    for ($i = 0; $i < count($_POST['email']); $i++)
    {
      // If checkbox clicked
      if ($checks[$i]=="Yes")
      {
        echo $_POST['email'][$i];
        // Delete user from table by email
        mysqli_query($conn, "DELETE FROM Users WHERE Email='".$_POST['email'][$i]."'");
      }
    }
  }
  // Return to account management
  header("Location: ../pages/account_management.php");
?>