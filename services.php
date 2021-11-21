<?php
include('dbconnection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Services</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
 <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v4.3.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">OSMS</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php">About</a></li>
          <li><a class="nav-link scrollto" href="services.php">Services</a></li>
           <li><a class="nav-link scrollto" href="technition.php">Technician</a></li> 
          
          <li><a class="nav-link scrollto" href="contact.php">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <div class="col-sm-9 col-md-10 text-center" style="margin-top:80px;" >
  <div class="container" data-aos="fade-up">
  <!--Table-->
  <div class="section-title" style="margin-top:70px;" >
          <h2>List of Services</h2>
        </div>


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
</div>
  <div class="container text-center border-bottom" style="margin-top:80px;" id="Services">
  <div class="container" data-aos="fade-up">
  
  <div class="section-title" style="margin-top:70px;" >
          <h2>Services</h2>
        </div>

    <div class="row mt-4">
      <div class="col-sm-4 mb-4">
        <a href="Requester/request.php"><i class="fas fa-laptop-code fa-8x text-success"></i></a>
        <h4 class="mt-4">Laptop and computers repair</h4>
      </div>
      <div class="col-sm-4 mb-4">
        <a href="Requester/request.php"><i class="fas fa-cogs fa-8x text-secondary"></i></a>
        <h4 class="mt-4">Preventive Maintenance</h4>
      </div>
      <div class="col-sm-4 mb-4">
      <a href="Requester/request.php"><i class="fas fa-house-damage fa-8x text-info"></i></a>
        <h4 class="mt-4">House damage Repair</h4>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-sm-4 mb-4">
        <a href="Requester/request.php"><i class="fas fa-wrench fa-8x text-dark"></i></a>
        <h4 class="mt-4">Plumbing</h4>
      </div>
      <div class="col-sm-4 mb-4">
        <a href="Requester/request.php"><i class="fas fa-mobile-alt fa-8x text-primary"></i></a>
        <h4 class="mt-4">Mobile repair</h4>
      </div>
      <div class="col-sm-4 mb-4">
        <a href="Requester/request.php"><i class="fas fa-car-crash fa-8x text-danger"></i></a>
        <h4 class="mt-4">Vehicle servicing</h4>
      </div>
    </div>
  </div> <!-- End Services -->
</div>
<footer id="footer">

    

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>OSMS</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
          <small> Designed by Someone &copy; 2021.
          </small>
          <small class="ml-2"><a href="Admin/login.php"></a></small>
      </div>
    </div>
  </footer><!-- End Footer -->


  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  
</body>
  </html>