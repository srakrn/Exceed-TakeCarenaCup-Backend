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

	$cup = mysqli_real_escape_string($conn, $_GET['cup']);

	$sql = "SELECT * FROM drink_history WHERE cup='".$cup."' ORDER BY timestamp ASC";
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
	header('Content-Type: application/json');
	echo(json_encode($resultArray));
?>
