<?php

include '../include/head.php';
include './include/adminNav.php';
include './config/db.php';

$result = mysqli_query($conn, "select * from tblstaffacc");
$allDataStaff = [];
while ($row = mysqli_fetch_assoc($result)) {
	$allDataStaff[] = $row;
}

?>



<div class="w-[80vw] mx-auto py-[7vh]">

	<h1 class="text-3xl text-red-700">Edit Staff Table !</h1>
	<table class="w-[50vw] ">
		<thead>
			<tr class="border">
				<th>Name</th>
				<th>Password</th>
				<th>Created At</th>
				<th colspan="2">Edit</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($allDataStaff as $staffData) {  ?>
				<tr class="border text-center">
					<td><?= $staffData['StaffName']; ?></td>
					<td><?= $staffData['staffPass']; ?></td>
					<td><?= $staffData['staff_created_at']; ?></td>
					<td><a href="editStaff.php?id=<?php echo $staffData['id']; ?>">Edit</a></td>
					<td><a href="deleteStaff.php?id=<?php echo $staffData['id']; ?>">Delete</a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

</div>




<?php

include '../include/footer.php';
