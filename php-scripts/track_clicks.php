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

	// Grab the fileID from the link (CDL=> How to make this dynamic for resources such as projects)
	$fileID = $_POST["fileID"];

	// Update the clicks for this link
	$query = "UPDATE Files SET Clicks=Clicks+1 WHERE FileID=$fileID;";
	$ret = mysqli_query($conn, $query);
?>