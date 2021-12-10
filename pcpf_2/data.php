<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email_id = $_POST['email_id'];
	$Ph_number = $_POST['Ph_number'];
	$foodpref = $_POST['foodpref'];

	// Database connection
	$conn = new mysqli('localhost','root','','personal_details');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into details(fname, lname, email_id, Ph_number, foodpref) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssis", $fname, $lname, $email_id, $Ph_number, $foodpref);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successful";
		$stmt->close();
		$conn->close();
	}
?>