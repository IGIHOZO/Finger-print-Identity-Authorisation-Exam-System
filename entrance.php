<?php
require("connect.php");
if (!isset($_SESSION['admin'])) {
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Entrance | Finger-print Identity Authorisation Exam System</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">
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
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="entrance.php">Entrance</a></li>
          <li class="drop-down"><a href="">Registration</a>
            <ul>
              <li><a href="register/reg_student.php">Students</a></li>
              <li><a href="register/reg_class.php">Classes</a></li>
              <li><a href="register/reg_course.php">Courses</a></li>
              <li><a href="register/reg_hall.php">Halls</a></li>
              <li><a href="register/reg_dept.php">Department</a></li>
            </ul>
          </li>
          <li class="drop-down"><a href="">Manage</a>
            <ul>
              <li><a href="manage/man_finance.php">Finance</a></li>
              <li><a href="manage/man_attendance.php">Attendance</a></li>
              <li><a href="manage/man_ttable.php">Time-table</a></li>
              <li><a href="manage/man_splan.php">Seating-plan</a></li>

            </ul>
          </li>
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
<center style="margin-top: 0px">
    <h1>Student <u style="text-decoration: underline double">Entrance</u> Verification    <label style="font-size: 20px" id="resp"></label></h1>
</center>
<!-- Material form login -->
<div class="card">

<div class="container">
  <div class="row">
  <div class="col-lg-6 mb-6">
<form style="margin-top: 30px" class="form-inline" action="#">
  <div class="form-group">
    <label for="StIndex">Student Index: &nbsp;&nbsp;</label>
<input type="text" class="form-control" placeholder="Paste Here" id="StIndex">
&nbsp;&nbsp;&nbsp;
<button style="font-weight: bolder;" class="btn btn-success" onclick="return checkIndex()"><i class="fa fa-check" style="font-size:100%"></i> &nbsp;Verify</button>
  </div>
</form> 
  </div>
  <div class="col-lg-6 mb-6">
<div id="respChck">
    <table width="70%" style="float: right;margin-top: -20px;border:6px groove #99a59e;text-align: left;vertical-align: top;background-color: #3e4545">
      <tr>
        <td style="border-radius: 50%;border: #989a99 groove 6px; " colspan="2">
          <table style="margin-top: 0px margin-top: -20px;width: 100%">
            <tr>
              <td>
                <h1>Status:</h1>
              </td>
              <td colspan="3"><h1>-</h1></td>
            </tr>
            <tr style="font-size: 20px">
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              Finance:</td>
              <td colspan="*">-</td>

            </tr>
            <tr style="font-size: 20px">
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              Attendance:</td>
              <td colspan="*">-</td>

            </tr>
            <tr style="font-size: 20px">
              <td>
              Hall:</td>
              <td colspan="*">-</td>

            </tr>
            <tr style="font-size: 20px">
              <td>
              Course:</td>
              <td colspan="*">-</td>

            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <table style="margin-top: 0px margin-top: -20px;width: 100%">
            <tr>
              <td colspan="1">
                <h5>Index:</h5>
              </td>
              <td colspan="3"></td>
            </tr>
            <tr>
              <td colspan="1">
                <h5>Names:</h5>
              </td>
              <td colspan="3"></td>
            </tr>
            <tr>
              <td colspan="1">
                <h5>Class:</h5>
              </td>
              <td colspan="3"></td>
            </tr>
            <tr>
              <td colspan="1">
                <h5>Dept:</h5>
              </td>
              <td colspan="3"></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
</div>
  </div>
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
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script src="main/js/index.js"></script>

</body>
</html>
