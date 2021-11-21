<?php
define('TITLE', 'Work Order');
define('PAGE', 'work');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_login'])){
$aEmail = $_SESSION['aEmail'];
} else {
echo "<script> location.href='login.php'; </script>";
}
?>
<div class="col-sm-9 col-md-10 mt-5" style ="background-color: #FAF0E6">
  <?php 
 $sql = "SELECT * FROM assignwork_tb";
 $result = $conn->query($sql);
 if($result->num_rows > 0){
  echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">Req ID</th>
      <th scope="col">Request Info</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">Mobile</th>
      <th scope="col">Technician</th>
      <th scope="col">Assigned Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
    echo '<tr>
    <th scope="row">'.$row["request_id"].'</th>
    <td>'.$row["request_info"].'</td>
    <td>'.$row["r_name"].'</td>
    <td>'.$row["address2"].'</td>
    <td>'.$row["r_city"].'</td>
    <td>'.$row["phone_no"].'</td>
    <td>'.$row["assign_tech"].'</td>
    <td>'.$row["r_date"].'</td>
    <td><form  method="POST" action="assignwork.php" class="d-inline"> 
    <input type="hidden" name="id" value='. $row["request_id"] .'><button type="submit" class="btn btn-success" name="view" value="View"><i class="far fa-eye"></i>
    </button>
    </form>
    <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["request_id"] .'><button type="submit" class="btn btn-danger" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form>
    </td>
    </tr>';
   }
   echo '</tbody> </table>';
  } else {
    echo "0 Result";
  }
  if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
    if($conn->query($sql) === TRUE){
      // echo "Record Deleted Successfully";
      // below code will refresh the page after deleting the record
      echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
      } else {
        echo "Unable to Delete Data";
      }
    }
  ?>
</div>
</div>
</div>

<?php 
include('includes/footer.php');
?>