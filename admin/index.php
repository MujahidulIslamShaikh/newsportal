<?php

include '../include/head.php';
include './include/adminNav.php';
include './config/db.php';

$sql = "
CREATE TABLE tblStaffAcc (
    id INT AUTO_INCREMENT PRIMARY KEY,
    StaffName LONGTEXT,
    staffPass varchar(255),
    staff_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    staff_updated_at TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP
);

";

session_start();

if(!isset($_SESSION['user'])){
    header('location: login-admin.php');
} 
print_r($_SESSION);

// $result = mysqli_query($conn, $sql);
// if($result){
    // echo 'create table Success !';
// } else {
    // echo 'not create table !', mysqli_error($conn);
    // echo 'not create table !';
// }


?>
<div class="w-[80vw] mx-auto py-[7vh]">

    <h1 class="text-3xl text-red-700">MAIN ADMIN PAGE OPEN !</h1>

</div>




<?php

include '../include/footer.php';