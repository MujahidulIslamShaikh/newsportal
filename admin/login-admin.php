
<?php

session_start();

include '../include/head.php';
include '../config/db.php';

$loginAdminErr = '';
$AdminUserName = '';
$AdminPassword = '';

if(isset($_POST['submit'])){

        $AdminUserName = $_POST['AdminUserName'];
        $AdminPassword = $_POST['AdminPassword'];

        if($_POST['AdminUserName'] === 'Admin' && $_POST['AdminPassword'] === 'maihooadmin'){
            $_SESSION['user'] = $_POST['AdminUserName'];
            print_r($_POST);
            header('location: index.php');
            exit;

        } else {
            $loginAdminErr = 'admin and password do not match !';
        }

}
?>
<div>

    <div class="border border-orange-200 w-[40vw] mt-[30vh] mx-auto flex flex-col gap-14">
        <div class="text-center">
            <h1 class=>NEWS PORTAL</h1>    
            <h1>ADMIN LOGIN</h1>
        </div>
        <form action="" method="post" class="text-center flex flex-col gap-3">
            <div class="">
                <label>Username</label>
                <input type="text" name="AdminUserName" value="<?= isset($_POST) ? $AdminUserName : ''; ?>" class="border rounded-sm">
            </div>
            <div>
                <label>Password</label>
                <input type="password" value="<?= isset($_POST) ? $AdminPassword : '' ?>" name="AdminPassword" class="border rounded-sm">
            </div>
            <a href="login-stasff-acc.php" class="underline hover:underline-offset-0">Login Staff Account .</a>
            <h1 class="text-red-700 font-medium">
                <?php echo $loginAdminErr;  ?>
            </h1>
            <a href="create-staff-Acc.php" class="text-blue-700 hover:underline">
                Create Staff Account.
            </a>
            <input type="submit" value="Submit" name="submit" class="">
        </form>
    </div>
</div>


<?php
include '../include/footer.php';
