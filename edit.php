
<?php include './include/head.php' ?>
<?php include './config/db.php' ?>


<body>
<div class="container">

  <div class="w-[80vw] mx-auto mt-10 flex gap-10">
    <div class="w-[50%]">
      <?php
      //  id | name   | aadharno     | address | address            | contact    | fax  | lastname |
      $id = $_GET['id'];
      if(isset($_POST['submit'])){
        $name= $_POST['name'];
        $aadharno= $_POST['aadharno'];
        $address= $_POST['address'];
        $email= $_POST['email'];
        $contact= $_POST['contact'];

          
        // $sql = "insert into voterlist (name,aadharno,address,email,contact,fax) value('$name','$aadharno','$address','$email','$contact','$fax')";
        $sql = "update voterlist set fname='$name', aadharno='$aadharno', 
        address='$address',email='$email', contact='$contact' where id = $id";
        $result = mysqli_query($conn, $sql);
        if($result){
        //   echo "Data update SucsessFully !!";
        header("location:disp.php");
        }else{
          echo "Data Not update". mysqli_error($conn) ;
        }
      } 

      $sql = "select * from voterlist where id = $id";
      $result = mysqli_query($conn, $sql);

      $row = mysqli_fetch_assoc($result);
      
      
      ?>
      <form method="post" action="">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="name" name="name" value="<?php echo $row['fname']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">       
        </div>  
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Adhar No</label>
          <input type="name" name="aadharno" value="<?php echo $row['aadharno']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">       
        </div>  
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Address</label>
          <input type="name" name="address" value="<?php echo $row['address']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">       
        </div>      
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">       
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Contact</label>
          <input type="name" name="contact" value="<?php echo $row['contact']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">       
        </div>
       
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>


  </div>
  </div>

  <?php

  include "./include/footer.php";
