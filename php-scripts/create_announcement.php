<?php
/**
 * Filename    : create_announcement.php
 *
 * Author(s)   : Chris Lloyd, Owen Casciotti, Kyleigh DiSilvestro,
 *             : Tim Guyer, Avery Hawn, Derryk Taylor
 *
 * Description : A php file to create an announcement.
 */

	// Connect to the database
	include_once 'connect_to_database.php';

	// Validate inputs
	if (!isset($_POST["title"]) || $_POST["title"] == "")
	{
	// Fail
	}
	elseif (!isset($_POST["content"]) || $_POST["content"] == "")
	{
	// Fail
	}
	else
	{
		date_default_timezone_set("America/New_York");
		$sql = "INSERT INTO Announcements (Title, Contents, Date_announced) VALUES ('".$_POST['title']."', '".$_POST['content']."','".date("Y-m-d")."');";

		if (!$result = mysqli_query($conn, $sql))
		{
			echo (mysqli_error($conn));
		}
		else
		{
			header("Location: ../pages/announcements.php#good");
		}
	}
?>