
<?php include './include/head.php' ?>
<?php include './config/db.php' ?>
<?php

  include './include/navbar.php';

?>


<body>
<div class="container">

  <div class="w-[80vw] mx-auto mt-10 flex gap-10">
    <div class="w-[50%]">
      <?php
      //  id | name   | aadharno | address | address | contact    | fax  | lastname |
      if(isset($_POST['submit'])){
        $name= $_POST['name'];
        $aadharno= $_POST['aadharno'];
        $address= $_POST['address'];
        $email= $_POST['email'];
        $contact= $_POST['contact'];

        $sql = "insert into voterlist (fname,aadharno,address,email,contact)
         value('$name','$aadharno','$address','$email','$contact')";
         
        $result = mysqli_query($conn, $sql);
        if($result){
          // echo "Data Inserted Successfully !!";
          header("location:disp.php");
        }else{  
          echo "Data Not Inserted". mysqli_error($conn) ;
        }
      }   
      ?>
      <form method="post" action="">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="name" name="name" class="form-control border" id="exampleInputEmail1" aria-describedby="emailHelp">       
        </div>  
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Adhar No</label>
          <input type="name" name="aadharno" class="form-control border" id="exampleInputEmail1" aria-describedby="emailHelp">       
        </div>  
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Address</label>
          <input type="name" name="address" class="form-control border" id="exampleInputEmail1" aria-describedby="emailHelp">       
        </div>      
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" name="email" class="form-control border" id="exampleInputEmail1" aria-describedby="emailHelp">       
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Contact</label>
          <input type="name" name="contact" class="form-control border" id="exampleInputEmail1" aria-describedby="emailHelp">       
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>


  </div>
  </div>

  <?php

  include "./include/footer.php";
