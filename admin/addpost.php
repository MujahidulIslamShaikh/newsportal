<?php

include '../include/head.php';
include './include/adminNav.php';
include './config/db.php';

$sql = 'select * from tblcategory';
$result = mysqli_query($conn, $sql);
$Category = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $Category[] = $row;
    }
}
    
$sql = 'select * from tblsubcategory';
$result = mysqli_query($conn, $sql);
$subCategories = [];
while ($row = mysqli_fetch_assoc($result)) {
    $subCategories[] = $row;
}

echo '<pre>';
print_r($_POST);
echo '</pre>';
if(isset($_POST['AddPost'])){
    $PostTitle = $_POST['PostTitle'];
    $CategoryId = $_POST['CategoryId'];
    $SubCategoryId = $_POST['SubCategoryId'];
    $PostDetails = $_POST['PostDetails'];
    $PostUrl = $_POST['PostUrl'];
    $PostImage = $_POST['PostImage'];
    $sql = "insert into tblposts (PostTitle,CategoryId,SubCategoryId,PostDetails,PostUrl,PostImage) 
    VALUES ('$PostTitle','$CategoryId','$SubCategoryId','$PostDetails','$PostUrl','$PostImage' );";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo 'Add Post Successfully. ';
    } else {
        echo 'Not Post !!', mysqli_error($conn);
    }
}

?>
<div class="">
    <div class="mx-auto w-[50vw] bg-gray-100 p-2">
        <h1 class="text-2xl text-center mb-10">Add Post</h1>

        <form action="" method="post" class="flex flex-col gap-3">
            <div class="">
                <label for="">Post Title</label>
                <input type="text" name="PostTitle" class="border">
            </div>
            <div class="">
                <label>Select Category</label>
                <select name="CategoryId" class="border">
                    <?php foreach ($Category as $cate) { ?>
                        <option value="<?= $cate['id'] ?>"><?= $cate['CategoryName'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="">Select Sub Category</label>
                <select name="SubCategoryId" class="border">
                    <?php foreach ($subCategories as $cate) { ?>
                        <option value="<?php echo $cate['SubCategoryId'] ?>"><?php echo $cate['SubcategoryName'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="">
                <label>Post Details</label>
                <input type="text" name="PostDetails" class="border rounded-sm">
            </div>
            <div>
                <label>Feature Image URL</label>
                <input type="text" name="PostUrl" class="border rounded-sm">
            </div>
            <div>
                <label>Feature Image</label>
                <input type="file" name="PostImage" class="border rounded-sm">
            </div>
            
            <input type="submit" value="Add Post" name="AddPost" class="cursor-pointer bg-gray-900 text-lime-100 font-bold">
        </form>
    </div>

</div>



<?php
include '../include/footer.php';
