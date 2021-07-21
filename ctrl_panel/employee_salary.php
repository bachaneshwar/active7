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







?>



<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

<!-- Content Header (Page header) -->

<section class="content-header">

<div class="header-icon">



</div>

<div class="header-title">

<h1>Accounts</h1>

<small>Employee Salary Generation</small>

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



<i class="fa fa-list"></i> Employee Salary Generation

</div>

</div>

<div class="panel-body">



<script type="text/javascript">

function validate_form(form){

if( form.elements['month_id'].value=="" ) { alert("Please Select Month"); form.elements['month_id'].focus(); return false; } 

}

</script>



<form class="col-sm-6" action="employee_salary_gen.php?lid=<?=$dtls_link[sublink_id]?>" method="post" name="newform" onsubmit="return validate_form(this);" >



<?

$sql_f_pair="SELECT * FROM `employee_salary` GROUP BY `endt` ORDER BY `endt` DESC";

$res_f_pair=mysqli_query($con,$sql_f_pair);

$num_f_pair=mysqli_num_rows($res_f_pair);

if($num_f_pair==0){





$todaydt=explode("-",$today_date);

$presentyr=$todaydt[0];

$prevyr=($presentyr-1);

?>



<div class="form-group">

<label>Month</label>

<select class="form-control" name="month_id" id="month_id" required>

<option value="">Select Month</option>

<?

$month_det=$my->all_row($con,month_list);

foreach($month_det as $k=>$v){

?>

<option value="<?=$v[month_id]?>"><?=$v[month_name]?></option>

<?}?>

</select>

</div>



<div class="form-group">

<label> Year</label>

<select class="form-control" name="year" required>

<option value="<?=$prevyr?>"><?=$prevyr?></option>

<option value="<?=$presentyr?>" selected><?=$presentyr?></option>

</select>

</div>



<? 

} else {

$row_f_pair=mysqli_fetch_array($res_f_pair);

$find_date=date("Y-m-d",strtotime(date("Y-m-d", strtotime($row_f_pair[endt])) . " +1 day"));



$todaydt=explode("-",$find_date);

$presentyr=$todaydt[0];

?>





<div class="form-group">

<label>Month</label>

<select class="form-control" name="month_id" id="month_id" required>

<option value="">Select Month</option>

<?

$month_det=$my->check_all($con,month_list,month_id,$todaydt[1]);

foreach($month_det as $k=>$v){

?>

<option value="<?=$v[month_id]?>"><?=$v[month_name]?></option>

<?}?>

</select>

</div>



<div class="form-group">

<label> Year</label>

<select class="form-control" name="year" required>

<option value="<?=$presentyr?>"><?=$presentyr?></option>

</select>

</div>



<? } ?>







<div class="form-group">

<input type="hidden" name="st" value="1" />

<input type="hidden" name="user_id" value="<?=$_SESSION['employee_id']?>" />

<input type="hidden" name="entry_date" value='<?=$today_date?>' />

<input type="hidden" name="entry_time" value='<?=$create_date?>' />



<input type="submit" name="call_submit" class="btn btn-success"  value="Submit" />

<input type="reset" name="call_submit" class="btn btn-warning"  value="Exit" />

</div>





<center>

<?php

$msg=$_REQUEST[msg];

if($_REQUEST[msg])

echo "<p><span style='color:brown;font-size:14px;font-weight:bold'>$msg</span></p>";

?>

</center>







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