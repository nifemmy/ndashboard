<?php 
session_start();
require_once("connect.php");


$msg="";

if(isset($_POST["login"])){
$uname=$_POST["name"];
$pass=$_POST["pass"];
$pass=md5($pass);

$sql="SELECT * FROM user WHERE name=? AND pass=? ";
$stmt=$conn->prepare($sql);
$stmt->bind_param("ss",$uname,$pass);
$stmt->execute();
$result=$stmt->get_result();
$row=$result->fetch_assoc();



session_regenerate_id();
$_SESSION['usr_id'] = $row['id'];
$_SESSION['usr_name'] = $row['name'];
session_write_close();


$usrname=$_SESSION['usr_name'];
if($result->num_rows==1){
   
    header("location:index.php");
}else{

    $msg="Username or Password Not Correct";
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ntech - LoginPage</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
       
      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
         <?php

                     if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
           ?>

                  <span class="message">   <?= $_SESSION['message'] ?></span>
                <?php
                            }

                            

            ?>
            <span class="text-success bg-light"><?=  $msg ;  ?>    </span>
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>" class="user">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Your Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="pass" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      
                    </div>
                    <input type="submit" name="login" value="login" class="btn btn-primary btn-user btn-block">
                      
                    <hr>
                   
                  </form>
                  <hr>
                 
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a><br>
                    <img src="img/logo.png" width="60px" height="60px"/>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
