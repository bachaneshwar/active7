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

<h1>Employee</h1>

<small>Employee Master</small>

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

<i class="fa fa-list"></i>  Employee Master 

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





<form class="col-sm-6" action="add_employee_check.php?lid=<?=$_REQUEST[lid]?>" method="post" name="newform" onsubmit="return validate_form(this);" enctype="multipart/form-data">

<div class="form-group">

<label>Employee Name</label>

<input type="text" class="form-control" name="employee_name" required>




</div>


<div class="form-group">

<label>Password</label>




<input type="text" class="form-control" name="employee_pwd" value="" required>

</div>

<div class="form-group">

<label>Father's Name</label>

<input type="text" class="form-control"  name="employee_father">

</div>

<div class="form-group">

<label>Designation</label>

<select class="form-control" name="designation_id" id="designation_id">

<option value="">Select Designation</option>

<?

$designation_det=$my->check_all_asc($con,designation,st,1,designation_id);

foreach($designation_det as $k1=>$v1){

?>

<option value="<?=$v1[designation_id]?>" ><?=$v1[designation_name]?></option>

<?}?>

</select>

</div>

<div class="form-group">

<label>Sex</label><br>

<label class="radio-inline"><input name="employee_sex" value="MALE" checked="checked" type="radio">MALE</label> 

<label class="radio-inline"><input name="employee_sex" value="FEMALE" type="radio">FEMALE</label>

</div>

<div class="form-group">

<label>Date of Birth</label>

<input type="date" name="employee_dob"  id="dob" value='' class="form-control" size="20" placeholder="DD.MM.YYYY"  />





</div>





<div class="form-group">

<label>Mobile</label>

<input type="number" class="form-control"  name="employee_mobile" id="mobile_no"  maxlength="10" onkeyup="return mobile_check();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"required>

</div>



<!-- here-->

<input type="hidden"  name="mobile_chk" id="mobile_chk" value="0" readonly >





<div class="form-group">

<label>Email</label>

<input type="email" class="form-control" style='text-transform:lowercase'  name="employee_email">

</div>



<div class="form-group">

<label>Address</label>

<textarea class="form-control" rows="3" name="employee_address"></textarea>

</div>



<div class="form-group">

<label>Pin Code</label>

<input type="number" class="form-control" name="employee_pincode" maxlength="6" onkeypress="return keyRestrict(event, '1234567890')">

</div>



<div class="form-group">

<label>Land Mark</label>

<input type="text" class="form-control" name="employee_landmark"  >

</div>



<div class="form-group">

<label>Police Station </label>

<input type="text" class="form-control" name="employee_ps"  >

</div>



<div class="form-group">

<label>Post Office</label>

<input type="text" class="form-control" name="employee_po"  >

</div>



<div class="form-group">

<label>Bank Name</label>

<select class="form-control" name="bank_id" id="bank_id" style='font-size:14px;width:350px'>

<option value="">Select Bank</option>

<?

$bank_det=$my->check_all_asc($con,bank,st,1,bank_name);

foreach($bank_det as $k1=>$v1){

?>

<option value="<?=$v1[bank_id]?>" <? if($v1[bank_id]==$value_det[bank_id]) {?> Selected <?}?>><?=$v1[bank_name]?></option>

<?}?>

</select>

</div>

<div class="form-group">

<label>Branch</label>

<input type="text" class="form-control" name="bank_branch">

</div>

<div class="form-group">

<label>Account No.</label>

<input type="text" class="form-control" name="bank_accno">

</div>

<div class="form-group">

<label>IFSC</label>

<input type="text" class="form-control" name="bank_ifsc">

</div>

<div class="form-group">

<label>Salary (Annually)</label>

<input type="text" class="form-control" name="employee_salary" onkeypress="return keyRestrict(event, '1234567890')" >

</div>

<div class="form-group">

<label>PAN</label>

<input type="text" class="form-control" name="employee_pan" maxlength="10">

</div>




<!--
<div class="form-group">
<label>Image upload</label>
<input type="file" accept="image/*" name="employee_picture" onchange="preview_image(event)" >
<br>
<br>
<img id="output_image" src="">
</div>



<div class="form-group">
<label>Upload Document</label>
<input type="file" accept="image/*" name="employee_biometric" >
</div>
-->


<div class="form-group">

<label>Remarks</label>

<textarea class="form-control" name="remarks" rows="3" ></textarea>

</div>



<div class="form-group">







<input type="hidden" name="st" value="1" />

<input type="hidden" name="user_id" value="<?=$_SESSION['employee_id']?>" />

<input type="hidden" name="entry_date" value='<?=$today_date?>' />

<input type="hidden" name="entry_time" value='<?=$create_date?>' />





<input type="submit" name="call_submit" class="btn btn-success"  value="Submit" />

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