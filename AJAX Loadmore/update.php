<?php


$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "mydb"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];


$id = $_POST['id'];




$query = "UPDATE crud SET firstname='$firstname', lastname = '$lastname', email='$email',
            mobile = '$mobile' WHERE id = $id";

$result = $conn->query($query);





?>