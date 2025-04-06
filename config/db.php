<?php


$host_name = 'localhost';
$server_name = 'root';
$password = '';
$db_name = 'news';

$conn = mysqli_connect($host_name, $server_name, $password, $db_name);

if (!$conn) {
    echo 'Connection Error!!' . mysqli_connect_error();
}
// $productsTableQuery = mysqli_query($conn, "SELECT * FROM voterlist");

?>


