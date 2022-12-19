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
  <title>Manage Seating-Plan | Finger-print Identity Authorisation Exam System</title>
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
<center style="margin-top: -30px">
    <h1>Students  <u style="text-decoration: underline double">Seating Halls </u>    <label style="font-size: 20px" id="resp"></label></h1>
</center>
 <form class="form-inline" action="/action_page.php">
  <div class="form-group">
    <label for="sel_cls">Select Class:</label>
    <select class="form-control" id="sel_cls" onclick="return orStClssHall()">
      <?php
$sel_cls=mysql_query("SELECT * FROM boris_classes")or die(mysql_error());
if (mysql_num_rows($sel_cls)<1) {
  echo "<option value=''>No class available</option>";
}else{
  $i=0;
  while ($ft_sel_cls=mysql_fetch_assoc($sel_cls)) {
    ?>
<option <?php if ($i==0){echo "selected='true'";}?> value="<?php echo $ft_sel_cls['class_id']?>"><?php echo $ft_sel_cls['class_name'];?></option>
    <?php
    $i++;
  }
}
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="chckHlls">&nbsp;&nbsp; Hall:</label>
    <select class="form-control" id="chckHlls">
    </select>
  </div>

  <div class="form-group">
    &nbsp;&nbsp;&nbsp;
    <input type="button" class="btn btn-success" value="Ok, Set" onclick="return regSplan()">
  </div>
</form> 
<div class="card">
  <div class="table-responsive">
     <div id="tbl_resp">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <th>
            #
          </th>
          <th>
            Hall
          </th>
          <th>
            Total Seats
          </th>
          <th>
            Taken
          </th>
          <th>
            Remaining
          </th>
          <th>
            Classes
          </th>
        </thead>
        <tfoot>
          <th>
            #
          </th>
          <th>
            Hall
          </th>
          <th>
            Total Seats
          </th>
          <th>
            Taken
          </th>
          <th>
            Remaining
          </th>
          <th>
            Classes
          </th>
        </tfoot>
        <tbody id="resp_tb_hlls">
          
        </tbody>
      </table>
      <button style="float: right;color: #f67;text-decoration: underline;" class="btn btn-link" onclick="return resetSPlan();">Reset all</button>
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
  <script type="text/javascript">
    //=======================displaying Halls
    regDispSplan();
  </script>
</body>
</html>
