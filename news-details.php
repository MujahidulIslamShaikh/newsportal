<?php

include './include/head.php';
include './config/db.php';

include './include/navbar.php';

$result = mysqli_query($conn, "select * from tblposts where CategoryId = '{$_GET['ns']}' ;");
$postdetails = mysqli_fetch_assoc($result);


$result = mysqli_query($conn, "select * from tblcategory where id = '{$_GET['ns']}' ;");
$categoryDetails = mysqli_fetch_assoc($result);

$result = mysqli_query($conn, "select * from tblsubcategory where categoryId = '{$_GET['ns']}' ;");
$subcategoryDetails = mysqli_fetch_assoc($result);


echo '<pre>';
print_r($subcategoryDetails);
print_r($categoryDetails);
print_r($postdetails);
echo '</pre>';

$result = mysqli_query($conn, "select * from tblcategory");
$allcategories = [];
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$allcategories[] = $row;
	}
}
?>

<div class=" mb-[10vh]">
	
	<div class="w-[80vw] mx-auto grid grid-cols-3 gap-5 mt-10">

		<div class="col-span-2 posts flex flex-col gap-4 rounded-md">
			<div class="border border-gray-400 font-medium rounded-md">
				<h1 class="text-3xl font-normal"><?= $postdetails['PostTitle']; ?></h1>
				<div class="flex gap-4">
					<p><span class="font-bold">Category : </span>
						<span class="text-blue-600 hover:underline hover:text-blue-800"><a href="category.php?cateid=<?= $categoryDetails['id']; ?>"><?= $categoryDetails['CategoryName']; ?></a></span></p>
					<p><span class="font-bold">Sub Category : </span><span><?= $subcategoryDetails['SubcategoryName']; ?></span></p>
					<p><span class="font-bold">Posted On : </span><span><?= $postdetails['PostingDate']; ?></span></p>
				</div>
				<div class="">
					<img src="<?php echo $postdetails['PostUrl'] ?>" class="" alt="postImg">
				</div>
				<div class="w-full p-3">
					<h1 class="text-3xl"><?php echo $a['PostTitle'] ?></h1>
					<p><?php echo $a['PostDetails']; ?></p>

					<div class="mt-2 font-medium">
						<p><span class="font-bold">Posted On : </span><?php echo $a['PostingDate']; ?></p>
						<p><?php echo "<span class='font-bold'>Updated On : </span>", $a['UpdationDate']; ?></p>
					</div>
					<a href="news-details.php?ns=<?php echo $a['CategoryId']; ?>;">
						<button class="border px-5 mt-2 hover:bg-black text-white cursor-pointer bg-gray-800">Read more</button>
					</a>
				</div>
			</div>
		</div>

		<?php include './include/sidebar.php'; ?>

	</div>

</div>




<?php
include './include/footer.php';
