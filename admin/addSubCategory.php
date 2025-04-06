<?php

include '../include/head.php';
include './include/adminNav.php';
include './config/db.php';


$sql = 'select * from tblcategory';
$result = mysqli_query($conn, $sql);
$arr = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        
        $arr[] = $row;
    }
}

// foreach($arr as $a){
//     echo $a['id'];
//     echo $a['CategoryName'];
// }
if(isset($_POST['AddSubCategory'])){
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    $cateId = $_POST['categoryId'];
    $catename = $_POST['SubcategoryName'];
    $catedesc = $_POST['SubcategoryDesc'];
    echo $cateId;
    $sql = "INSERT INTO tblsubcategory (categoryId, SubcategoryName, SubcategoryDesc) VALUES 
    ('$cateId' , '$catename','$catedesc')";
   $result = mysqli_query($conn, $sql);

   if($result){
    echo 'data inserted Successfully.';
   } else {
    echo 'data not Inserted !!';
   }
}

?>

<div class=" ">
    <div class="mx-auto w-[50vw] my-auto mt-[10vh] bg-slate-100 p-2">
    <h1 class="text-2xl text-center mb-10">Add New Sub Category</h1>
        <form action="" method="post" class="flex flex-col gap-3">
            <div class="">
                <label>Select Category</label>
                <select name="categoryId" class="border">
                    <?php foreach ($arr as $ar) { ?>
                          <option value="<?php echo $ar['id']; ?>"><?php echo $ar['CategoryName']; ?></option>
                    <?php } ?>

                </select>
            </div>
            
            <div class="">
                <label>Sub Category</label>
                <input type="text" name="SubcategoryName" class="border rounded-sm">
            </div>
            <div>
                <label>Category Description</label>
                <input type="text" name="SubcategoryDesc" class="border rounded-sm">
            </div>
            <input type="submit" value="Add Category" name="AddSubCategory" class="cursor-pointer bg-gray-900 text-lime-100 font-bold">
        </form>
    </div>

</div>

<?php include '../include/footer.php';
