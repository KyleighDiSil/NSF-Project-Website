<?php
/**
 * Filename    : gitea_api_wrapper.php
 *
 * Author(s)   : Chris Lloyd, Owen Casciotti, Kyleigh DiSilvestro,
 *             : Tim Guyer, Avery Hawn, Derryk Taylor
 *
 * Description : A library file to interface user authentication with the
 *             : Gitea server using the Gitea API with the HTTP/Restful
 *             : command structure.
 */

// *****************************************************************************
// Constants
// *****************************************************************************

/**
 * The API token to authenticate API calls.
 */
define("GITEA_API_TOKEN", "token d357a17e044e5c7ca41ae818f0f937eff205c4ad");

/**
 * The URL of the Gitea server (should include port and ending '/').
 */
define("GITEA_URL", "http://192.168.0.118:3000/");

/**
 * The Organization used by the Gitea server.
 */
define("ORGANIZATION_NAME", "NSF-SE-Repositories");

/**
 * The Admin (Team Member/Webmasters/Admin) team ID used by the Gitea server.
 */
define("ADMIN_TEAM", "1");

/**
 * The Instructor team ID used by the Gitea server.
 */
define("INSTRUCTOR_TEAM", "2");


// *****************************************************************************
// Function Definitions
// *****************************************************************************

/**
 * A function to call the Gitea API using HTTP/Restful command structure.
 *
 * @global string $GITEA_API_TOKEN The API token to authenticate API calls.
 * @global type   $GITEA_URL       The URL of the Gitea server
 *                                 (should include port and ending '/').
 *
 * @param string $method The HTTP method to use.
 * @param string $url    The URL command to run (should not include base URL
 *                       address or initial '/' just the command).
 * @param array $data    The data array to pass with the API call.
 *
 * @return string Response JSON structure.
 */
function callGitteaAPI($method, $url, $data)
{
	// Initialize CURL command
	$curl = curl_init();

	// Check which HTTP method is being used
	switch ($method)
	{
		case "POST":
			curl_setopt($curl, CURLOPT_POST, 1);
			if ($data)
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			break;

		case "PUT":
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
			if ($data)
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			break;

		case "PATCH":
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
			if ($data)
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			break;

		case "DELETE":
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
			if ($data)
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			break;

		case "GET":
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
			if ($data)
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			break;

		default:
			if ($data)
				$url = sprintf("%s?%s", $url, http_build_query($data));
	}

	// Add URL
	curl_setopt($curl, CURLOPT_URL, GITEA_URL.$url);

	// Add token key information
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		"Authorization: ".GITEA_API_TOKEN,
		"Content-Type: application/json",
	));
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

	// Run API Call
	$result = curl_exec($curl);
	$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

	// CDL=> Add better error checking
	if ($httpcode == 422){die("Validation Error: ".implode(" ", json_decode($result, true)));}
	//    if($method != "DELETE" && !$result){die("Connection Failure");}
	curl_close($curl);

	return $result;
}

/**
 * A function to add a user account to the Gitea server.
 *
 * @param string  $first_name The first name of the user.
 * @param string  $last_name  The last name of the user.
 * @param string  $email      The email of the user
 * @param boolean $is_admin   Whether the user is an admin user.
 *
 * @return boolean Whether the user creation was successful.
 */
function addGiteaUser($first_name, $last_name, $email, $is_admin)
{
	// Get the username from the first and last name
	$username = strtolower($first_name[0].$last_name);

	// Create data array to send with API call
	$data_array = array(
		"email"                => $email,
		"full_name"            => $first_name." ".$last_name,
		"login_name"           => $first_name." ".$last_name,
		"must_change_password" => true,
		"password"             => "cdlrandomstring",
		"send_notify"          => true,
		"source_id"            => 0,
		"username"             => $username,
		"visibility"           => "public"
	);

	// Invoke API call
	callGitteaAPI("POST", "api/v1/admin/users", json_encode($data_array));

	// Set the Git Admin status and add user to organization
	updateGiteaAdmin($first_name, $last_name, $is_admin);

	return true; // CDL=> Update later to return a status
}

/**
 * A function to remove a user account from the Gitea server.
 *
 * @param string  $first_name The first name of the user.
 * @param string  $last_name  The last name of the user.
 *
 * @return boolean Whether the user removal was successful.
 */
function removeGiteaUser($first_name, $last_name)
{
	// Remove the user from the organization
	removeGiteaOrgUser($first_name, $last_name);

	// Get the username from the first and last name
	$username = strtolower($first_name[0].$last_name);

	// Invoke API call
	$make_call = callGitteaAPI("DELETE", "api/v1/admin/users/".$username, NULL);

	return true; // CDL=> Update later to return a status
}

/**
 * A function to update user account information on the Gitea server.
 *
 * @param string  $first_name     The current first name of the user.
 * @param string  $last_name      The current last name of the user.
 * @param boolean $is_admin       Whether the user is an admin user.
 * @param string  $new_first_name The new first name of the user.
 * @param string  $new_last_name  The new last name of the user.
 * @param string  $new_email      The new email of the user
 *
 * @return boolean Whether the user information update was successful.
 */
function updateGiteaUser($first_name,
						 $last_name,
						 $is_admin,
						 $new_first_name,
						 $new_last_name,
						 $new_email)
{
	removeGiteaUser($first_name, $last_name);
	addGiteaUser($new_first_name, $new_last_name, $new_email, $is_admin);

	return true; // CDL=> Update later to return a status
}

/**
 * A function to set the user admin status on the Gitea server.
 *
 * @param string  $first_name The first name of the user.
 * @param string  $last_name  The last name of the user.
 * @param boolean $is_admin   Whether the user is an admin user.
 *
 * @return boolean Whether the user admin status update was successful.
 */
function updateGiteaAdmin($first_name, $last_name, $is_admin)
{
	// Get the username from the first and last name
	$username = strtolower($first_name[0].$last_name);

	// Create data array to send with API call
	$data_array = array(
		"login_name" => $first_name." ".$last_name,
		"source_id"  => 0,
		"admin"      => $is_admin
	);

	// Invoke API call
	callGitteaAPI("PATCH", "api/v1/admin/users/".$username, json_encode($data_array));

	// Update the organization status of the current user
	updateGiteaOrgUser($first_name, $last_name, $is_admin);

	return true; // CDL=> Update later to return a status
}

/**
 * A function to add a user to the organization on the Gitea server.
 *
 * @param string  $first_name The first name of the user.
 * @param string  $last_name  The last name of the user.
 * @param boolean $is_admin   Whether the user is an admin user.
 *
 * @return boolean Whether the user organization update was successful.
 */
function updateGiteaOrgUser($first_name, $last_name, $is_admin)
{
	// Remove the user from the org first
	removeGiteaOrgUser($first_name, $last_name);

	// Get the username from the first and last name
	$username = strtolower($first_name[0].$last_name);

	// Invoke API call
	callGitteaAPI("PUT", "api/v1/teams/".($is_admin?ADMIN_TEAM:INSTRUCTOR_TEAM)."/members/".$username, NULL);

	return true; // CDL=> Update later to return a status
}

/**
 * A function to remove a user from the organization on the Gitea server.
 *
 * @param string  $first_name The first name of the user.
 * @param string  $last_name  The last name of the user.
 *
 * @return boolean Whether the user organization update was successful.
 */
function removeGiteaOrgUser($first_name, $last_name)
{
	// Get the username from the first and last name
	$username = strtolower($first_name[0].$last_name);

	// Invoke API call
	callGitteaAPI("DELETE", "api/v1/orgs/".ORGANIZATION_NAME."/members/".$username, NULL);

	return true; // CDL=> Update later to return a status
}


// *****************************************************************************
// Testing Code to ensure functionality
// *****************************************************************************
// Remove user if exists
// removeGiteaUser("Sam", "Lloyd");

// // Add non-admin user
// addGiteaUser("Sam", "Lloyd", "legoman3267@gmail.com", false);

// // Change user's name and email
// updateGiteaUser("Sam", "Lloyd", false, "Samuel", "Lloyd", "legoman3267@gmail.com");

// // Premote user to admin
// updateGiteaAdmin("Sam", "Lloyd", true);
?>