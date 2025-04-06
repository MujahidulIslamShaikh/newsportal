<?php


session_start();
include '../include/head.php';
include '../config/db.php';
$passErr = '';
$staffname = '';
$staffpass = '';
$AllStaffName = [];
$AllStaffPass = [];
$result = mysqli_query($conn, "select StaffName, staffPass from tblstaffacc;");
while ($row = mysqli_fetch_assoc($result)) {
    $AllStaffName[] = $row['StaffName'];
    $AllStaffPass[] = $row['staffPass'];
}
echo '<pre>';
// print_r($AllStaffName);
// print_r($AllStaffPass);
echo '</pre>';
$foundName = false;
$foundPass = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $staffname = $_POST['StaffName'];
    $staffpass = $_POST['staffPass'];
    foreach ($AllStaffName as $staffname) {
        if ($staffname === $_POST['StaffName'] || $staffpass === $_POST['staffPass']) {
            $foundName = true;
            $foundPass = true;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    if ($foundName) {
        $_SESSION['user'] = $staffname;
        header('location: dashboard.php');
    }
    if (!$foundName) {
        $nameErr = 'This username doesnot exist !';
    }
    if (!$foundPass) {
        $nameErr = 'This password doesnot exist !';
    }
}
echo '<pre>';
print_r($_SESSION);
echo '</pre>';




?>
<div>

    <div class="border border-orange-200 w-[40vw] mt-[30vh] mx-auto flex flex-col gap-14">
        <div class="text-center">
            <h1 class=>NEWS PORTAL</h1>
            <h1 class="text-2xl text-blue-700 font-medium">Login Staff Account Here ..</h1>
            <?php if (isset($SuccMsg)) { ?>
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

            <?php if ($passErr) {  ?>
                <p class="text-red-700 font-medium">
                    <?= $passErr; ?>
                </p>
            <?php } ?>

            <input type="submit" value="Submit" class="bg-gray-900 text-white font-medium" name="submit" class="">
        </form>
    </div>
</div>




<?php
include '../include/footer.php';
