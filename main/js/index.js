 //.........................................................isEmpty().......................................
function isEmpty(vval){
	if (vval=="") {
		return true;
	}else{
		return false;
	}
}
 //---document.getElementById
 function gtId(id){
 	return document.getElementById(id);
 }
 //---document.getElementById.value
  function gtIdVal(id){
 	return document.getElementById(id).value;
 }


 //=========================================================================================================REGISTRATION
//===========================================================================================================================


 //-------------------------------------------- REGISTER DEPARTMENT
function regDept() {
	let deptNme=gtIdVal("dept_nm");
	let deptAbrev=gtIdVal("dept_abr");
	let regDept=true;
	if (isEmpty(deptAbrev) || isEmpty(deptNme)) {
		gtId("resp").innerHTML="Fill all Forms";
	}else{
		$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{regDept:regDept,deptNme:deptNme,deptAbrev:deptAbrev},cache:false,success:function(res){$("#resp").html(res);}
		});	
	}
}
 //-------------------------------------------- REGISTER CLASS
function regClss(){
	let clLvl=gtIdVal("cls_lvl");
	let clDpt=gtIdVal("cls_dpt");
	let clNt=gtIdVal("cls_nt");
	let regClss = true;
	//let clsDptAbr=gtIdVal("cls_d_abr");
	let clsNwLvl;
	if (isEmpty(clLvl) || isEmpty(clDpt)) {
		gtId("resp").innerHTML="Fill all forms ...";
		}else{
			switch (clLvl){
				case'I':
					clsNwLvl=1;
				break;
				case'II':
					clsNwLvl=2;
				break;
				case'III':
					clsNwLvl=3;
				break;
				default:
					clsNwLvl=false;
					break;
			}
	let ClsFllNme=clsNwLvl+" "+clDpt+" "+clNt;
	// gtId("resp").innerHTML=ClsFllNme;
	$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{regClss:regClss,ClsFllNme:ClsFllNme,clDpt:clDpt,clLvl:clLvl},cache:false,success:function(res){$("#resp").html(res);}
		});	

		}
}

//------------------------------------------------REGISTERING COURSES------------------------------
function regCrs(){
	let crsCls=gtIdVal("crs_cls");
	let crsNme=gtIdVal("crs_nme");
	let regCrs=true;
	if (!isEmpty(crsCls) && !isEmpty(crsNme)) {
		$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{regCrs:regCrs,crsCls:crsCls,crsNme:crsNme},cache:false,success:function(res){$("#resp").html(res);}
		});
	}else{
		gtId("resp").innerHTML="Fill all Forms...";
	}
}

//-------------------------------------------------REGISTER STUDENT---------------------------------------
function regStdnt(){
	let stFName=gtIdVal("st_fnm");
	let stLName=gtIdVal("st_lnm");
	let stCls=gtIdVal("st_cls");
	let regStdnt = true;
	if (!isEmpty(stFName) && !isEmpty(stLName) && !isEmpty(stCls)) {
		$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{regStdnt:regStdnt,stFName:stFName,stLName:stLName,stCls:stCls},cache:false,success:function(res){$("#resp").html(res);}
		});
	}else{
		gtId("resp").innerHTML="Fill All Fields...";
	}
}

//-------------------------------------------------REGISTER HALL---------------------------------------
function regHalls(){
	let hllName=gtIdVal("hll_nm");
	let hllRows=gtIdVal("hll_rws");
	let hllCols=gtIdVal("hll_cls");
	let regHalls = true;
	if (!isEmpty(hllName) && !isEmpty(hllRows) && !isEmpty(hllCols)) {
		$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{regHalls:regHalls,hllName:hllName,hllRows:hllRows,hllCols:hllCols},cache:false,success:function(res){$("#resp").html(res);}
		});
	}else{
		gtId("resp").innerHTML="Fill All Fields...";
	}
}

 //=========================================================================================================MANAGE
//===========================================================================================================================

//----------------------------------------------------------------------MANAGE ATTENDANCE------------
//----------------------------------------------------------ON SELECT CLASS
function viewManageClsAtt(){
	let clsNm=gtIdVal("sel_cls");
	let viewManageClsAtt = true;
	$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{viewManageClsAtt:viewManageClsAtt,clsNm:clsNm},cache:false,success:function(res){$("#tbl_resp").html(res);}
		});

}
//------------------------------------------------------------------CHECKBOX ON EXCLUDE
//----------------------CHECKED
function stChdAtt(stId){
	//alert("CHECKED "+stId);
	let spaId="#res_chk"+stId;
	let stChdAtt = true;
	//alert("\""+spaId+"\"");
	$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{stChdAtt:stChdAtt,stId:stId},cache:false,success:function(res){$("").html(res);}
		});

}
//----------------------UNCHECKED
function stUnchdAtt(stId){
	//alert("CHECKED "+stId);
	let spaId="#res_chk"+stId;
	let stUnchdAtt = true;
	//alert("\""+spaId+"\"");
	$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{stUnchdAtt:stUnchdAtt,stId:stId},cache:false,success:function(res){$("").html(res);}
		});
}


//----------------------------------------------------------------------MANAGE FINANCE------------
//----------------------------------------------------------ON SELECT CLASS
function viewManageClsFinc(){
	let clsNm=gtIdVal("sel_cls");
	let viewManageClsFinc = true;
	$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{viewManageClsFinc:viewManageClsFinc,clsNm:clsNm},cache:false,success:function(res){$("#tbl_resp").html(res);}
		});

}
//------------------------------------------------------------------CHECKBOX ON EXCLUDE
//----------------------CHECKED
function stChdFinc(stId){
	//alert("CHECKED "+stId);
	let spaId="#res_chk"+stId;
	let stChdFinc = true;
	//alert("\""+spaId+"\"");
	$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{stChdFinc:stChdFinc,stId:stId},cache:false,success:function(res){$("").html(res);}
		});

}
//----------------------UNCHECKED
function stUnchdFinc(stId){
	//alert("CHECKED "+stId);
	let spaId="#res_chk"+stId;
	let stUnchdFinc = true;
	//alert("\""+spaId+"\"");
	$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{stUnchdFinc:stUnchdFinc,stId:stId},cache:false,success:function(res){$("").html(res);}
		});
}

//====================================================================== ON CHECK CLASS == TIMETABLE
function chckClassExm(){
	let clsId=gtIdVal("sel_cls");
	let chckClassExm = true;
	let chcCrsTtble = true;
	$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{chckClassExm:chckClassExm,clsId:clsId},cache:false,success:function(res){$("#chckCrs").html(res);}
		});
//===============DISPLAYING AVAILABLE TTABLES
	$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{chcCrsTtble:chcCrsTtble,clsId:clsId},cache:false,success:function(res){$("#resp_tCrss").html(res);}
		});
}
//========================================================================== REGISTER TIME-TABLE
function regTTble(){
	let ttbCls=gtIdVal("sel_cls");
	let ttbCrs=gtIdVal("chckCrs");
	let ttbDay=gtIdVal("chckDay");
	let ttbTime=gtIdVal("chckTime");
	let ttbEndTime=gtIdVal("chckEndTime");
	let regTTble = true;
	if (isEmpty(ttbCls)||isEmpty(ttbCrs)||isEmpty(ttbDay)||isEmpty(ttbTime)||isEmpty(ttbEndTime)) {
		gtId("resp").innerHTML="Fill all forms...";
	}else{
		$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{regTTble:regTTble,ttbCls:ttbCls,ttbCrs:ttbCrs,ttbDay:ttbDay,ttbTime:ttbTime,ttbEndTime:ttbEndTime},cache:false,success:function(res){$("#resp").html(res);}
		});
	}
	// alert(ttbCls+" - "+ttbCrs+" - "+ttbDay+" - "+ttbTime+" - "+ttbEndTime);
}

//================================================================================= ON CHECK ORIENT STUDENT IN HALL

function orStClssHall(){
	let stCls=gtIdVal("sel_cls");
	let orStClssHall = true;
	$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{orStClssHall:orStClssHall,stCls:stCls},cache:false,success:function(res){$("#chckHlls").html(res);}
		});
}

//================================================================================== OK ORIENT STUDENTS IN HALL
function regDispSplan(){		//====================display halls
		let regDispSplan = true;
		$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{regDispSplan:regDispSplan},cache:false,success:function(res){$("#resp_tb_hlls").html(res);}
		});
}
function regSplan(){
	let stCls = gtIdVal("sel_cls");
	let stHall = gtIdVal("chckHlls");
	let regSplan = true;
	let regDispSplan = true;
	if (isEmpty(stCls) || isEmpty(stHall)) {
		gtId("resp").innerHTML="Fill all Forms";
	}else{
		$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{regSplan:regSplan,stCls:stCls,stHall:stHall},cache:false,success:function(res){$("#resp").html(res);}
		});

		//====================== Displaying Registed Students-Seating plan
		$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{regDispSplan:regDispSplan},cache:false,success:function(res){$("#resp_tb_hlls").html(res);}
		});
	}
}

//================================================================================================= CHECK STUDENT INDEX
function checkIndex(){
	let stinx=gtIdVal("StIndex");
	if (!isEmpty(stinx)) {
		let checkIndex = true;
		$.ajax({url:"main/ajax/index.php",
		type:"GET",data:{checkIndex:checkIndex,stinx:stinx},cache:false,success:function(res){$("#respChck").html(res);}
		});
	}else{
		gtId("resp").innerHTML="Fill all Forms...";
		function sdRdf(){
			gtId("resp").innerHTML="";
			}
	window.setTimeout(sdRdf,2000);
	}
}


//======================================================  ADMIN LOGIN

function admLogin(){
	let email = gtIdVal("materialLoginFormEmail");
	let pass = gtIdVal("materialLoginFormPassword");
	let admLogin = true;
	if (!isEmpty(email) && !isEmpty(pass)) {
		$.ajax({url:"main/ajax/index.php",
		type:"GET",data:{admLogin:admLogin,email:email,pass:pass},cache:false,success:function(res){$("#resp").html(res);}
		});
	}else{
		gtId("resp").innerHTML="Fill all forms...";
		function hhidef(){gtId("resp").innerHTML="";}window.setTimeout(hhidef,1500);
	}
}


//====================================================================================== RESET SPlan
function resetTTable(){
	let resetTTable = true;
	$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{resetTTable:resetTTable},cache:false,success:function(res){$("#resp").html(res);}
		});
}
//====================================================================================== RESET TTable
function resetSPlan(){
	let resetSPlan = true;
	$.ajax({url:"../main/ajax/index.php",
		type:"GET",data:{resetSPlan:resetSPlan},cache:false,success:function(res){$("#resp").html(res);}
		});
}
