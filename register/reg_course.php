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
  <title>Register Course | Finger-print Identity Authorisation Exam System</title>
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
          <h1 style="margin-top: -30px">Courses</h1>
          <button style="float: right;margin-top: -60px" class="btn btn-primary" data-toggle = "modal" data-target="#reg_dept_mdl">New</button>
          <div class="table-responsive">
          <div id="tbl_resp">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead style="font-size: 10px;margin-left: -12px">
                <tr>
                  <th>#</th>
                  <th>Course-Name</th>
                  <th>Course-Class</th>
                  <th>Course-Level</th>
                  <th>Course-Department</th>
                </tr>
              </thead>
              <tfoot>
                <tr style="font-size: 10px;margin-left: -12px">
                  <th>#</th>
                  <th>Course-Name</th>
                  <th>Course-Class</th>
                  <th>Course-Level</th>
                  <th>Course-Department</th>
                </tr>
              </tfoot>
              <tbody>
<?php
$sel_crss=mysql_query("SELECT * FROM boris_courses");
if (mysql_num_rows($sel_crss)>0) {
  $i=1;
 while ($ft_sel_crss=mysql_fetch_assoc($sel_crss)) {
   ?>
   <tr>
     <td>
       <?php echo $i.". "?>
     </td>
     <td>
       <?php echo $ft_sel_crss['course_name'];?>
     </td>
     <td>
       <?php $crs_cls=$ft_sel_crss['course_class'];
       $sel_clsscs=mysql_query("SELECT * FROM boris_classes WHERE class_id='$crs_cls'")or die(mysql_error());
       if (mysql_num_rows($sel_clsscs)>0) {
         echo $ft_sel_clsscs=mysql_fetch_assoc($sel_clsscs)['class_name'];
       }
       ?>
     </td>
     <td>
       <?php echo $ft_sel_crss['course_level'];?>
     </td>
     <td>
       <?php $crs_dpt=$ft_sel_crss['course_dept'];
       $sel_dpttcs=mysql_query("SELECT * FROM boris_department WHERE dept_id='$crs_dpt'")or die(mysql_error());
       if (mysql_num_rows($sel_dpttcs)>0) {
         echo $ft_sel_dpttcs=mysql_fetch_assoc($sel_dpttcs)['dept_name'];
       }
       ?>
     </td>
   </tr>
   <?php
   $i++;
 }
}else{
  echo "<tr><td colspan='5'>No Course available...</td></tr>";
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
                    <h2 style="color: #000;">Courses Registration Form</h2>
                  </center>   
                     <button type = "button" class="close" data-dismiss = "modal">??</button>
                  </div>
                  <div class = "modal-body">

<span style="color: #000">
  <span id="resp"></span>
  <div class="form-group row">
    <label for="crs_cls" class="col-sm-4 col-form-label">Course Class </label>
    <div class="col-sm-8">
      <select class="form-control" id="crs_cls">
        <?php
        $sel_cr_cls=mysql_query("SELECT * FROM boris_classes");
        if (mysql_num_rows($sel_cr_cls)<1) {
          echo "<option value=''>No class available</option>";
        }else{
          while ($ft_sel_cr_cls=mysql_fetch_assoc($sel_cr_cls)) {
            ?>
            <option value="<?php echo $ft_sel_cr_cls['class_id']?>"><?php echo $ft_sel_cr_cls['class_name']?></option>
            <?php
          }
        }
        ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="crs_nme" class="col-sm-4 col-form-label">Course Name: </label>
    <div class="col-sm-8">
      <input type="text" id="crs_nme" placeholder="Course Name" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" onclick="return regCrs()">Register</button>
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

    <div class="footer-copyright text-center py-3"style="color: #e34355" >?? 2019 Copyright: &nbsp;&nbsp;
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
