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



$todaydt=explode("-",$today_date);

$presentyr=$todaydt[0];

$prevyr=($presentyr-1);

$futureyr=($presentyr+1);

?>



<script type="text/javascript">

function validate_form(form){

if( form.elements['employee_code'].value=="" ) { alert("Please type Employee ID."); form.elements['employee_code'].focus(); return false; }

if( form.elements['employee_name'].value=="" ) { alert("Please type correct Employee ID."); form.elements['employee_code'].focus(); return false; } 

}

</script>



<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

<!-- Content Header (Page header) -->

<section class="content-header">

<div class="header-icon">



</div>

<div class="header-title">

<h1>Employee</h1>

<small>Employee TDS</small>

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

<i class="fa fa-list"></i>  Employee TDS 

</div>

</div>



<div class="panel-body">

<form class="col-sm-6" name="newform" method="post" action="employee_tds_certificate.php?lid=<?=$dtls_link[sublink_id]?>" onsubmit="return validate_form(this);" >



<div class="form-group">

<label>Employee ID</label>

<input type="text" class="form-control" name="employee_code" id="employee_code"  onkeyup="return ajax2()" placeholder="Enter Employee ID" required>

</div>



<div class="form-group">

<label>Employee Name</label>

<input type="text" class="form-control" name="employee_name" id="employee_name"  placeholder="Employee Name" readonly >

</div>



<div class="form-group">

<label>Period</label>

<select class="form-control" name="period" required>

<option value="">Select Period</option>

<option value="1">1St Quarter - April to June</option>

<option value="2">2ND Quarter - July to September</option>

<option value="3">3RD Quarter - October to December</option>

<option value="4">4TH Quarter - Jan to March</option>

</select>

</div>





<div class="form-group">

<label> Year</label>

<select class="form-control" name="year" required>

<option value="<?=$prevyr?>"><?=$prevyr?>-<?=$presentyr?></option>

<option value="<?=$presentyr?>" selected><?=$presentyr?>-<?=$futureyr?></option>

</select>

</div>





<div class="form-group">



<input type="hidden" name="st" value="1" />

<input type="hidden" name="user_id" value="<?=$_SESSION['employee_id']?>" />

<input type="hidden" name="entry_date" value='<?=$today_date?>' />

<input type="hidden" name="entry_time" value='<?=$create_date?>' />



<input type="submit" name="call_submit" class="btn btn-success"  value="Submit" />

<input type="reset" name="call_submit" class="btn btn-warning"  value="Exit" />



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