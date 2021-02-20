<?php

include 'config.php';


$pag = 1;

if (isset($_POST['x'])){
$pag = $_POST['x'];
}


$lim = 4;
$off = ($pag -1)*$lim;
$id = 1;


$querytotal = "SELECT * FROM ajaxcrud";
$result = $db->query($querytotal);
$total_rec = mysqli_num_rows($result);
$total_page = ceil($total_rec/$lim);


$query = "SELECT * FROM ajaxcrud LIMIT $off,$lim";
$result1 = $db->query($query);

if($result1->num_rows > 0){

$output = "";


$output .= "<table>
            <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Contact no</th>
            </tr>";


while($row = $result1->fetch_array())
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



$output .= "</table><div id='pagi'>";



for($a=1; $a<= $total_page; $a++){

    $output .= "<a class='btn btn-primary' style='margin:5px;' href='' value='$a' >$a</a>";
}

$output .= "</div>";

echo $output;

$db->close();

}

else{

    echo "<h1>No records found</h1>";
}
?>