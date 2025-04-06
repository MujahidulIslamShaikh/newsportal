<?php

// $urlId = $_GET['id'];

include './include/head.php';
include './include/navbar.php';
include './config/db.php';

// echo $urlId;

$sql = "select * from voterlist";

$result = mysqli_query($conn, $sql);
?>

<div class="container">
    <a href="form.php"><button type="button" class="btn btn-primary">Add Voter</button></a>
<table class="table">
<thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Name</th>
      <th scope="col">Adhar No</th>
      <th scope="col">Address</th>  
      <th scope="col">Contact</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
<?php

while($row = mysqli_fetch_assoc($result)){
    ?>
    <tbody>   
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <th scope="row"><?php echo $row['fname']; ?></th>
      <th scope="row"><?php echo $row['aadharno']; ?></th>
      <th scope="row"><?php echo $row['address']; ?></th>
      <th scope="row"><?php echo $row['contact']; ?></th>
      <th scope="row"> 
        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
    </th>
      
    </tr>
  </tbody>
  <?php
}

?>

 
 
</table>
 
</div>

<?php
include './include/footer.php';