<?php

include '../include/head.php';
include './include/adminNav.php';
include './config/db.php';

if(isset($_POST['addcategory'])){
    $sql = "INSERT INTO tblcategory (CategoryName, Description) VALUES 
    ('" . $_POST['CategoryName'] . "', '" . $_POST['Description'] . "')";
   $result = mysqli_query($conn, $sql);

   if($result){
    echo 'data inserted Successfully.';
   } else {
    echo 'data not Inserted !!';
   }
   
}



?>

<div class="">
    <div class="mx-auto w-[50vw] bg-slate-100 mt-[10vh] p-2">
        <h1 class="text-2xl text-center mb-10">Add New Category</h1>

        <form action="" method="post" class="flex flex-col gap-3">
            <div class="">
                <label>Category</label>
                <input type="text" name="CategoryName" class="border rounded-sm">
            </div>
            <div>
                <label>Category Description</label>
                <input type="text" name="Description" class="border rounded-sm">
            </div>
            <input type="submit" value="Add Category" name="addcategory" class="cursor-pointer bg-gray-900 text-lime-100 font-bold">
        </form>
    </div>

</div>

<?php include '../include/footer.php';
