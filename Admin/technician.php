<?php 
define('TITLE', 'Technician');
define('PAGE', 'technician');
include('includes/header.php');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_login'])){
$aEmail = $_SESSION['aEmail'];
} else {
echo "<script> location.href='login.php'; </script>";
}
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
  <!--Table-->
  <p class=" bg-dark text-white p-2">List of Technicians</p>
  <?php
    $sql = "SELECT * FROM technician_tb";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
 echo '<table class="table">
  <thead>
   <tr>
    <th scope="col">Emp ID</th>
    <th scope="col">Name</th>
    <th scope="col">City</th>
    <th scope="col">Mobile</th>
    <th scope="col">Email</th>
    <th scope="col">Action</th>
   </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
   echo '<tr>';
    echo '<th scope="row">'.$row["tech_id"].'</th>';
    echo '<td>'. $row["tech_name"].'</td>';
    echo '<td>'.$row["tech_city"].'</td>';
    echo '<td>'.$row["mobile_no"].'</td>';
    echo '<td>'.$row["tech_email"].'</td>';
    echo '<td><form action="edittech.php" method="POST" class="d-inline">
     <input type="hidden" name="id" value='. $row["tech_id"] .'>
     <button type="submit" class="btn btn-info mr-3" name="view" value="View">
     <i class="fas fa-pen"></i></button></form> 
     <form action="" method="POST" class="d-inline">
     <input type="hidden" name="id" value='. $row["tech_id"] .'>
     <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
     <i class="far fa-trash-alt"></i></button>
     </form></td>
   </tr>';
  }

 echo '</tbody>
 </table>';
} else {
  echo "0 Result";
}
if(isset($_REQUEST['delete'])){
  $sql = "DELETE FROM technician_tb WHERE tech_id = {$_REQUEST['id']}";
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
<div><a class="btn btn-danger box" href="inserttech.php"><i class="fas fa-plus fa-2x"></i></a>
</div>
</div>


<?php 
include('includes/footer.php');
?>