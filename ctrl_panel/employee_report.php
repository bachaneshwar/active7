<!DOCTYPE html>

<html lang="en">



<?php

include_once("include/header_top.php");

?>

<body class="hold-transition sidebar-mini">

<!--preloader-->



<!-- Site wrapper -->

<div class="wrapper">

<?php

include_once("include/header_down.php");



?>       



<style>

#output_image

{

	width:2.5in;

	heiht:3.5in;

	border:1px solid black;

}

</style>



<script type="text/javascript">



function planchq1(){

var a=document.newform.emp_search.value;

if(a=='1'){

document.getElementById("div1").style.display="";

document.getElementById("div2").style.display="";

}

else if(a=="2"){

document.getElementById("div1").style.display="none";

document.getElementById("div2").style.display="none";

}

else if(a==""){

document.getElementById("div1").style.display="none";

document.getElementById("div2").style.display="none";

}

}

</script>	







<script type="text/javascript">

function validate_form(form){

if( form.elements['emp_search'].value=="" ) { alert("Please choose Search Section"); form.elements['emp_search'].focus(); return false; } 

if( form.elements['emp_search'].value=="1" ) {

if( form.elements['employee_code'].value=="" ) { alert("Please type Employee Id"); form.elements['employee_code'].focus(); return false; }  

if( form.elements['employee_name'].value=="" ) { alert("Please type Correct Employee"); form.elements['employee_code'].focus(); return false; } 

}

}

</script>	

<script language="javascript" type="text/javascript" src="ajax1.js"></script>                 
<script language="javascript" type="text/javascript" src="newajax.js"></script>       



<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->

<?php

include_once("include/menu.php");

?>



<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

<!-- Content Header (Page header) -->

<section class="content-header">

<div class="header-icon"><i class="fa fa-user-o"></i>



</div>

<div class="header-title">

<h1>Report</h1>

<small>Employee Report</small>

</div>

</section>

<!-- Main content -->

<section class="content">

<div class="row">

<!-- Form controls -->

<div class="col-sm-12">

<div class="panel panel-bd lobidrag">



<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">

<div class="btn-group" id="buttonlist"> 

<i class="fa fa-list"></i>  Employee Report 

</div>

</div>







<div class="panel-body">





<form class="col-sm-6" action="employee_report_dtls.php?lid=<?=$dtls_link[sublink_id]?>" method="post" name="newform" onsubmit="return validate_form(this);" >





<div class="form-group">

<label>Employee Search</label>



<select class="form-control" name='emp_search' id='emp_search' onchange="planchq1();" required >

<option value="">Search</option>

<option value="1">By Employee Id</option>

<option value="2">By All Employee</option>

</select>

</div> 



<div class="form-group" id="div1" style="display:none">

<label>Employee ID</label>

<input type="text" class="form-control" name="employee_code" id="employee_code"  onkeyup="return ajax2()" placeholder="Enter Employee ID" >

</div>

<div class="form-group" id="div2" style="display:none">

<label>Employee Name</label>

<input type="text" class="form-control" name="employee_name" id="employee_name"  placeholder="Employee Name" readonly >

</div>





<div class="form-group">



<input type="hidden" name="st" value="1" />

<input type="hidden" name="user_id" value="<?=$_SESSION['employee_id']?>" />

<input type="hidden" name="entry_date" value='<?=$today_date?>' />

<input type="hidden" name="entry_time" value='<?=$create_date?>' />



<input type="submit" name="call_submit" class="btn btn-success"  value="Submit" />



</div>











</form>



</div>









</div>

</div>

</div>

</section>

<!-- /.content -->

</div>

<!-- /.content-wrapper -->

<?php

include_once("include/footer_top.php");

?>

</div>

<!-- /.wrapper -->

<!-- Start Core Plugins

=====================================================================-->

<?php

include_once("include/footer_down.php");

?>



</body>



</html>