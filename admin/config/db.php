<?php


$host_name = 'localhost';  // server name
$user = 'root';      // db username
$password = '';            // db password
$db_name = 'news';          // db name

$conn = mysqli_connect($host_name, $user, $password, $db_name);

if (!$conn) {
    echo 'Connection Error!!' . mysqli_connect_error();
}
// $productsTableQuery = mysqli_query($conn, "SELECT * FROM voterlist");

?>

