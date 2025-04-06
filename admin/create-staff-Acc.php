
<?php

include '../include/head.php';
include '../config/db.php';

$passErr = '';
$staffname = '';
$staffpass = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<pre>';
    // print_r($_POST); 
    echo '</pre>';
    $staffname = $_POST['StaffName'];
    $staffpass = $_POST['staffPass'];
    if (empty($staffname) || empty($staffpass) || empty($_POST['cstaffPass'])) {
        $passErr = 'Enter all fields!';
    } else {


        if ($_POST['staffPass'] !== $_POST['cstaffPass']) {
            $passErr = 'Password does not match !';
        } else {
            $sql = "insert into tblstaffacc (StaffName, staffPass) VALUES ('$staffname', '$staffpass');";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $SuccMsg = "'$staffname' , Your account created successfully !";
            }
        }
    }
}

?>
<div>

    <div class="border border-orange-200 w-[40vw] mt-[30vh] mx-auto flex flex-col gap-14">
        <div class="text-center">
            <h1 class=>NEWS PORTAL</h1>
            <h1 class="text-2xl text-blue-700 font-medium">Create Staff Account </h1>
            <?php if(isset($SuccMsg)) { ?>
                <p class="text-xl text-green-700 font-bold"><?= $SuccMsg; ?></p>
                <?php } ?>
        </div>
        <form action="" method="post" class="text-center flex flex-col gap-3">
            <div class="">
                <label>Username</label>
                <input type="text" name="StaffName" value="<?= isset($_POST['StaffName']) ?  $_POST['StaffName'] : ''; ?>" class="border rounded-sm">
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="staffPass" value="<?= isset($_POST['staffPass']) ? $_POST['staffPass'] : ''; ?>" class="border rounded-sm">
            </div>
            <div>
                <label>Confirm Password</label>
                <input type="password" name="cstaffPass" value="<?= isset($_POST['cstaffPass']) ? $_POST['cstaffPass'] : ''; ?>" class="border rounded-sm">
            </div>
            <a href="login-stasff-acc.php" class="underline hover:underline-offset-0">Already exist click here.</a>
            
            <?php if ($passErr) {  ?>
                <p class="text-red-700 font-medium">
                    <?= $passErr; ?>
                </p>
            <?php } ?>
        
            <input type="submit" value="Submit" name="submit" class="">
        </form>
    </div>
</div>




<?php
include '../include/footer.php';
