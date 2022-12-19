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
  <title>Register Department | Finger-print Identity Authorisation Exam System</title>
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
              <li><a href="reg_student.php">Students</a></li>
              <li><a href="reg_class.php">Classes</a></li>
              <li><a href="reg_course.php">Courses</a></li>
              <li><a href="reg_hall.php">Halls</a></li>
              <li><a href="reg_dept.php">Department</a></li>
            </ul>
          </li>
          <li class="drop-down"><a href="">Manage</a>
            <ul>
              <li><a href="../manage/man_finance.php">Finance</a></li>
              <li><a href="../manage/man_attendance.php">Attendance</a></li>
              <li><a href="../manage/man_ttable.php">Time-table</a></li>
              <li><a href="../manage/man_splan.php">Seating-plan</a></li>
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
        <div class="card-body">
          <h1 style="margin-top: -30px">Departments</h1>
          <button style="float: right;margin-top: -60px" class="btn btn-primary" data-toggle = "modal" data-target="#reg_dept_mdl">New</button>
          <div class="table-responsive">
          <div id="tbl_resp">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead style="font-size: 10px;margin-left: -12px">
                <tr>
                  <th>#</th>
                  <th>Dept-Name</th>
                  <th>Dept-Abbreviation</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr style="font-size: 10px;margin-left: -12px">
                  <th>#</th>
                  <th>Dept-Name</th>
                  <th>Dept-Abbreviation</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
<?php
$sel_dept=mysql_query("SELECT * FROM boris_department");
if (mysql_num_rows($sel_dept)>=1) {
  $i=1;
  while ($ft_sel_dept=mysql_fetch_assoc($sel_dept)) {
    ?>
    <tr>
      <td>
        <?php echo $i.". ";?>
      </td>
      <td>
        <?php echo $ft_sel_dept['dept_name'];?>
      </td>
      <td>
        <?php echo $ft_sel_dept['dept_abbre'];?>
      </td>
      <td>
        <a href=""><button class="btn btn-danger">Delete</button></a>
      </td>
    </tr>
    <?php
    $i++;
  }
}else{
  echo "<tr><td colspan='4'>No Department available...</td></tr>";
}
?>
              </tbody>        
            </table>   
<!--   ===========          REGISTER DEPARTMENTS MODAL   =========== -->  
         <div class = "modal fade" id = "reg_dept_mdl" role = "dialog">
            <div class = "modal-dialog modal-lg">
               <div class = "modal-content">
                  <div class = "modal-header">  
                  <center>
                    <h2 style="color: #000;">Departments Registration Form</h2>
                  </center>   
                     <button type = "button" class="close" data-dismiss = "modal">×</button>
                  </div>
                  <div class = "modal-body">

<span style="color: #000">
<span id="resp"></span>
  <div class="form-group row">
    <label for="dept_nm" class="col-sm-4 col-form-label">Department Name: </label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="dept_nm" placeholder="Name">
    </div>
  </div>
  <div class="form-group row">
    <label for="dept_abr" class="col-sm-4 col-form-label">Department Abbreviation: </label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="dept_abr" placeholder="Abbreviation">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" onclick="return regDept()">Register</button>
    </div>
  </div>
</span>


                  </div>
                  <div class = "modal-footer">
                     <button type = "button" class = "btn btn-primary" data-dismiss = "modal">Close</button>
                  </div>
               </div>
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
