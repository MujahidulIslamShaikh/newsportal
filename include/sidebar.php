<?php

include './config/db.php';
include './include/head.php';

$result = mysqli_query($conn, "select * from tblcategory;");
$categories = [];
while($row = mysqli_fetch_assoc($result)){
    $categories[] = $row;
}



?>


<!-- SIDE BAR -->
		<div class="sidebar ">
			<!-- ================ SEARCH BOX ===================== -->
			<div class="search border border-gray-200 rounded-md ">
				<h1 class="text-2xl border border-gray-300 bg-gray-200 ">
					<p class="w-[80%] mx-auto"> Search</p>
				</h1>
				<form action="" class="grid grid-cols-4 w-[80%] mx-auto py-4 ">
					<input type="search" placeholder="Search here..." class="col-span-3 border border-gray-400 px-2 outline-none rounded-l-md">
					<input type="submit" class=" bg-gray-800 cursor-pointer hover:bg-gray-700 text-white py-2 rounded-r-md font-medium" value="Go!">
				</form>
			</div>
			<!-- ================ CATEGORIES ===================== -->
			<div class="mt-6">
				<h1 class="text-2xl border border-gray-300 bg-gray-200 ">
					<p class="w-[80%] mx-auto">Categories</p>
				</h1>
				<div class="border border-gray-300 rounded-t-none border-t-0 rounded py-4">
					<?php foreach ($categories as $cate) { ?>
						<p class="w-[80%] mx-auto ">
							<a href="category.php?cateid=<?= $cate['id']; ?>" class="text-blue-600  hover:text-blue-900 hover:underline cursor-pointer "><?php echo $cate['CategoryName'] ?></a>
						</p>
					<?php  } ?>
				</div>
			</div>
			<!-- ================ SUB CATEGORIES ===================== -->
			<div class="mt-6">
				<h1 class="text-2xl border border-gray-300 bg-gray-200 ">
					<p class="w-[80%] mx-auto">Recent News</p>
				</h1>
				<div class="border border-gray-300 rounded-t-none border-t-0 rounded py-4">
					<?php foreach ($categories as $cate) { ?>
						<p class="w-[80%] mx-auto ">
							<a href="category.php?cateid=<?= $cate['id']; ?>" class="text-blue-600  hover:text-blue-900 hover:underline cursor-pointer ">
								<?php echo $cate['Description'] ?></a>
						</p>
					<?php } ?>

				</div>
			</div>
		</div>