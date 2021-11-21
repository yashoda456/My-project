<?php 
define('TITLE', 'Update Technician');
define('PAGE', 'technician');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_login'])){
$aEmail = $_SESSION['aEmail'];
} else {
echo "<script> location.href='login.php'; </script>";
}
if(isset($_REQUEST['empupdate'])){
    // Checking for Empty Fields
    if(($_REQUEST['empName'] == "") || ($_REQUEST['empCity'] == "") || ($_REQUEST['empMobile'] == "") || ($_REQUEST['empEmail'] == "")){
     // msg displayed if required field missing
     $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else {
      // Assigning User Values to Variable
      $eId = $_REQUEST['empId'];
      $eName = $_REQUEST['empName'];
      $eCity = $_REQUEST['empCity'];
      $eMobile = $_REQUEST['empMobile'];
      $eEmail = $_REQUEST['empEmail'];
    $sql = "UPDATE technician_tb SET tech_name = '$eName', tech_city = '$eCity', mobile_no = '$eMobile', tech_email = '$eEmail' WHERE tech_id = '$eId'";
      if($conn->query($sql) == TRUE){
       // below msg display on form submit success
       $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
      } else {
       // below msg display on form submit failed
       $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
      }
    }
    }
   ?>
  <div class="col-sm-6 mt-5  mx-3 jumbotron" style ="background-color: #DCDCDC" >
    <h3 class="text-center">Update Technician Details</h3>
    <?php
   if(isset($_REQUEST['view'])){
    $sql = "SELECT * FROM technician_tb WHERE tech_id = {$_REQUEST['id']}";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   }
   ?>
    <form action="" method="POST">
      <div class="form-group">
        <label for="empId">Emp ID</label>
        <input type="text" class="form-control" id="empId" name="empId" value="<?php if(isset($row['tech_id'])) {echo $row['tech_id']; }?>"
          readonly>
      </div>
      <div class="form-group">
        <label for="empName">Name</label>
        <input type="text" class="form-control" id="empName" name="empName" value="<?php if(isset($row['tech_name'])) {echo $row['tech_name']; }?>">
      </div>
      <div class="form-group">
        <label for="empCity">City</label>
        <input type="text" class="form-control" id="empCity" name="empCity" value="<?php if(isset($row['tech_city'])) {echo $row['tech_city']; }?>">
      </div>
      <div class="form-group">
        <label for="empMobile">Mobile</label>
        <input type="text" class="form-control" id="empMobile" name="empMobile" value="<?php if(isset($row['mobile_no'])) {echo $row['mobile_no']; }?>"
          onkeypress="isInputNumber(event)">
      </div>
      <div class="form-group">
        <label for="empEmail">Email</label>
        <input type="email" class="form-control" id="empEmail" name="empEmail" value="<?php if(isset($row['tech_email'])) {echo $row['tech_email']; }?>">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-danger mt-2" id="empupdate" name="empupdate">Update</button>
        <a href="technician.php" class="btn btn-dark mt-2">Close</a>
      </div>
      <?php if(isset($msg)) {echo $msg; } ?>
    </form>
  </div>
  <!-- Only Number for input fields -->
  <script>
    function isInputNumber(evt) {
      var ch = String.fromCharCode(evt.which);
      if (!(/[0-9]/.test(ch))) {
        evt.preventDefault();
      }
    }
  </script>


<?php 
include('includes/footer.php');
?>