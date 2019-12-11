<?php
session_start();
require_once("connect.php");

include_once("header.php");
include_once("topnav.php");
$msg="";
if(isset($_POST["signup"])){
$date=date("Y/m/d");

$fname=trim($_POST['fname']) ;
$lname=trim($_POST['lname']) ;
$age=trim($_POST['age']) ;
$qua=trim($_POST['qualification']);
$qua_id=trim($_POST['qualify_id']);
$salary=trim($_POST['salary']);
$dob=trim($_POST['dob']);



$sql="INSERT INTO employee(fname, lname, age, qualification, qualify_id, salary, dob, date_joined) 
VALUES('$fname' , '$lname', '$age', '$qua' , '$qua_id', '$salary', '$dob', NOW()) ";
$stmt=$conn->query($sql);


if($stmt==TRUE){
    $msg=" Successfully Added";
  
}
}
?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-5 bg-light mt-5 px-0">
            <h3 class="text-center text-light bg-danger p-3">Add New Member</h3>
            <h4 class="text-center text-success bg-light p-3"><?= $msg; ?></h4>

  <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
  <div class="form-group">
  <label for="">First Name</label>
  <input type="text" name="fname" class="form-control form-control-user" value="">
  
  </div>
  <div class="form-group">
  <label for="lname">Last Name</label>
  <input type="text" name="lname" class="form-control form-control-user" value="">
  
  </div>
  <div class="form-group">
  <label for="email">Age</label>
  <input type="text" name="age" class="form-control form-control-user" value="">
  
  </div>
  <div class="form-group">
  <label for="">Qualification</label>
  <input type="text" name="qualification" class="form-control form-control-user" value="">
  
  </div>
  <div class="form-group">
  <label for="">Highest Qualification</label>
  <select name="qualify_id" id="" class="form-control form-control-user">
<?php
$sql="SELECT id,name FROM qualification";
$stmt=$conn->query($sql);
$num=mysqli_num_rows($stmt);
for($i=0; $i<$num; $i++){
$n=$i+1;
$row=$stmt->fetch_array();
$id=$row["id"];
$qname=$row["name"];



?> 
  
  
  <option value="<?= $id  ?>"><?= $qname  ?></option>
   <?php
}
  ?>
  </select>
 
  </div>

  <div class="form-group">
  <label for="">Salary</label>
  <input type="text" name="salary" class="form-control form-control-user" value="">
  
  </div>
  <div class="form-group">
  <label for="lname">Date of Birth</label>
  <input type="date" name="dob" class="form-control form-control-user" value="">
  
  </div>
  
 
  <div class="form-group">
  
  <button type="submit" name="signup" class="btn btn-primary btn-user btn-block">Add Member</button>
  
  </div>
  </form>
  </div>
</div>
</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
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
