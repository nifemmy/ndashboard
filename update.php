<?php
session_start();
require_once('connect.php');
include_once("header.php");
include_once("topnav.php");


$uid =$_GET['id'] ?? '';
   $msg="";
    $sql=" SELECT * FROM employee WHERE id = '$uid'";
    $stmt =$conn->query($sql);
   
    if($row = $stmt->fetch_assoc()){
        $fname=$row['fname'] ;
        $lname=$row['lname'] ;
        $age=$row['age'] ;
        $qua=$row['qualification'];
        $qua_id=$row['qualify_id'];
        $salary=$row['salary'];
        $dob=$row['dob'];
        $datej=$row["date_joined"];
    }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">

          <!-- Page Heading -->
          <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-5 bg-light mt-5 px-0">
            <h3 class="text-center text-light bg-danger p-3">Update Member</h3>
            <h4 class="text-center text-success bg-light p-3"><?= $msg; ?></h4>


<form action="update.php" method="POST">
<input type="hidden" name="id" value="<?= $uid  ?>">
  <div>
  <label for="">First Name</label>
  <input type="text" name="fname" value="<?= $fname;  ?>"  class="form-control form-control-lg">
  
  </div>
  <div>
  <label for="lname">Last Name</label>
  <input type="text" name="lname" value="<?= $lname;  ?>" class="form-control form-control-lg">
  
  </div>
  <div>
  <label for="age">Age</label>
  <input type="text" name="age" value="<?= $age;  ?>" class="form-control form-control-lg">
  
  </div>
  <div>
  <label for="">Qualification</label>
  <input type="text" name="qualification" value="<?= $qua;  ?>" class="form-control form-control-lg">
  
  </div>
  <div>
  <label for="">Highest Qualification</label>
  <select name="qualify_id" id="" class="form-control form-control-lg">
<?php
$sql="SELECT id,name FROM qualification";
$stmt=mysqli_query($conn,$sql);
$num=mysqli_num_rows($stmt);
for($i=0; $i<$num; $i++){
$n=$i+1;
$row=$stmt->fetch_array();
$id=$row["id"];
$qname=$row["name"];




if(isset($_POST["update"])){



  
   $sqll="UPDATE employee SET fname=?,lname=?, age=?,qualification=?, qualify_id=?, salary=?, dob=?, date_joined=? WHERE id=? ";
   $stmtt = $conn->prepare($sqll);
   $stmtt->bind_param("sssssssssi", $fn,$ln,$ag,$qd,$qd_id,$sy,$dd,$dj,$id);
     
              $fn=$_POST["fname"];
              $ln=$_POST["lname"]; 
              $ag=$_POST["age"];
              $qd=$_POST["qualification"];
              $qd_id=$_POST["qualify_id"];
              $sy=$_POST["salary"]; 
              $dd=$_POST["dob"];
              $dj=$_POST["date_joined"];
               $id=$_POST["id"];
  $stmtt->execute();

if ($stmtt){
          $msg= 'Record updated successfully!';
         
  }else {
              echo "Error updating record: " . mysqli_error($conn);
          }   
}


?> 
  
   
  <option value="<?= $id;  ?>"><?= $qname;  ?></option> 
   <?php
}
  ?>
  </select>
 
  </div>

  <div>
  <label for="">Salary</label>
  <input type="text" name="salary" value="<?= $salary;  ?>" class="form-control form-control-lg">
  
  </div>
  <div>
  <label for="lname">Date of Birth</label>
  <input type="date" name="dob" value="<?=  $dob; ?>" class="form-control form-control-lg">
  
  </div>
  
  
  <input type="hidden" name="date_joined" value="<?=  $datej; ?>" class="form-control form-control-lg">
  
 
 
  
  <input type="submit" name="update" class="btn btn-primary btn-user btn-block" value="Update">
  

  </form>


  <?php

  ?>
</div>
  </div>
</div>
</div>


<?php
include_once("footer.php");
?>