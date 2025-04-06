<?php
include './config/db.php';
include '../include/head.php';
include './include/adminNav.php';

$id = mysqli_real_escape_string($conn, $_GET['id']); // SQL Injection se bachane ke liye
$result = mysqli_query($conn, "SELECT * FROM tblstaffacc WHERE id = '$id' ");

$dataForEdit = mysqli_fetch_assoc($result); // Direct single row lene ka sahi tarika

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $staffName = $_POST['StaffName'];
    $staffPass = $_POST['staffPass'];

    $updateQuery = "UPDATE tblstaffacc SET StaffName = '$staffName', staffPass = '$staffPass' WHERE id = '$id'";
    
    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Record Updated Successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
}

?>

<div class="w-[80vw] mx-auto py-10">
    <h1 class="text-3xl text-red-800">Edit Staff Table</h1>

    <form action="" method="post" class="text-center flex flex-col gap-3">
        <div>
            <label>Username</label>
            <input type="text" name="StaffName" value="<?= $dataForEdit['StaffName'] ?? ''; ?>" class="border rounded-sm">
        </div>
        <div>
            <label>Password</label>
            <input type="text" name="staffPass" value="<?= $dataForEdit['staffPass'] ?? ''; ?>" class="border rounded-sm">
        </div>
        <input type="submit" value="Submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
    </form>
</div>

<?php include '../include/footer.php'; ?>
