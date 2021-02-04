<?php
   
include "config.php";
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users1 WHERE email = '$email' and password = '$password' ";

$result = $conn->query($sql);

if($result->num_rows > 0)
{ 
    $row = $result->fetch_assoc();
    $_SESSION['id']=$row['id'];
  
    ?>
    <script>

        window.location.href = 'home.php';

    </script>

   
<?php }

else{

    echo "<script>alert('Invalid credentials!');</script>";
}

$conn->close();



?>