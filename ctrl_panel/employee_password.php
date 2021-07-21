<!DOCTYPE html>

<html lang="en">



<?php

include_once("include/header_top.php");

?>

<body class="hold-transition sidebar-mini">

<!--preloader-->

<div id="preloader">

<div id="status"></div>

</div>

<!-- Site wrapper -->

<div class="wrapper">

<?php

include_once("include/header_down.php");

?>       

<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->

<?php

include_once("include/menu.php");

if($_POST[call_submit]!=""){
$employee_row=$my->total_row($con,employee,employee_code,$_POST[employee_code]);

$nurl="employee_password.php?lid=$_REQUEST[lid]&";
if($employee_row[employee_id]!=""){

$pwd=md5($_POST[employee_newpwd]);
$my->normal_UPDATE1($con,employee,employee_pwd,$pwd,employee_id,$employee_row[employee_id]);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'?msg=Password change successfully">';		 
}else{
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'?msg=Employee Id is not Valid&">';		 
}
}

?>



<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

<!-- Content Header (Page header) -->

<section class="content-header">

<div class="header-icon"><i class="fa fa-user-o"></i>

</div>

<div class="header-title">

<h1>Employee</h1>

<small>Password</small>

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



<i class="fa fa-list"></i> Password

</div>

</div>



<script type="text/javascript">

function validate_form(form){

if( form.elements['employee_name'].value=="" ) { alert("Please type correct Employees Id"); form.elements['employee_code'].focus(); return false; }  

if( form.elements['employee_newpwd'].value=="" ) { alert("Please type Password "); form.elements['employee_newpwd'].focus(); return false; }

if( form.elements['employee_newpwd'].value!="" ){ 

var pas=form.elements['employee_newpwd'].value;var len=pas.length;

if(len<5){alert("New Password strength minimum five."); form.elements['employee_newpwd'].focus(); return false;}}

if( form.elements['employee_confnewpwd'].value=="" ) { alert("Please type Confirm Password"); form.elements['employee_confnewpwd'].focus(); return false; }

if(form.elements['employee_confnewpwd'].value!=""){

var a1 =form.elements['employee_newpwd'].value;

var a2 =form.elements['employee_confnewpwd'].value;

if(a1!=a2){

alert("Please type Correct Confirm Password"); form.elements['employee_confnewpwd'].focus(); return false;

}

}

}

</script>





<div class="panel-body">

<form class="col-sm-6" action="" method="post" name="newform" onsubmit="return validate_form(this);" >







<center>

<?php

$msg=$_REQUEST[msg];

if($_REQUEST[msg])

echo "<p><span style='color:brown;font-size:14px;font-weight:bold'>$msg</span></p>";

?>

</center>



<div class="form-group">

<label>Employee ID</label>

<input type="text" class="form-control" name="employee_code" id="employee_code"  onkeyup="return ajax2()" placeholder="Enter Employee ID" required>

</div>

<div class="form-group">

<label>Employee Name</label>

<input type="text" class="form-control" name="employee_name" id="employee_name"  placeholder="Employee Name" readonly >

</div>





<div class="form-group">

<label>New Password</label>

<input type="password" class="form-control" name="employee_newpwd" id="employee_newpwd"   required>

</div>



<div class="form-group">

<label>Confirm New Password</label>

<input type="password" class="form-control" name="employee_confnewpwd" id="employee_confnewpwd"   required>

</div>





<div class="form-group">



<input type="hidden" name="st" value="1" />

<input type="hidden" name="user_id" value="<?=$_SESSION['employee_id']?>" />

<input type="hidden" name="entry_date" value='<?=$today_date?>' />

<input type="hidden" name="entry_time" value='<?=$create_date?>' />



<input type="submit" name="call_submit" class="btn btn-success"  value="Reset" />

<input type="reset" value="Exit" class="btn btn-warning" />

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