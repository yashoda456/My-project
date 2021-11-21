<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>
 <?php echo TITLE ?>
 </title>
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../css/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

 <!-- Custome CSS -->
 <link rel="stylesheet" href="../css/main.css">
</head>

<body>
 <!-- Top Navbar -->
  <nav class="navbar navbar-dark fixed-top bg-secondary flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="userprofile.php">OSMS</a>
 </nav>
  <!-- Side Bar -->
 <div class="container-fluid mb-5" style="margin-top:40px;">
  <div class="row">
   <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
    <div class="sidebar-sticky">
     <ul class="nav flex-column">
      <li class="nav-item">
       <a class="nav-link   <?php if(PAGE == 'userprofile') { echo 'active'; } ?>" href="userprofile.php">
        <i class="fas fa-user"></i>
        Profile
       </a>
       </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'submitrequest') { echo 'active'; } ?>" href="submitrequest.php">
        <i class="fab fa-accessible-icon"></i>
        Submit Request
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'servicestatus') { echo 'active'; } ?>" href="servicestatus.php">
        <i class="fas fa-align-center"></i>
        Service Status
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'userchangepassword') { echo 'active'; } ?>" href="userchangepassword.php">
        <i class="fas fa-key"></i>
        Change Password
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="../logout.php">
        <i class="fas fa-sign-out-alt"></i>
        Logout
       </a>
      </li>
     </ul>
</div>
</nav>
     
