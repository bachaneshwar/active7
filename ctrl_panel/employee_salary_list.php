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

<h1>Employee</h1>

<small>Salary List</small>

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



<i class="fa fa-list"></i> Salary List

</div>

</div>



<script type="text/javascript">

function validate_form(form){

if( form.elements['endt'].value=="" ) { alert("Please select Salary Month"); form.elements['endt'].focus(); return false; }  

}

</script>



<div class="panel-body">



<form class="col-sm-6" action="employee_all_salary.php?lid=<?=$dtls_link[sublink_id]?>" method="post" name="newform" onsubmit="return validate_form(this);" >



<div class="form-group">

<label>Salary Month</label>

<select class="form-control" name="endt" id="endt" required>

<option value="">Select Month</option>

<?

$sql="SELECT * FROM `employee_salary` GROUP BY `endt` ORDER BY `endt` DESC";

$res=mysqli_query($con,$sql);

while($row=mysqli_fetch_array($res)){



$todaydt=explode("-",$row[endt]);

$presentyr=$todaydt[0];

$dtls_mon=$my->total_row($con,month_list,month_id,$todaydt[1]);



?>

<option value="<?=$row[endt]?>"><?=$dtls_mon[month_name]?> - <?=$presentyr?></option>

<?}?>

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