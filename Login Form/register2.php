
<?php
include "config.php";
$id = $_POST['id'];
$name = $_POST['name'];
$mob = $_POST['mob'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO users1(`id`,`name`, `mob`, `email`, `password`) VALUES ('$id','$name','$mob','$email','$password')";

		

		$result = $conn->query($sql);

		if ($result == TRUE) {
         echo "<script>alert('New record created successfully.');</script>";
			
		}else{
			echo "Error:". $sql . "<br>". $conn->error;
		}

		$conn->close();



?>