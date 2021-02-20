<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "mydb"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$fil = $_POST['x'];

if($fil == "none")
{
    $query = "SELECT * FROM crud";
    $result = $db->query($query);
}
else if($fil == "male")
{
    $query = "SELECT * FROM crud WHERE gender = 'male'";
    $result = $db->query($query);
}
if($fil == "female")
{
    $query = "SELECT * FROM crud WHERE gender = 'female'";
    $result = $db->query($query);
}

if($result->num_rows >0){
    
$output = "";

$output .= "<table>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Contact no</th>
            <th>Gender</th>
            </tr>";


$id = 1;                 

while($row = $result->fetch_array())
{
    
    
    $output .= "<tr>
    <td>".$id."</td>
    <td>".$row['firstname']."</td>
    <td>".$row['lastname']."</td>
    <td>".$row['email']."</td>    
    <td>".$row['contact']."</td>
    <td>".$row['gender']."</td>
   
</tr>";

$id += 1;

}

$output .= "</table>";

echo $output;

$db->close();

}
else {
    echo "<h1>No records found</h1>";
}


?>