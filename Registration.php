<?php
  include('dbconnection.php');

  if(isset($_POST['rSignup'])){
    // Checking for Empty Fields
    if(($_POST['rName'] == "") || ($_REQUEST['rEmail'] == "") || ($_REQUEST['rPassword'] == "")){
      $regmsg = '<div class="alert alert-warning mt-2" role="alert"> All Fields are Required </div>';
    } else {
      $sql = "SELECT * FROM user_tb WHERE r_email='".$_POST['rEmail']."'";
      $result = $conn->query($sql);
      if($result->num_rows == 1){
        $regmsg = '<div class="alert alert-warning mt-2" role="alert"> Email ID Already Registered </div>';
      } else {
        // Assigning User Values to Variable
    
        $rName = $_REQUEST['rName'];
        $rEmail = $_REQUEST['rEmail'];
        $rPassword = $_REQUEST['rPassword'];
        $sql = "INSERT INTO user_tb(r_name, r_email, r_password) VALUES ('$rName','$rEmail', '$rPassword')";
        if($conn->query($sql) == TRUE){
          $regmsg = '<div class="alert alert-success mt-2" role="alert"> Account Succefully Created </div>';
        } else {
          $regmsg = '<div class="alert alert-danger mt-2" role="alert"> Unable to Create Account </div>';
        }
      }
    }
  }
        
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/main.css">

  <title>OSMS</title>
</head>

<body style="background-color:powderblue;">
<div class="container pt-5"  id="registration">
  <h2 class="text-center">Create an Account</h2>
  <div class="row mt-4 mb-4" >
    <div class="col-md-6 offset-md-3" style ="background-color: #DCDCDC">
      <form action="" class="shadow-lg p-4" method="POST">
        <div class="form-group" >
          <i class="fas fa-user"></i><label for="name" class="pl-2 font-weight-bold">Name</label><input type="text"
            class="form-control" placeholder="Name" name="rName">
        </div>
        <div class="form-group">
          <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email"
            class="form-control" placeholder="Email" name="rEmail">
          <!--Add text-white below if want text color white-->
          <small class="form-text">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">
            Password</label><input type="password" class="form-control" placeholder="Password" name="rPassword">
        </div>
        <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">Sign Up</button>
        <em style="font-size:10px;">Note - By clicking Sign Up, you agree to our Terms, Data
          Policy and Cookie Policy.</em>
          <?php if(isset($regmsg)) {echo $regmsg; } ?>
    
      </form>
      <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold" href="index.php">Back
            to Home</a></div>
    </div>
  </div>
</div>
</body>
</html>


