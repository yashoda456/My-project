<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>
home
 </title>
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../css/bootstrap.min.css">

 <!-- Font Awesome CSS -->
 <link rel="stylesheet" href="../css/all.min.css">

 <!-- Custome CSS -->
 <link rel="stylesheet" href="../css/main.css">
</head>

<body>
<nav class="navbar navbar-dark fixed-top bg-secondary flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">OSMS</a>
 </nav>
 
<div class="col-sm-6 col-md-10 mt-5" style ="background-color: #FAF0E6">
<?php
include('../dbconnection.php');
session_start();
if($_SESSION['is_login']){
 $rEmail = $_SESSION['rEmail'];
 } else {
  echo "<script> location.href='Requesterlogin.php'; </script>";
 }

 $sql = "SELECT * FROM request_tb WHERE r_login_id = {$_SESSION['myid']}";
$result = $conn->query($sql);
 if($result->num_rows == 1){
  $row = $result->fetch_assoc();
  echo "<div class='mt-3 ml-3'>
  <table class='table'>
   <tbody>
    <tr>
      <th>Request ID</th>
      <td>".$row['r_login_id']."</td>
   </tr>
   <tr>
     <th>Name</th>
     <td>".$row['r_name']."</td>
   </tr>
   <tr>
   <th>Email ID</th>
   <td>".$row['r_email']."</td>
  </tr>
   <tr>
    <th>Request Info</th>
   <td>".$row['user_info']."</td>
   </tr>
   <tr>
    <th>Request Description</th>
     <td>".$row['r_description']."</td>
   </tr>
    
   </tbody>
  </table> </div>
  ";


 } else {
   echo "Failed";
 }
 


?>
<div class="text-center">
  <form class='d-print-none d-inline mr-3'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form>
  <form class='d-print-none d-inline' action="submitrequest.php"><input class='btn btn-success' type='submit' value='Close'></form>
 </div>

</div>

<?php
include('includes/footer.php'); 
?>

 </body>
 </html>