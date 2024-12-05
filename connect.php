<?php
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Phone = $_POST['Phone'];
    $Mes =$_POST['Mes'];

	// Database connection
	$conn = new mysqli('localhost','root','','contact');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into gago(Name, Email, Phone, Mes) values( ?, ?, ?, ?)");
		$stmt->bind_param("ssis", $Name, $Email, $Phone, $Mes);
		$execval = $stmt->execute();  
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>