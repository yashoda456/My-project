<?php 
define('TITLE', 'Requests');
define('PAGE', 'request');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_login'])){
$aEmail = $_SESSION['aEmail'];
} else {
echo "<script> location.href='login.php'; </script>";
}


?>
<div class="col-sm-4 mb-4 jumbotron" style="background-color: #F0F8FF">
<!-- Main Content area start Middle -->
<?php 
$sql = "SELECT r_login_id, user_info, r_description, r_date FROM request_tb";
$result = $conn->query($sql);
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
echo '<div class="card mt-5 mx-5">';
echo '<div class="card-header">';
echo 'Request ID : '. $row['r_login_id'];
echo '</div>';
echo '<div class="card-body">';
echo '<h5 class="card-title">Request Info : ' . $row['user_info'] ;
echo'</h5>';
echo '<p class="card-text">' .$row['r_description'];
echo '</p>';
echo '<p class="card-text">Request Date: ' . $row['r_date'] ;
echo '</p>';
echo '<div class="d-flex">';
echo '<form action="" method="POST"> <input type="hidden" name="id" value='.$row["r_login_id"].'>';
echo '<input type="submit" class="btn btn-danger" style="margin-right:5px;" name="view" value="View">';
echo '<input type="submit" class="btn btn-success" name="close" value="Close">';
echo '</form>';
echo '</div>';
echo '</div>';
echo'</div>';
}
} 
?>
</div>
<?php
if(isset($_REQUEST['view'])){
$sql = "SELECT * FROM request_tb WHERE r_login_id = {$_REQUEST['id']}";
 $result = $conn->query($sql);
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
}
if(isset($_REQUEST['close'])){
    $sql = "DELETE FROM request_tb WHERE r_login_id = {$_REQUEST['id']}";
    if($conn->query($sql) === TRUE){
      // echo "Record Deleted Successfully";
      // below code will refresh the page after deleting the record
      echo '<meta http-equiv="refresh" content= "0;URL=?closed" />';
      } else {
        echo "Unable to Delete Data";
      }
    }
    if(isset($_REQUEST['assign'])){
        // Checking for Empty Fields
        if(($_REQUEST['request_id'] == "") || ($_REQUEST['request_info'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['address1'] == "") || ($_REQUEST['address2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['assigntech'] == "") || ($_REQUEST['inputdate'] == "")){
         // msg displayed if required field missing
         $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
        } else {
          // Assigning User Values to Variable
          $rid = $_REQUEST['request_id'];
          $rinfo = $_REQUEST['request_info'];
          $rdesc = $_REQUEST['requestdesc'];
          $rname = $_REQUEST['requestername'];
          $radd1 = $_REQUEST['address1'];
          $radd2 = $_REQUEST['address2'];
          $rcity = $_REQUEST['requestercity'];
          $rstate = $_REQUEST['requesterstate'];
     
          $remail = $_REQUEST['requesteremail'];
          $rmobile = $_REQUEST['requestermobile'];
          $rassigntech = $_REQUEST['assigntech'];
          $rdate = $_REQUEST['inputdate'];
          $sql = "INSERT INTO assignwork_tb (request_id, request_info, request_desc, r_name, address1, address2, r_city, r_state, r_email, phone_no, assign_tech, r_date) VALUES ('$rid', '$rinfo','$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$remail', '$rmobile', '$rassigntech', '$rdate')";
          if($conn->query($sql) == TRUE){
           // below msg display on form submit success
           $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Work Assigned Successfully </div>';
          } else {
           // below msg display on form submit failed
           $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Assign Work </div>';
          }
        }
        }
       // Assign work Order Request Data going to submit and save on db assignwork_tb table [END]

 ?>
<!-- Main Content area End Middle -->
<div class="col-sm-5 mt-4">
<div class="jumbotron" style ="background-color: #FAF0E6">
<div class = "container">

<!-- Main Content area Start Last -->
<form action="" method="POST">
<h5 class="text-center">Assign Work Order Request</h5>
<div class="form-group">
    <label for="request_id">Request ID</label>
    <input type="text" class="form-control" id="request_id" name="request_id" value="<?php if(isset($row['r_login_id'])) {echo $row['r_login_id']; }?>"
    readonly>
</div>
<div class="form-group">
    <label for="request_info">Request Info</label>
    <input type="text" class="form-control" id="request_info" name="request_info" value="<?php if(isset($row['user_info'])) {echo $row['user_info']; }?>">
</div>
<div class="form-group">
    <label for="requestdesc">Description</label>
    <input type="text" class="form-control" id="requestdesc" name="requestdesc" value="<?php if(isset($row['r_description'])) { echo $row['r_description']; } ?>">
</div>
<div class="form-group">
    <label for="requestername">Name</label>
    <input type="text" class="form-control" id="requestername" name="requestername" value="<?php if(isset($row['r_name'])) { echo $row['r_name']; } ?>">
</div>
<div class="row">
    <div class="form-group col-md-6">
    <label for="address1">Address Line 1</label>
    <input type="text" class="form-control" id="address1" name="address1" value="<?php if(isset($row['address1'])) { echo $row['address1']; } ?>">
    </div>
    <div class="form-group col-md-6">
    <label for="address2">Address Line 2</label>
    <input type="text" class="form-control" id="address2" name="address2" value="<?php if(isset($row['address2'])) {echo $row['address2']; }?>">
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
    <label for="requestercity">City</label>
    <input type="text" class="form-control" id="requestercity" name="requestercity" value="<?php if(isset($row['r_city'])) {echo $row['r_city']; }?>">
    </div>
    <div class="form-group col-md-6">
    <label for="requesterstate">State</label>
    <input type="text" class="form-control" id="requesterstate" name="requesterstate" value="<?php if(isset($row['r_state'])) { echo $row['r_state']; } ?>">
    </div>

</div>
<div class="row">
    <div class="form-group col-md-8">
    <label for="requesteremail">Email</label>
    <input type="email" class="form-control" id="requesteremail" name="requesteremail" value="<?php if(isset($row['r_email'])) {echo $row['r_email']; }?>">
    </div>
    <div class="form-group col-md-4">
    <label for="requestermobile">Mobile</label>
    <input type="text" class="form-control" id="requestermobile" name="requestermobile" value="<?php if(isset($row['phone_no'])) {echo $row['phone_no']; }?>"
        onkeypress="isInputNumber(event)">
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
    <label for="assigntech">Assign to Technician</label>
    <input type="text" class="form-control" id="assigntech" name="assigntech">
    </div>
    <div class="form-group col-md-6">
    <label for="inputDate">Date</label>
    <input type="date" class="form-control" id="inputDate" name="inputdate">
    </div>
</div>
<div class="float-sm-right">
    <button type="submit" class="btn btn-primary mr-3 mt-2" name="assign">Assign</button>
    <button type="reset" class="btn btn-secondary mt-2 ">Reset</button>
</div>
</form>
<!-- below msg display if required fill missing or form submitted success or failed -->
<?php if(isset($msg)) {echo $msg; } ?>
</div> <!-- Main Content area End Last -->
</div> <!-- End Row -->
</div> <!-- End Container -->
</div>
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