<?php
define('TITLE', 'Status');
define('PAGE', 'servicestatus');
include('includes/header.php');
include('../dbconnection.php');
session_start();



?>

<div class="col-sm-6 mt-5  mx-3">
<div class="container">
  <form class="form-inline" method="post" action="">
    <div class="form-group mr-3">
      <label for="checkid">Enter Request ID: </label>
      <input type="text" class="form-control ml-3" id="checkid" name="checkid" onkeypress="isInputNumber(event)">
    </div>
    <button type="submit" class="btn btn-secondary mt-1">Search</button>
  </form>



  <?php
  if(isset($_REQUEST['checkid'])){
      if($_REQUEST['checkid'] == ""){
          $msg =  '<div class="alert alert-warning mt-2" role="alert">fill all fields</div>';
      }else{
        $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['checkid']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
       if(($row['request_id']) == $_REQUEST['checkid']){ ?>
      
      <h3 class="text-center mt-5">Assigned Work Details</h3>
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td>Request ID</td>
            <td>
              <?php if(isset($row['request_id'])) {echo $row['request_id']; } ?>
            </td>
          </tr>
          <tr>
            <td>Request Info</td>
            <td>
              <?php if(isset($row['request_info'])) {echo $row['request_info']; } ?>
            </td>
          </tr>
          <tr>
            <td>Request Description</td>
            <td>
              <?php if(isset($row['request_desc'])) {echo $row['request_desc']; } ?>
            </td>
          </tr>
          <tr>
            <td>Name</td>
            <td>
              <?php if(isset($row['r_name'])) {echo $row['r_name']; } ?>
            </td>
          </tr>
          <tr>
            <td>Address Line 1</td>
            <td>
              <?php if(isset($row['address1'])) {echo $row['address1']; } ?>
            </td>
          </tr>
          <tr>
            <td>Address Line 2</td>
            <td>
              <?php if(isset($row['address2'])) {echo $row['address2']; } ?>
            </td>
          </tr>
          <tr>
            <td>City</td>
            <td>
              <?php if(isset($row['r_city'])) {echo $row['r_city']; } ?>
            </td>
          </tr>
          <tr>
            <td>State</td>
            <td>
              <?php if(isset($row['r_state'])) {echo $row['r_state']; } ?>
            </td>
          </tr>
          <tr>
           
          <tr>
            <td>Email</td>
            <td>
              <?php if(isset($row['r_email'])) {echo $row['r_email']; } ?>
            </td>
          </tr>
          <tr>
            <td>Mobile</td>
            <td>
              <?php if(isset($row['phone_no'])) {echo $row['phone_no']; } ?>
            </td>
          </tr>
          <tr>
            <td>Assigned Date</td>
            <td>
              <?php if(isset($row['r_date'])) {echo $row['r_date']; } ?>
            </td>
          </tr>
          <tr>
            <td>Technician Name</td>
            <td>
            <?php if(isset($row['assign_tech'])) {echo $row['assign_tech']; } ?>
            </td>
          </tr>
          <tr>
            <td>Customer Sign</td>
            <td></td>
          </tr>
          <tr>
            <td>Technician Sign</td>
            <td></td>
          </tr>
         </tbody>
         </table>
         <div class="text-center">
    <form class="d-print-none d-inline mr-3"><input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></form>
    <form class="d-print-none d-inline" action="servicestatus.php"><input class="btn btn-secondary" type="submit" value="Close"></form>
</div>
      
      <?php } else{
         echo '<div class="alert alert-info mt-4" role="alert">
         Your Request is Still Pending </div>';
      }
      }
    
 }
 ?><?php if (isset($msg)){
    echo $msg;
  }
  ?>
   </div>
 <script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
<!-- Only Number for input fields -->

  <?php
include('includes/footer.php'); 
?>
</body>
</html>