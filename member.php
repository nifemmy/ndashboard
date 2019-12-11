<?php
session_start();
require_once("connect.php");
include_once("header.php");
include_once("topnav.php");
error_reporting(0);

$sql="SELECT * FROM employee";
$stmt=$conn->query($sql);

?>
 
 
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><font color="blue"><?= $_SESSION["usr_name"] ?></font> Welcome to your Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <div class="btn-group mr-2">
          <a href="insert.php"><button class="btn btn-primary">Add New Employee</button></a> 
          </div>
        </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Top Earner</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Olufunmi Ajayi</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Top Earnings </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$85,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Today Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">60%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Age</th>
      <th scope="col">Qualification</th>
      <th scope="col">Highest Qualification</th>
      <th scope="col">Salary</th>
      <th scope="col">Date Of Birth</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php

if ($stmt->num_rows >0 ){
while($row=$stmt->fetch_assoc()){
   $qua_idd = $row['qualify_id'];
  
   $c++;
?>

<tr>
  <th scope="row"><?= $c ;?></th>
<td><?=  $row['fname'] ?></td>
<td><?=  $row['lname'] ?></td>
<td><?=  $row['age'] ?></td>
<td><?=  $row['qualification'] ?></td>
<td><?php
   $query="SELECT * FROM qualification WHERE id=$qua_idd ";
   $stmt2=$conn->query($query);
   
 
       WHILE($result=$stmt2->fetch_assoc()){

        $suname=$result["name"];

        echo "$suname";
       }
 



?>
</td>
<td><?=  $row['salary'] ?></td>
<td><?=  $row['dob'] ?></td>

<td><a href="update.php?id=<?= $row['id']?>"><button class="btn btn-primary btn-user btn-block">Update</button></a></td>
<td><a href="del.php?id=<?= $row['id']?>"><button class="btn btn-primary btn-user btn-block">Delete</button></a></td>
</tr>
<?php
}   }
?>

    
  </tbody>
</table>
      </div>
      <!-- End of Main Content -->
<?php
include_once("footer.php");
?>