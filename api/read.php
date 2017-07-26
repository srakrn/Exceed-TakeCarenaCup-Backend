<?php
	$servername = "your_db_host";
	$username = "your_db_username";
	$password = "your_db_password";
	$dbname = "your_db_name";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$key = mysqli_real_escape_string($con, $_GET['key']);
	$sql = "SELECT * FROM commands WHERE id='".$key."'";
	$query = mysqli_query($conn,$sql);
	if (!$query) {
		die("query_failed");
	}

	$resultArray = array();
	while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
		array_push($resultArray,$result);
	}
	mysqli_close($conn);
	echo($resultArray[0]["value"]);
?>