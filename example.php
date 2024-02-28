<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','sample');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into sam(name,email, address, number) values(?, ?,?, ?)");
		$stmt->bind_param("sssi", $name, $email, $address, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
