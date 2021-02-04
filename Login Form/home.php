<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="jquery-3.5.1.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  
<?php
  include "config.php";
  session_start();
  if(!isset($_SESSION['id']))
  {
      header("Location: login1.html");
  }
  $sql = "SELECT * FROM users1 WHERE id = '".$_SESSION['id']."'";

  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
?>

<h2>Welcome <?php echo $row['name']; ?>. Your details are as follows:-</h2>
ID: <?php echo $row['id']; ?><br>
Mobile no.: <?php echo $row['mob']; ?><br>
Email ID: <?php echo $row['email']; ?><br>
<a href="logout.php"><button>Logout</button></a>
</body>
</html>