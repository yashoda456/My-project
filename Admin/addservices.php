<?php 
 define('TITLE', 'Update services');
 define('PAGE', 'services');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_login'])){
$aEmail = $_SESSION['aEmail'];
} else {
echo "<script> location.href='login.php'; </script>";
}
if(isset($_REQUEST['services'])){
    // Checking for Empty Fields
 if(($_REQUEST['service'] == "")) {
    
     // msg displayed if required field missing
     $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else {
      // Assigning User Values to Variable
      $eName = $_REQUEST['service'];
     
      $sql = "INSERT INTO service_tb (service) VALUES ('$eName')";
      if($conn->query($sql) == TRUE){
       // below msg display on form submit success
       $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Added Successfully </div>';
      } else {
       // below msg display on form submit failed
       $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
      }
    }
    }

?>
<div class="col-sm-6 mt-5  mx-3 jumbotron" style ="background-color: #FAF0E6">
     <h3 class="text-center">Add New Services</h3>
     <form action="" method="POST">
       <div class="form-group">
         <label for="empName">Name</label>
         <input type="text" class="form-control" id="service" name="service">
       </div>
       <div class="text-center">
         <button type="submit" class="btn btn-danger mt-2" id="services" name="services">Add</button>
         <a href="Services.php" class="btn btn-dark mt-2">Close</a>
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
