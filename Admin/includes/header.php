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

<link rel="stylesheet" href="../css/main.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
 <!-- Top Navbar -->
  <nav class="navbar navbar-dark fixed-top bg-secondary flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">OSMS</a>
 </nav>
 <div class="container-fluid mb-5" style="margin-top:40px;">
  <div class="row">
   <nav class="col-sm-3 col-md-2 bg-secondary sidebar py-5 d-print-none">
    <div class="sidebar-sticky" style ="background-color: #DCDCDC">
     <ul class="nav flex-column">
      <li class="nav-item">
       <a class="nav-link  <?php if(PAGE == 'dashboard') { echo 'active'; } ?>" href="dashboard.php">
        <i class="fas fa-tachometer-alt"></i>
        Dashboard
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link  <?php if(PAGE == 'work') { echo 'active'; } ?>" href="work.php">
        <i class="fab fa-accessible-icon"></i>
        Work Order
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link  <?php if(PAGE == 'request') { echo 'active'; } ?>" href="request.php">
        <i class="fas fa-align-center"></i>
        Registered user request
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link  <?php if(PAGE == 'assets') { echo 'active'; } ?>" href="assets.php">
        <i class="fas fa-database"></i>
        Unregistered user request
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link  <?php if(PAGE == 'technician') { echo 'active'; } ?>" href="technician.php">
        <i class="fab fa-teamspeak"></i>
        Technician
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link  <?php if(PAGE == 'services') { echo 'active'; } ?>" href="Services.php">
        <i class="fas fa-users"></i>
        Services
       </a>
      </li>
     
      <li class="nav-item">
       <a class="nav-link  <?php if(PAGE == 'pass') { echo 'active'; } ?>" href="changepassword.php">
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
