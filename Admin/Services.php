<?php 
define('TITLE', 'Services');
define('PAGE', 'services');
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
  <p class=" bg-dark text-white p-2">List of Services</p>
  <?php
    $sql = "SELECT * FROM service_tb";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
 echo '<table class="table">
  <thead>
   <tr>
    <th scope="col">Service ID</th>
    <th scope="col"> Service Name</th>
    
   </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
   echo '<tr>';
    echo '<th scope="row">'.$row["id"].'</th>';
    echo '<td>'. $row["service"].'</td>';
    
  echo'</tr>';
  }

 echo '</tbody>
 </table>';
} 
?>
</div>

<div><a class="btn btn-danger box" href="addservices.php"><i class="fas fa-plus fa-2x"></i></a>
</div>
</div>


<?php 
include('includes/footer.php');
?>