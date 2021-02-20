<?php

include 'connection.php';


$sort = $_POST['a'];

if($sort == "none")
{
    $query = "SELECT * FROM ajaxcrud";
    $result = $db->query($query);
}

if($sort == "name")
{
    $query = "SELECT * FROM ajaxcrud ORDER BY name DESC";
    $result = $db->query($query);
}

if($sort == "email")
{
    $query = "SELECT * FROM ajaxcrud ORDER BY email";
    $result = $db->query($query);
}

if($sort == "cont")
{
    $query = "SELECT * FROM ajaxcrud ORDER BY contact";
    $result = $db->query($query);
}

if($result->num_rows>0){ 

$output = "";

$output .= "<table>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Conatct no</th>
            </tr>";


$id = 1;                 

while($row = $result->fetch_array())
{
    
    
    $output .= "<tr>
    <td>".$id."</td>
    <td>".$row['name']."</td>
    <td>".$row['email']."</td>
    <td>".$row['pass']."</td>
    <td>".$row['contact']."</td>
   
</tr>";

$id += 1;

}

$output .= "</table>";

echo $output;

$db->close();
}

else{
    echo "<h1>No Records found</h1>";
}


?>