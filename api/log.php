<?php
	$servername = "your_db_host";
	$username = "your_db_username";
	$password = "your_db_password";
	$dbname = "your_db_name";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
			die("conn_err");
	}

	$cup = mysqli_real_escape_string($conn, $_GET['cup']);
	$volume = mysqli_real_escape_string($conn, $_GET["volume"]);

	$sql = "INSERT INTO drink_history (cup,volume,temp) VALUES ('" . $cup . "','" . $volume . "','" . $_GET["temp"] . "')";

	$query = mysqli_query($conn,$sql);

	if($query === TRUE){
		echo "done";
	}
	else{
		echo "log_err";
	}
?>
