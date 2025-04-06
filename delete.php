<?php include './config/db.php' ; 
$id = $_GET['id'];

$sql = "delete from voterlist where id = $id";

$result= mysqli_query($conn, $sql);

if($result){    
     header("location:disp.php");
}

?>