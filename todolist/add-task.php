<?php 

include 'config.php';

$task = $_POST['task'];
$error = NULL;
if($task == "" )
{
    $GLOBALS['error'] = "ENTER A TASK ";
    echo "Please enter a task <br>";
}
if(isset($GLOBALS['error'])){

}

else
{
$sql = "INSERT INTO tasks (title) VALUES ('$task')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo 1;
} else {
    echo 0;
}
}
?>