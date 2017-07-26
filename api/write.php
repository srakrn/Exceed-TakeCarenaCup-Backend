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

	$key = mysqli_real_escape_string($con, $_GET["key"]);
	$value = mysqli_real_escape_string($con, $_GET["value"]);

	$sql = "UPDATE commands SET value='".$key."' WHERE id='".$value."'";

	$query = mysqli_query($conn,$sql);

	if($query === TRUE){
		echo "done";
	}
	else{
		echo "write_err";
	}
?>

