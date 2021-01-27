
<?php
include "config.php";
$id = $_POST['id'];
$name = $_POST['name'];

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO `ajax` (`id`, `name`, `password`, `email`) VALUES ('$id', '$name', '$password', '$email');";

		

		$result = $conn->query($sql);

		if ($result == TRUE) {
         echo "<script>alert('Data has been inserted successsfully');</script>";
      
		}else{
			echo "Error:". $sql . "<br>". $conn->error;
		}

        
        $sql1 = "SELECT * FROM ajax";

        $result1 = $conn->query($sql1);
        ?>
        <html>
        <body>
	    <div class="container">
		<h2>All Users</h2>
        <table class="table">
	    <thead>
		<tr>
		<th>Id</th>
		<th>Name</th>		
		<th>Email</th>
	    </tr>
	    </thead>
	    <tbody>	
        <?php
        if ($result1->num_rows > 0) {
            
                        
            while ($row = $result1->fetch_assoc()) {
                ?>
                <tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['email']; ?></td>
                </tr>
                                
                
                <?php
            }}?>
            
            </tbody>
            </table>
        </div>
        </body>
        </html>
                



