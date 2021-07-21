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





<script type="text/javascript">

function validate_form(form){

if( form.elements['employee_mobile'].value=="" ) { alert("Please type Mobile Number."); form.elements['employee_mobile'].focus(); return false; }

if( form.elements['employee_mobile'].value!="" ) {

var number = form.elements['employee_mobile'].value;

var number1=number.length;

if(number1!=10){alert("Please type valid Number"); form.elements['employee_mobile'].focus(); return false; }

}

var num = parseInt(form.elements['mobile_chk'].value);

if(num==0){alert("This Mobile Number is not available"); form.elements['employee_mobile'].focus(); return false;}

}

</script>



<script language="javascript" type="text/javascript" src="ajax1.js"></script>
<script language="javascript" type="text/javascript" src="newajax.js"></script>



<script type="text/javascript">

function preview_image(event)

{

 var reader = new FileReader();

 reader.onload = function()

 {

  var output = document.getElementById('output_image');

  output.src = reader.result;

 }

 reader.readAsDataURL(event.target.files[0]);

}

</script>

<style>

#output_image

{

	width:2.5in;

	heiht:3.5in;

	border:1px solid black;

}

</style>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

<!-- Content Header (Page header) -->

<section class="content-header">

<div class="header-icon"><i class="fa fa-user-o"></i>

</div>

<div class="header-title">

<h1>Reward Report</h1>

<small>Reward Report</small>

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

<i class="fa fa-list"></i> Invoice Report

</div>

</div>





<div class="panel-body">



<center>

<?php

$msg=$_REQUEST[msg];

$id = $_REQUEST[id];

$emp_sel = "select * from `employee` where `employee_id` = $id";

$employeec = mysqli_fetch_array(mysqli_query($con,$emp_sel));

$emp_id = $employeec[employee_code];

if($_REQUEST[msg]){?>

<style>

.w3-modal {

    z-index: 3;

    padding-top: 100px;

    position: fixed;

    left: 0;

    top: 0;

    width: 100%;

    height: 100%;

    overflow: auto;

    background-color: rgb(0,0,0);

    background-color: rgba(0,0,0,0.4);</style>

	<script type="text/javascript">

         <!--

            function Redirect() {

               window.location="add_employee.php?lid=1";

            }

         //-->

      </script>


<?php

}

?>

</center>


<?php

$msg=$_REQUEST[msg];

echo "<center><font color=\"#ff0066\" size=\"5\">".$msg."</font></center>";



?>



<script type="text/javascript">
function validate_form(form){
if( form.elements['start_date'].value=="" ) { alert("Please type Start Date"); form.elements['start_date'].focus(); return false; }
if( form.elements['end_date'].value=="" ) { alert("Please type End Date"); form.elements['end_date'].focus(); return false; }
}
</script>

<form action="action_reward_member.php?link=<?=$_GET['link']?>" method="post" onsubmit="return validate_form(this);">
<!-- approve_production_action.php -->

<div class="form-group">
<label for="exampleName">Start Date</label>
<input type="text" name="start_date"  id="start_date" value='' class="form-control" style="width:400px" readonly  />
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
<label for="exampleName">End Date</label>
<input type="text" name="end_date"  id="end_date" value='' class="form-control" style="width:400px"  readonly  />
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




<input type="submit"  name="transfer_submit" value="Submit" class="btn btn-cap m-r-5" />

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
