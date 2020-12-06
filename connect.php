<?php
	$firstName = $_POST['firstName'];
    $numbers = $_POST['numbers'];
	$email = $_POST['email'];
	$mesaages = $_POST['mesaages'];

	// Database connection
	$conn = new mysqli('localhost','root','','db_kivuem');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into feedBack(firstName, numbers, email, mesaages) values(?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $firstName, $numbers, $email, $mesaages);
		$execval = $stmt->execute();
		echo $execval;
		echo "Envoie successfully...";
		$stmt->close();
		$conn->close();
	}
?>