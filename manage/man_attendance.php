<?php
require("../connect.php");
if (!isset($_SESSION['admin'])) {
  header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Manage Attendance | Finger-print Identity Authorisation Exam System</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Bootstrap CSS File -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <link href="../css/style.css" rel="stylesheet">
          <style type="text/css">
            span.bigcheck-target {
  font-family: FontAwesome; /* use an icon font for the checkbox */
}

input[type='checkbox'].bigcheck {
  position: relative;
  left: -999em; /* hide the real checkbox */

}

input[type='checkbox'].bigcheck + span.bigcheck-target:after {
  content: "\f096"; /* In fontawesome, is an open square (fa-square-o) */
}

input[type='checkbox'].bigcheck:checked + span.bigcheck-target:after {
  content: "\f046"; /* fontawesome checked box (fa-check-square-o) */
}

/* ==== optional - colors and padding to make it look nice === */
body {
  background-color: #2C3E50;
  color: #D35400;
  font-family: sans-serif;
  font-weight: 500;
}

span.bigcheck {
  display: block;
  padding: 0.5em;
}
          </style>
</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <center>
          <a href="#intro" class="scrollto"><h2 style="font-weight: bolder;font-size: 30px">Finger-print Identity Authorisation Exam System</h2></a>
        </center>
      </div>
      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="../index.php">Home</a></li>
          <li class="drop-down"><a href="">Registration</a>
            <ul>
              <li><a href="../register/reg_student.php">Students</a></li>
              <li><a href="../register/reg_class.php">Classes</a></li>
              <li><a href="../register/reg_course.php">Courses</a></li>
              <li><a href="../register/reg_hall.php">Halls</a></li>
              <li><a href="../register/reg_dept.php">Department</a></li>
            </ul>
          </li>
          <li class="drop-down"><a href="">Manage</a>
            <ul>
              <li><a href="man_finance.php">Finance</a></li>
              <li><a href="man_attendance.php">Attendance</a></li>
              <li><a href="man_ttable.php">Time-table</a></li>
              <li><a href="man_splan.php">Seating-plan</a></li>
            </ul>
          </li>
          <li><a href="../logout.php">Logout</a></li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->
<main id="main">
    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <div style="margin-top: 40px" class="row row-eq-height justify-content-center">

          <div class="col-lg-12 mb-12">
            <div class="card wow bounceInUp">
 <form style="margin-top: -30px" class="form-inline" action="/action_page.php">
  <div class="form-group">
    <label for="email">Select Class:</label>
    <select class="form-control" id="sel_cls" onclick="return viewManageClsAtt()">
      <?php
$sel_cls=mysql_query("SELECT * FROM boris_classes")or die(mysql_error());
if (mysql_num_rows($sel_cls)<1) {
  echo "<option value=''>No class available</option>";
}else{
  while ($ft_sel_cls=mysql_fetch_assoc($sel_cls)) {
    ?>
<option value="<?php echo $ft_sel_cls['class_id']?>"><?php echo $ft_sel_cls['class_name'];?></option>
    <?php
  }
}
      ?>
    </select>
  </div>
<dir>  <center>
    <h1><u style="text-decoration: underline double">Attendance</u>-Based Exclusion</h1>
  </center></dir>
</form> 
<!-- Material form login -->
<div class="card">


<!-- <span id="resp_spn_clstbl"></span> -->
<div class="table-responsive">
          <div id="tbl_resp">
            <center><label>Choose Class</label></center>

          </div>
</div>


  </div>
</div>
            </div>
          </div>

<!-- Footer -->
<footer class="page-footer font-small indigo">

      <!-- Grid row-->
      <hr class="clearfix d-md-none rgba-white-light">

    <div class="footer-copyright text-center py-3"style="color: #e34355" >© 2019 Copyright: &nbsp;&nbsp;
      <a href="#" style="color: #fff"> <span style="text-decoration: underline;">Boris</span> | Final Project. &nbsp;&nbsp; IPRC Tumba</a>
    </div>
  </footer>
  <!-- Footer -->
        </div>
      </div>
    </section>
  </main>


  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/easing/easing.min.js"></script>
  <script src="../lib/mobile-nav/mobile-nav.js"></script>
  <script src="../lib/wow/wow.min.js"></script>
  <script src="../lib/waypoints/waypoints.min.js"></script>
  <script src="../lib/counterup/counterup.min.js"></script>
  <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../lib/isotope/isotope.pkgd.min.js"></script>
  <script src="../lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../js/main.js"></script>    
  <script src="../main/js/index.js"></script>

</body>
</html>
