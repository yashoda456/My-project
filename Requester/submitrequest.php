<?php
define('TITLE', 'Submit Request');
define('PAGE', 'submitrequest');
include('includes/header.php'); 
include('../dbconnection.php');

if(isset($_REQUEST['submitrequest'])){
  if(($_REQUEST['requestinfo'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['requesteradd1'] == "") || ($_REQUEST['requesteradd2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['requestdate'] == "")){
    // msg displayed if required field missing
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
   } else {
  
        // Assigning User Values to Var
    
        $rinfo = $_REQUEST['requestinfo'];
        $rdesc = $_REQUEST['requestdesc'];
        $rname = $_REQUEST['requestername'];
        $radd1 = $_REQUEST['requesteradd1'];
        $radd2 = $_REQUEST['requesteradd2'];
        $rcity = $_REQUEST['requestercity'];
        $rstate = $_REQUEST['requesterstate'];
        $remail = $_REQUEST['requesteremail'];
        $rmobile = $_REQUEST['requestermobile'];
        $rdate = $_REQUEST['requestdate']; 
       
        $sql = "INSERT INTO request_tb(user_info, r_description, r_name, address1, address2, r_city, r_state, r_email, phone_no, r_date) VALUES ('$rinfo', '$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$remail', '$rmobile', '$rdate')";
        if($conn->query($sql) == TRUE){
          // below msg display on form submit success
          $genid = mysqli_insert_id($conn);
          $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Request Submitted Successfully Your' . $genid .' </div>';
          session_start();
          $_SESSION['myid'] = $genid;
          echo "<script> location.href='success.php'; </script>";
          // include('submitrequestsuccess.php');
         } 
          
          else {
          // below msg display on form submit failed
          $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Submit Your Request </div>';
         }
        
      
    }
  }
   

?>






<div class="col-sm-9 col-md-10 mt-5" style ="background-color: #FAF0E6">
  <form class="mx-5" action="" method="POST">
    <div class="form-group">
      <label for="inputRequestInfo">Request Info</label>
      <input type="text" class="form-control" id="inputRequestInfo" placeholder="Request Info" name="requestinfo">
    </div>
    <div class="form-group">
      <label for="inputRequestDescription">Description</label>
      <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write Description" name="requestdesc">
    </div>
    <div class="form-group">
      <label for="inputName">Name</label>
      <input type="text" class="form-control" id="inputName" placeholder="Yashu" name="requestername">
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="inputAddress">Address Line 1</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="House No. 123" name="requesteradd1">
      </div>
      <div class="form-group col-md-6">
        <label for="inputAddress2">Address Line 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="sitapaila colony" name="requesteradd2">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <input type="text" class="form-control" id="inputCity" name="requestercity">
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <input type="text" class="form-control" id="inputState" name="requesterstate">
      </div>
      </div>
      

    <div class="row">
      <div class="form-group col-md-6">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="requesteremail">
      </div>
      <div class="form-group col-md-2">
        <label for="inputMobile">Mobile No:</label>
        <input type="text" class="form-control" id="inputMobile" name="requestermobile" onkeypress="isInputNumber(event)">
      </div>
      <div class="form-group col-md-4">
        <label for="inputDate">Date</label>
        <input type="date" class="form-control" id="inputDate" name="requestdate">
      </div>
    </div>

    <button type="submit" class="btn btn-danger" name="submitrequest" style="margin-top:10px;">Submit</button>
    <button type="reset" class="btn btn-success" style="margin-top:10px;">Reset</button>
  </form>
  <?php if(isset($msg)) {echo $msg; } ?>

 
</div>
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
$conn->close();

?>
</body>
</html>
