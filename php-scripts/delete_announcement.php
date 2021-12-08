<?php
/**
 * Filename    : delete_announcement.php
 *
 * Author(s)   : Chris Lloyd, Owen Casciotti, Kyleigh DiSilvestro,
 *             : Tim Guyer, Avery Hawn, Derryk Taylor
 *
 * Description : A php file to delete an announcement.
 */

	// Connect to the database
	include_once 'connect_to_database.php';

	// Validate inputs
	if (!isset($_POST["id"]))
	{
	    // Fail
	}
	else
	{
		$sql = "DELETE FROM Announcements WHERE ID = ".$_POST['id'].";";

		if (!$result = mysqli_query($conn, $sql))
		{
			echo (mysqli_error($conn));
		}
	}
?>