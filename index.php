<?php

include './config/db.php';

include './include/head.php';
include './include/navbar.php';

$sql = "select * from tblposts;";
$result = mysqli_query($conn, $sql);
$postData = [];
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$postData[] = $row;
	}
}

$sql = "select * from tblsubcategory;";
$result = mysqli_query($conn, $sql);
$subcategory = [];
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$subcategory[] = $row;
	}
}
$sql = "select * from tblcategory;";
$result = mysqli_query($conn, $sql);
$categories = [];
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$categories[] = $row;
	}
}
echo '<pre>';
// print_r($postData);
echo '</pre>';
?>

<?php
echo '<pre>';
// print_r($_SERVER);
echo '</pre>';
?>

<div class=" mb-[10vh]">
	<div class="w-[80vw] mx-auto grid grid-cols-3 gap-5 mt-10">
		<!-- MAIN -->
		<div class="col-span-2 posts flex flex-col gap-4">
			<?php foreach ($postData as $a) { ?>
				<div class="border border-gray-400 font-medium">

					<div class="">
						<img src="<?php echo $a['PostUrl'] ?>" class="" alt="postImg">
					</div>
					<div class="w-full p-3">
						<h1 class="text-3xl"><?php echo $a['PostTitle'] ?></h1>
						<p><?php echo $a['PostDetails']; ?></p>
						<?php foreach ($categories as $cate) {
							if ($cate['id'] === $a['CategoryId']) { ?>
								<p class="font-bold">Category : <span class="font-medium"><?php echo $cate['CategoryName']; ?></span> </p>
							<?php } ?>
						<?php } ?>

						<div class="mt-2 font-medium">
							<p><span class="font-bold">Posted On : </span><?php echo $a['PostingDate']; ?></p>
							<p><?php echo "<span class='font-bold'>Updated On : </span>", $a['UpdationDate']; ?></p>
						</div>
						<a href="">
							<button class="border px-5 mt-2 hover:bg-black text-white cursor-pointer bg-gray-800">Read more</button>
						</a>
					</div>
				</div>
			<?php } ?>
		</div>

		<?php include './include/sidebar.php'; ?>
	</div>

</div>




<?php
include './include/footer.php';
