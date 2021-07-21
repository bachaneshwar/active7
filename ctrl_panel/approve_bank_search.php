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
<div class="header-icon"><i class="fa fa-shopping-basket"></i></div>
<div class="header-title">
<h1>Withdrawal</h1>
<small>Approve Withdrawal Details</small>
</div>
</section>	

<script type="text/javascript">
function validate_form(form){
if( form.elements['start_date'].value=="" ) { alert("Please type Start Date"); form.elements['start_date'].focus(); return false; } 
if( form.elements['end_date'].value=="" ) { alert("Please type End Date"); form.elements['end_date'].focus(); return false; } 
}
</script>	


<!-- Main content -->
<section class="content">
<div class="row">
<!-- Form controls -->
<div class="col-sm-12">
<div class="panel panel-bd lobidrag">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="btn-group" id="buttonlist"> 

<i class="fa fa-list"></i> Search By Date
</div>
</div>
<div class="panel-body">
<form class="col-sm-6" action="datewise_approve_details3.php" method="post" name="newform" onsubmit="return validate_form(this);" >
<div class="form-group">
<label>Start Date</label>
<input type="text" name="start_date"  id="start_date" value='' class="form-control" size="20" readonly  />
<span id="cal3">&nbsp;<img src="calendar.jpg" style="cursor:pointer;" border="0" /></span>
<script type="text/javascript">
var cal = new Zapatec.Calendar.setup({

inputField:"start_date",
ifFormat:"%Y-%m-%d",
button:"cal3",
showsTime:false

});

</script>


</div>
<div class="form-group">
<label>End Date</label>
<input type="text" name="end_date"  id="end_date" value='' class="form-control" size="20" readonly  />
<span id="cal4">&nbsp;<img src="calendar.jpg" style="cursor:pointer;" border="0" /></span>
<script type="text/javascript">
var cal1 = new Zapatec.Calendar.setup({

inputField:"end_date",
ifFormat:"%Y-%m-%d",
button:"cal4",
showsTime:false

});

</script>


</div>


<div class="form-group">
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