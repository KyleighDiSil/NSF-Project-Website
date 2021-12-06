<?php
/**
 * Filename    : track_clicks.php
 *
 * Author(s)   : Chris Lloyd, Owen Casciotti, Kyleigh DiSilvestro,
 *             : Tim Guyer, Avery Hawn, Derryk Taylor
 *
 * Description : A simple php script to record clicks on links.
 */

	// Connect to the database
	include_once '../php-scripts/connect_to_database.php';

	// Check what item is being referred to
	if (isset($_POST["fileID"])) // Files
	{
		$fileID = $_POST['fileID'];
		$query = "UPDATE Files SET Clicks=Clicks+1 WHERE FileID=$fileID;";

		// Update the clicks for this item
		$ret = mysqli_query($conn, $query);
	}
	elseif (isset($_POST["projectID"])) // Projects
	{
		$projectID = $_POST['projectID'];
		$query = "UPDATE Projects SET Clicks=Clicks+1 WHERE ProjectID=$projectID;";

		// Update the clicks for this item
		$ret = mysqli_query($conn, $query);
	}
?>