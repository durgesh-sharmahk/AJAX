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
extract($_POST);


if(isset($_POST['readrecord'])){
    $sql = "SELECT * FROM crud";
    $result1 = $conn->query($sql);
    $data= "";
    $data .= '<table class="table table-bordered table-striped">
    <tr>
    <th>No.</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email Address</th>
    <th>Mobile Number</th>
    <th>Edit Action</th>
    <th>Delete Action</th>
    </tr>';  
    
    
        $number = 1;
        while($row = $result1->fetch_array()){
            $data .= '<tr>
            <td>'.$number.'</td>
            <td>'.$row['firstname'].'</td>
            <td>'.$row['lastname'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['mobile'].'</td>
            <td>
            <button onclick="getsno('.$row['id'].')" class = "btn btn-warning">EDIT</button>
            </td>
            <td>
            <button onclick="DeleteUser('.$row['id'].')" class = "btn btn-danger">DELETE</button>
            </td>
            
            </tr>';
            $number++;
        }
    }
    $data .= '</table>';
    echo $data;



if(isset($_POST['firstname']) && isset($_POST['lastname'])&& isset($_POST['email']) && isset($_POST['mobile'])){
    $sql = "INSERT INTO `crud` ( `firstname`, `lastname`, `email`, `mobile`) VALUES ( '$firstname ', '$lastname', '$email', '$mobile');";
$resultsql = $conn->query($sql);



}
if(isset($_POST['deleteid'])){

$userid=$_POST['deleteid'];
$delquery = "DELETE FROM `crud` WHERE id = '$userid'";
$delresult = $conn->query($delquery);
}



?>