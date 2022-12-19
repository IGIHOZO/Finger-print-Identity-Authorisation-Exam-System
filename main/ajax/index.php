<?php
require("../../connect.php");
//GETTING SAFE INPUT VARIABLES
function get_input($inpt){
	return mysql_real_escape_string(stripslashes($_GET[$inpt]));
}

 //=========================================================================================================REGISTRATION
//===========================================================================================================================


//-------------------------------------------------------------- REGISTER DEPARTMENT
if (isset($_GET['regDept'])) {
	$dept_name=get_input('deptNme');
	$dept_abr=get_input('deptAbrev');
	$sel_dept=mysql_query("SELECT * FROM boris_department WHERE dept_name='$dept_name' or dept_abbre='$dept_abr'");
	if (mysql_num_rows($sel_dept)>0) {
		echo "This depatment is already registerd";
	}else{
		$ins_dept=mysql_query("INSERT INTO boris_department VALUES('','$dept_name','$dept_abr','E','$reg_date')")or die(mysql_error());
		if ($ins_dept){
			echo "<span id='res_scc'>Registered Successfully</span>";
			echo "<script type='text/javascript'>function hhidef(){window.location.reload(true);}window.setTimeout(hhidef,1500);</script>";

		}
	}
}
//--------------------------------------------------------------------------- REGISTER CLASS
if (isset($_GET['regClss'])) {
	$cls_nm=get_input('ClsFllNme');
	$cls_lvl=get_input('clLvl');
	$cls_dept=get_input('clDpt');
	$sel_cls=mysql_query("SELECT * FROM boris_classes WHERE class_name='$cls_nm'")or die(mysql_error());
	if (mysql_num_rows($sel_cls)>0) {
		echo "This Class is already available ...";
	}else{
		$sel_dpt=mysql_query("SELECT * FROM boris_department WHERE dept_abbre='$cls_dept'")or die(mysql_error());
		if (mysql_num_rows($sel_dpt)!=1) {
			echo "Invalid Department ...$cls_dept";
		}else{
			$ft_sel_dep=mysql_fetch_assoc($sel_dpt);
			$cls_dept_id=$ft_sel_dep['dept_id'];
			$ins_cls=mysql_query("INSERT INTO boris_classes VALUES('','$cls_nm','$cls_dept_id','$cls_lvl','E','$reg_date')")or die(mysql_error());
			if ($ins_cls) {
				echo "<span id='res_scc'>Registerd Successfully</span>";
				echo "<script type='text/javascript'>function hhidef(){window.location.reload(true);}window.setTimeout(hhidef,1500);</script>";
			}
		}

	}
}


//------------------------------------------------REGISTERING COURSES------------------------------
if (isset($_GET['regCrs'])) {
	$crs_cls=get_input("crsCls");
	$crs_nm=get_input("crsNme");
	$sel_csr=mysql_query("SELECT * FROM boris_courses WHERE course_class='$crs_cls' AND course_name='$crs_nm'")or die(mysql_error());
	if (mysql_num_rows($sel_csr)>0) {
		echo "This Course is arleady available...";
	}else{
		$sel_cls_crs=mysql_query("SELECT * FROM boris_classes WHERE class_id='$crs_cls'")or die(mysql_error());
		if (mysql_num_rows($sel_cls_crs)==1) {
			$ft_sel_cls_crs=mysql_fetch_assoc($sel_cls_crs);
			$crs_ccrrs=$ft_sel_cls_crs['class_id'];
			$crs_lvl=$ft_sel_cls_crs['class_level'];
			$crs_dept=$ft_sel_cls_crs['class_dept'];
			$ins_crs=mysql_query("INSERT INTO boris_courses VALUES('','$crs_nm','$crs_ccrrs','$crs_dept','$crs_lvl','E','$reg_date')")or die(mysql_error());
			if ($ins_crs) {
				echo "<span id='res_scc'>Registered Successfully</span>";
				echo "<script type='text/javascript'>function hhidef(){window.location.reload(true);}window.setTimeout(hhidef,1500);</script>";
			}
		}
	}
}

//-------------------------------------------------REGISTER STUDENT---------------------------------------
if (isset($_GET['regStdnt'])) {
	$st_fname=get_input("stFName");
	$st_lname=get_input("stLName");
	$st_cls=get_input("stCls");
	$sel_std_cls=mysql_query("SELECT * FROM boris_classes WHERE class_id='$st_cls'")or die(mysql_error());
	if (mysql_num_rows($sel_std_cls)==1) {
		$ft_sel_std_cls=mysql_fetch_assoc($sel_std_cls);
		$cl_lvl=$ft_sel_std_cls['class_level'];
		$cl_dpt=$ft_sel_std_cls['class_dept'];
		$st_reg_reg='';
		$sel_ststreg=mysql_query("SELECT * FROM boris_students order by student_id DESC LIMIT 1");
		if (mysql_num_rows($sel_ststreg)>0) {
			$ft_sel_ststreg=mysql_fetch_assoc($sel_ststreg);
			$st_last_reg=($ft_sel_ststreg['student_id']+1);
			$st_reg_reg=str_pad($st_last_reg,5,0,STR_PAD_LEFT);
		}else{
			$st_reg_reg=str_pad(1,5,0,STR_PAD_LEFT);
		}
		$st_reg_nmbr=("ST".$st_reg_reg);
		$ins_st=mysql_query("INSERT INTO boris_students VALUES('','$st_fname','$st_lname','$st_reg_nmbr','$st_cls','$cl_dpt','$cl_lvl','','','','E','$reg_date')")or die(mysql_error());
		if ($ins_st) {
			echo "<span id='res_scc'>Registered Successfully</span>";
			echo "<script type='text/javascript'>function hhidef(){window.location.reload(true);}window.setTimeout(hhidef,1500);</script>";
		}else{
			echo "Failed...";
		}
	}
}


//-------------------------------------------------------------------REGISTER HALLS-------------------------------

if (isset($_GET['regHalls'])) {
	$hll_nm=get_input("hllName");
	$hll_cols=get_input("hllCols");
	$hll_rows=get_input("hllRows");
	$hall_count=$hll_rows*$hll_cols;
	$sel_halls=mysql_query("SELECT * FROM boris_halls WHERE hall_name='$hll_nm'")or die(mysql_error());
	if (mysql_num_rows($sel_halls)>0) {
		echo "This Hall is already available...";
	}else{
		$ins_hall=mysql_query("INSERT INTO boris_halls VALUES('','$hll_nm','$hll_cols','$hll_rows','$hall_count','E','$reg_date')");
		if ($ins_hall) {
			echo "<span id='res_scc'>Registered Sucessfully</span>";
			echo "<script type='text/javascript'>function hhidef(){window.location.reload(true);}window.setTimeout(hhidef,1500);</script>";
		}
	}
}

 //=========================================================================================================MANAGE
//===========================================================================================================================

//----------------------------------------------------------------------MANAGE ATTENDANCE------------
//-----------------------------ON SELECT CLASS

if (isset($_GET['viewManageClsAtt'])) {
	$cls_id=get_input("clsNm");
	$sel_cls_ll=mysql_query("SELECT * FROM boris_students WHERE student_class='$cls_id'")or die(mysql_error());
			?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <th>
                  #
                </th>
                <th>
                  Reg-N<sup style="text-decoration: underline;">o</sup>
                </th>
                <th>
                  Name
                </th>
                <th>
                	Exclude
                </th>
              </thead>
              <tfoot>
                <th>
                  #
                </th>
                <th>
                  Reg-N<sup style="text-decoration: underline;">o</sup>
                </th>
                <th>
                  Name
                </th>
				<th>
					Exclude
				</th>         
              </tfoot>
              <tbody id="tbl_resp">

		<?php
	if (mysql_num_rows($sel_cls_ll)>0) {
		$i=1;

		while ($ft_sel_cls_ll=mysql_fetch_assoc($sel_cls_ll)) {
			?>
			<tr>
				<td>
					<?php echo $i?>
				</td>
				<td>
					<?php echo $ft_sel_cls_ll['student_reg'];?>
				</td>
				<td>
					<?php echo strtoupper($ft_sel_cls_ll['student_fname'])." ".ucfirst($ft_sel_cls_ll['student_lname']);?>
				</td>
				<td>
<span class="bigcheck">
  <label class="bigcheck">
  	<?php
  	switch ($ft_sel_cls_ll['student_attendance']) {
  		case 0:
  			?>
  				<input type="checkbox" class="bigcheck" name="cheese" value="<?php echo $ft_sel_cls_ll['student_id'];?>" id="checkStdAdd" onchange="if (this.checked) {		return stChdAtt(<?php echo $ft_sel_cls_ll['student_id'];?>);	}else{		return stUnchdAtt(<?php echo $ft_sel_cls_ll['student_id'];?>);	}" />
  			<?php
  			break;
  		
  		default:
  			?>
  			<input checked="true" type="checkbox" class="bigcheck" name="cheese" value="<?php echo $ft_sel_cls_ll['student_id'];?>" id="checkStdAdd" onchange="if (this.checked) {		return stChdAtt(<?php echo $ft_sel_cls_ll['student_id'];?>);	}else{		return stUnchdAtt(<?php echo $ft_sel_cls_ll['student_id'];?>);	}" />
  			<?php
  			break;
  	}
  	?>
    
    <span class="bigcheck-target" style="float: right;"></span>
  </label>
  <span id="res_chk"></span>
</span>
				</td>
			</tr>
			<?php
			$i++;
		}?>

              </tbody>
            </table>
		<?php
	}else{
		echo "<tr><td colspan='3'>No Students available</td></tr>";
	}
}


//---------------------------------------------------------------------------------------CHECKBOX ON EXCLUDE
//-------------------------------------------------------------------------------CHECKED
if (isset($_GET['stChdAtt'])) {
	$st_id=get_input("stId");
	$sel_st_iid=mysql_query("SELECT * FROM boris_students WHERE student_id='$st_id'")or die(mysql_error());
	if (mysql_num_rows($sel_st_iid)==1) {
		$upd_st_att=mysql_query("UPDATE boris_students SET student_attendance=1 WHERE student_id='$st_id'")or die(mysql_error());
		if ($upd_st_att) {
			echo "Updated";
		}else{
			echo "failed";
		}
	}
}

//----------------------------------------------------------------------------------UNCHECKED
if (isset($_GET['stUnchdAtt'])) {
	$st_id=get_input("stId");
	$sel_st_iid=mysql_query("SELECT * FROM boris_students WHERE student_id='$st_id'")or die(mysql_error());
	if (mysql_num_rows($sel_st_iid)==1) {
		$upd_st_att=mysql_query("UPDATE boris_students SET student_attendance=0 WHERE student_id='$st_id'")or die(mysql_error());
		if ($upd_st_att) {
			echo "Updated";
		}else{
			echo "failed";
		}
	}
}





//-------------------------------------------------------------------------------MANAGE FINANCE------------
//-----------------------------------------------------------------------------ON SELECT CLASS

if (isset($_GET['viewManageClsFinc'])) {
	$cls_id=get_input("clsNm");
	$sel_cls_ll=mysql_query("SELECT * FROM boris_students WHERE student_class='$cls_id'")or die(mysql_error());
			?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <th>
                  #
                </th>
                <th>
                  Reg-N<sup style="text-decoration: underline;">o</sup>
                </th>
                <th>
                  Name
                </th>
                <th>
                	Exclude
                </th>
              </thead>
              <tfoot>
                <th>
                  #
                </th>
                <th>
                  Reg-N<sup style="text-decoration: underline;">o</sup>
                </th>
                <th>
                  Name
                </th>
				<th>
					Exclude
				</th>         
              </tfoot>
              <tbody id="tbl_resp">

		<?php
	if (mysql_num_rows($sel_cls_ll)>0) {
		$i=1;

		while ($ft_sel_cls_ll=mysql_fetch_assoc($sel_cls_ll)) {
			?>
			<tr>
				<td>
					<?php echo $i?>
				</td>
				<td>
					<?php echo $ft_sel_cls_ll['student_reg'];?>
				</td>
				<td>
					<?php echo strtoupper($ft_sel_cls_ll['student_fname'])." ".ucfirst($ft_sel_cls_ll['student_lname']);?>
				</td>
				<td>
<span class="bigcheck">
  <label class="bigcheck">
  	<?php
  	switch ($ft_sel_cls_ll['student_finance']) {
  		case 0:
  			?>
  				<input type="checkbox" class="bigcheck" name="cheese" value="<?php echo $ft_sel_cls_ll['student_id'];?>" id="checkStdAdd" onchange="if (this.checked) {		return stChdFinc(<?php echo $ft_sel_cls_ll['student_id'];?>);	}else{		return stUnchdFinc(<?php echo $ft_sel_cls_ll['student_id'];?>);	}" />
  			<?php
  			break;
  		
  		default:
  			?>
  			<input checked="true" type="checkbox" class="bigcheck" name="cheese" value="<?php echo $ft_sel_cls_ll['student_id'];?>" id="checkStdAdd" onchange="if (this.checked) {		return stChdFinc(<?php echo $ft_sel_cls_ll['student_id'];?>);	}else{		return stUnchdFinc(<?php echo $ft_sel_cls_ll['student_id'];?>);	}" />
  			<?php
  			break;
  	}
  	?>
    
    <span class="bigcheck-target" style="float: right;"></span>
  </label>
  <span id="res_chk"></span>
</span>
				</td>
			</tr>
			<?php
			$i++;
		}?>

              </tbody>
            </table>
		<?php
	}else{
		echo "<tr><td colspan='3'>No Students available</td></tr>";
	}
}


//--------------------------------------------------------------------------------------------CHECKBOX ON EXCLUDE
//-------------------------------------------------------------CHECKED
if (isset($_GET['stChdFinc'])) {
	$st_id=get_input("stId");
	$sel_st_iid=mysql_query("SELECT * FROM boris_students WHERE student_id='$st_id'")or die(mysql_error());
	if (mysql_num_rows($sel_st_iid)==1) {
		$upd_st_att=mysql_query("UPDATE boris_students SET student_finance=1 WHERE student_id='$st_id'")or die(mysql_error());
		if ($upd_st_att) {
			echo "Updated";
		}else{
			echo "failed";
		}
	}
}

//-----------------------------------------------------------UNCHECKED
if (isset($_GET['stUnchdFinc'])) {
	$st_id=get_input("stId");
	$sel_st_iid=mysql_query("SELECT * FROM boris_students WHERE student_id='$st_id'")or die(mysql_error());
	if (mysql_num_rows($sel_st_iid)==1) {
		$upd_st_att=mysql_query("UPDATE boris_students SET student_finance=0 WHERE student_id='$st_id'")or die(mysql_error());
		if ($upd_st_att) {
			echo "Updated";
		}else{
			echo "failed";
		}
	}
}

//====================================================================== ON CHECK CLASS == TIMETABLE
if (isset($_GET['chckClassExm'])) {
	$cls_iid=get_input("clsId");
	$sel_crs=mysql_query("SELECT * FROM boris_courses WHERE course_class='$cls_iid'")or die(mysql_error());
	if (mysql_num_rows($sel_crs)>0) {
		while ($ft_sel_crs=mysql_fetch_assoc($sel_crs)) {
			?>
			<option value="<?php echo $ft_sel_crs['course_id'];?>"><?php echo $ft_sel_crs['course_name'];?></option>
			<?php
		}
	}else{
		echo "<option value=''>No Course</option>";
	}
}

//============================================================================ CHECK AVAILABLE TTABLES
if (isset($_GET['chcCrsTtble'])) {
	$cls_id=get_input("clsId");
	$sel_crs_ttbl=mysql_query("SELECT boris_courses.course_name,boris_ttable.* FROM boris_courses,boris_ttable WHERE boris_courses.course_class=boris_ttable.ttable_class AND boris_courses.course_id=boris_ttable.ttable_course AND ttable_class='$cls_id' ORDER BY ttable_start ASC")or die(mysql_error());
	if (mysql_num_rows($sel_crs_ttbl)>0) {
		$i=1;
		while ($ft_sel_crs_ttbl=mysql_fetch_assoc($sel_crs_ttbl)) {
			?>
			<tr>
				<td>
					<?php echo $i;?>
				</td>
				<td>
					<?php echo $ft_sel_crs_ttbl['course_name'];?>
				</td>
				<td>
					<?php echo substr($ft_sel_crs_ttbl['ttable_start'], 0,10);?>
				</td>
				<td>
					<?php echo substr($ft_sel_crs_ttbl['ttable_start'], 10,6);?>
				</td>
				<td>
					<?php echo substr($ft_sel_crs_ttbl['ttable_end'], 10,6);?>
				</td>
			</tr>
			<?php
			$i++;
		}
	}else{
		echo "-";
	}
}

//================================================================================= SET TTABLE
if (isset($_GET['regTTble'])) {
	$cls_id=get_input("ttbCls");
	$crs_id=get_input("ttbCrs");
	$date_day=get_input("ttbDay");
	$date_time=get_input("ttbTime");
	$date_end=get_input("ttbEndTime");
	$new_date_time=str_replace("-", ":", $date_time).":00";
	$new_date_end=str_replace("-", ":", $date_end).":00";
	$full_start_time=$date_day." ".$new_date_time;
	$full_end_time=$date_day." ".$new_date_end;
	$start_time = strtotime($full_start_time);
	$end_time = strtotime($full_end_time);
	if ($start_time>$end_time) {
		echo "Starting-time must be before end-time...";
	}else{
		$sel_ttble_crs=mysql_query("SELECT * FROM boris_ttable WHERE ttable_course='$crs_id' AND ttable_class='$cls_id'")or die(mysql_error());
		if (mysql_num_rows($sel_ttble_crs)>0) {
			echo "This course is already set ...";
		}else{
			$ins_ttble=mysql_query("INSERT INTO boris_ttable VALUES('','$crs_id','$cls_id','$full_start_time','$full_end_time','E','$reg_date')")or die(mysql_error());
			if ($ins_ttble) {
				echo "<span id='res_scc'>Set Successfully</span>";
			    echo "<script type='text/javascript'>function hhidef(){window.location.reload(true);}window.setTimeout(hhidef,1500);</script>";
			}else{
				echo "Failed...";
			}
		}
	}
}
//================================================================================= OPRIENT STUDENT IN HALL
if (isset($_GET['orStClssHall'])) {
	$sc_cls_id=get_input("stCls");
	$sel_se_halls=mysql_query("SELECT * FROM boris_halls order by hall_name ASC") or die(mysql_error());
	if (mysql_num_rows($sel_se_halls)>0) {
		while ($ft_sel_se_halls=mysql_fetch_assoc($sel_se_halls)) {
			$hall_nm=$ft_sel_se_halls['hall_name'];
			$hall_id=$ft_sel_se_halls['hall_id'];
			echo "<option value='$hall_id'>$hall_nm</option>";
		}
	}else{
		echo "<option value=''>No hall</option>";
	}
}
//================================================================================== OK ORIENT STUDENTS IN HALL
if (isset($_GET['regSplan'])) {
	$cls_id=get_input("stCls");
	$st_hll=get_input("stHall");
	$upd_st_hll=mysql_query("UPDATE boris_students SET student_hall='$st_hll' WHERE student_class='$cls_id'")or die(mysql_error());
	if ($upd_st_hll) {
		echo "<span id='res_scc'>Oriented Successfully</span>";
		echo "<script type='text/javascript'>function hhidef(){gtId('res_scc').innerHTML='';}window.setTimeout(hhidef,1500);</script>";
//		echo "<script></script>";
	}else{
		echo "Failed...";
	}
}
//====================== Displaying Registed Students-Seating plan
if (isset($_GET['regDispSplan'])) {
	// $cls_id=get_input("stCls");
	// $st_hll=get_input("stHall");
	$sel_st_hl=mysql_query("SELECT * FROM boris_halls order by hall_name asc")or die(mysql_error());
	if (mysql_num_rows($sel_st_hl)>0) {
		$i=1;
		while ($ft_sel_st_hl=mysql_fetch_assoc($sel_st_hl)) {
			$h_id=$ft_sel_st_hl['hall_id'];
			$sel_hl_st=mysql_query("SELECT * FROM boris_students WHERE student_hall='$h_id'")or die(mysql_error());
			$cm_st_hl=mysql_num_rows($sel_hl_st);
			
			?>
			<tr>
				<td>
					<?php echo $i;?>
				</td>
				<td>
					<?php echo $ft_sel_st_hl['hall_name'];?>
				</td>
				<td>
					<?php echo $ft_sel_st_hl['hall_count'];?>
				</td>
				<td>
					<?php echo $cm_st_hl;?>
				</td>
				<td>
					<?php echo ($ft_sel_st_hl['hall_count']-$cm_st_hl);?>
				</td>
				<td>
					<?php 
					//echo $cm_cls_hl."-".sizeOf($cl_ft_nm);
					$sel_hl_cls=mysql_query("SELECT distinct student_class as fr,boris_students.student_class,boris_classes.class_name FROM boris_students,boris_classes WHERE boris_students.student_class=boris_classes.class_id AND student_hall='$h_id'")or die(mysql_error());
					if (mysql_num_rows($sel_hl_cls)>0) {
						$cnt=1;
						while ($ft_sel_hl_cls=mysql_fetch_assoc($sel_hl_cls)) {
							$cnm=$ft_sel_hl_cls['class_name']." ,";
							if ($cnt!=mysql_num_rows($sel_hl_cls)) {
								echo $cnm;
							}else{
								echo rtrim($cnm, ", ");
							}
							
							//echo $cnm." - ".mysql_num_rows($sel_hl_cls)." - ".$cnt;
							$cnt++;
						}
					}else{
						echo "-";
					}
					?>
				</td>
			</tr>
			<?php
			$i++;
		}
	}else{
		echo "-";
	}
}


//================================================================================================= CHECK STUDENT INDEX
if (isset($_GET['checkIndex'])) {
		$stdnt_index=get_input("stinx");


	$timetable=null;
	$finance=null;
	$attendance=null;
	$overall=null;


	$sel_st_ind=mysql_query("SELECT * FROM boris_students WHERE student_reg='$stdnt_index'")or die(mysql_error());
	if (mysql_num_rows($sel_st_ind)!=1) {
		echo "<script>gtId('resp').innerHTML='Invalid Index...'</script>";
		echo "<script type='text/javascript'>function hhidef(){gtId('resp').innerHTML='';}window.setTimeout(hhidef,1500);</script>";
	}else{
		$ft_sel_st_ind=mysql_fetch_assoc($sel_st_ind);
		$st_regg=$ft_sel_st_ind['student_reg'];
		$sel_all=mysql_query("SELECT boris_students.*,boris_classes.class_name,boris_classes.class_id,boris_department.dept_name FROM boris_students,boris_classes,boris_department WHERE boris_classes.class_id=boris_students.student_class AND boris_department.dept_id=boris_students.student_dept AND student_reg='$st_regg'")or die(mysql_error());
		$ft_sel_all=mysql_fetch_assoc($sel_all);
		$st_cls_id=$ft_sel_all['class_id'];

//======================================================================== CHECKING FINANCE  &   ATTENDANCE			(ASSINING)



		if ($ft_sel_all['student_finance']==1) {	//===============================FINANCE
			$finance=0;
		}else{
			$finance=1;
		}

		if ($ft_sel_all['student_attendance']==1) {	//===============================ATTENDANCE
			$attendance=0;
		}else{
			$attendance=1;
		}


//======================================================================== CHECKING TIME TABLE 			(ASSINING)


              	$sel_ttble=mysql_query("SELECT * FROM boris_ttable WHERE ttable_class='$st_cls_id' AND ((ttable_start<'$reg_date')AND(ttable_end>'$reg_date'))")or die(mysql_error());
              	if (mysql_num_rows($sel_ttble)>0) {
              		$timetable=1;
              		$ft_sel_ttble=mysql_fetch_assoc($sel_ttble);
              		echo "&nbsp;&nbsp;<span style='font-size:12px;font-weight:bolder;text-decoration:underline'>".substr($ft_sel_ttble['ttable_start'], 11,5)."&nbsp;&nbsp;-&nbsp;&nbsp;".substr($ft_sel_ttble['ttable_end'], 11,5)."</span>";
              	}else{
              		$timetable=0;
              		echo "<span style='color:red'>No</span>";
              	}



//==================================================================================================================================================
//=================================================================  OVERALL STATUS  ===============================================================
//==================================================================================================================================================
if (($timetable==1) AND ($finance==1) AND ($attendance==1)) {
	$overall=1;
}else{
	$overall=0;
}







		?>
    <table width="70%" style="float: right;margin-top: -20px;border:6px groove #99a59e;text-align: left;vertical-align: top;background-color: #3e4545">
      <tr>
        <td style="border-radius: 50%;border: #989a99 groove 6px; " colspan="2">
          <table style="margin-top: 0px margin-top: -20px;width: 100%;background-color: #515452">
            <tr style="background-color: #67706a">
              <td>
                <h1>Status:</h1>
              </td>
              <td colspan="3"><h1><?php
             if ($overall==1) {
             	echo "<span style='color:#12de14'>Yes</span>";
             }else{
             	echo "<span style='color:red'>No</span>";
             }
              	?></h1></td>
            </tr>
            <tr style="font-size: 20px">
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              Finance:</td>
              <td colspan="*"><?php
              if ($finance==1) {			// ==================  Zero for True   & 1 for false
              	echo "Yes";
              }else{
              	echo "<span style='color:red'>No</span>";
              }
              	?></td>

            </tr>
            <tr style="font-size: 20px">
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              Attendance:</td>
              <td colspan="*"><?php
              if ($attendance==1) {			// ==================  Zero for True   & 1 for false
              	echo "Yes";
              }else{
              	echo "<span style='color:red'>No</span>";
              }
              	?></td>

            </tr>
            <tr style="font-size: 20px">
             	 <td>
              		Time-table:
          		</td>
              <td>
              	<?php
              	$sel_ttble=mysql_query("SELECT * FROM boris_ttable WHERE ttable_class='$st_cls_id' AND ((ttable_start<'$reg_date')AND(ttable_end>'$reg_date'))")or die(mysql_error());
              	if (mysql_num_rows($sel_ttble)>0) {
              		$timetable=1;
              		$ft_sel_ttble=mysql_fetch_assoc($sel_ttble);
              		echo "&nbsp;&nbsp;<span style='font-size:12px;font-weight:bolder;text-decoration:underline'>".substr($ft_sel_ttble['ttable_start'], 11,5)."&nbsp;&nbsp;-&nbsp;&nbsp;".substr($ft_sel_ttble['ttable_end'], 11,5)."</span>";
              	}else{
              		$timetable=0;
              		echo "<span style='color:red'>No</span>";
              	}
              	?>
             </td>

            </tr>
            <tr style="font-size: 20px">
              <td>
              Hall:</td>
              <td colspan="*">
              	<?php
              	if ($timetable==1) {
              		$hall_id=$ft_sel_st_ind['student_hall'];
              		$sel_hname=mysql_query("SELECT hall_name FROM boris_halls WHERE hall_id='$hall_id'")or die(mysql_error());
              		echo mysql_fetch_assoc($sel_hname)['hall_name'];
              	}else{
              		echo "<span style='color:red'>-</span>";
              	}
              	?>
              </td>

            </tr>
            <tr style="font-size: 20px">
              <td>
              Course:</td>
              <td>
              	<?php
              	$sel_ttble_crs=mysql_query("SELECT boris_ttable.*,boris_courses.course_name FROM boris_ttable,boris_courses WHERE ttable_class='$st_cls_id' AND ((ttable_start<'$reg_date')AND(ttable_end>'$reg_date')) AND boris_ttable.ttable_course=boris_courses.course_id")or die(mysql_error());
              	if (mysql_num_rows($sel_ttble_crs)>0) {
              		$ft_sel_ttble_crs=mysql_fetch_assoc($sel_ttble_crs);
              		echo $ft_sel_ttble_crs['course_name'];
              	}else{
              		echo "<span style='color:red'>-</span>";
              	}
              	?>
              </td>
              <td>
              	
              </td>

            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <table style="margin-top: 0px;width: 100%">
            <tr>
              <td colspan="1">
                <h5>Index:</h5>
              </td>
              <td colspan="3">
              	<?php
              	echo $ft_sel_st_ind['student_reg'];
              	?>
              </td>
            </tr>
            <tr>
              <td colspan="1">
                <h5>Names:</h5>
              </td>
              <td colspan="3">
              	<?php
              	echo strtoupper($ft_sel_st_ind['student_fname'])." ".ucfirst($ft_sel_st_ind['student_lname']);
              	?>
              </td>
            </tr>
            <tr>
              <td colspan="1">
                <h5>Class:</h5>
              </td>
              <td colspan="3">
              	<?php
              	echo $ft_sel_all['class_name'];
              	?>
              </td>
            </tr>
            <tr>
              <td colspan="1">
                <h5>Dept:</h5>
              </td>
              <td colspan="3">
              	<?php
              	echo $ft_sel_all['dept_name'];
              	?>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
		<?php
	}
}



//================================================================================= ADMIN LOGIN
if (isset($_GET['admLogin'])) {
	$email=get_input("email");
	$pass=get_input("pass");
	$r_email=base64_encode($email);
	$r_pass=base64_encode($pass);
	$login=mysql_query("SELECT * FROM boris_admin WHERE admin_email='$r_email' AND admin_password='$r_pass'")or die(mysql_errno());
	if (mysql_num_rows($login)==1) {
		echo "<span id='res_scc'> Login Successful. Redirecting ...</span>";
		$_SESSION['admin']=$email;
		echo "<script type='text/javascript'>window.location='index.php';</script>";
	}else{
		echo "<span id='resp'> Invalid email or password ...</span>";
		echo "<script type='text/javascript'>function hhidef(){gtId('resp').innerHTML='';}window.setTimeout(hhidef,1500);</script>";
	}

}

//====================================================================================== RESET TTabale
if (isset($_GET['resetTTable'])) {
	$reset_stable=mysql_query("DELETE FROM boris_ttable")or die(mysql_error());
	if ($reset_stable) {
		echo "<script type='text/javascript'>function hhidef(){window.location.reload(true);}window.setTimeout(hhidef,1500);</script>";
	}
}

//====================================================================================== RESET SPlan
if (isset($_GET['resetSPlan'])) {
	$reset_splan=mysql_query("UPDATE boris_students SET student_hall=null WHERE student_hall!=0")or die(mysql_error());
	if ($reset_splan) {
		echo "<script type='text/javascript'>window.location.reload(true);</script>";
	}
}
?>