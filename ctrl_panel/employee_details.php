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

if($_POST[call_submit]!=""){

if($_POST[subId]!=""){

$prev_dtls=$my->total_row($con,employee,employee_id,$_POST[subId]);
$mobile_num1=$my->total_num(employee,employee_mobile,$_POST[employee_mobile]);

if($prev_dtls[employee_mobile]==$_POST[employee_mobile]){
$mobile_num1=0;
$mobile_num2=0;
}

if($mobile_num1==0){


$mem_photo=$_FILES[employee_picture];
$pho_name=$mem_photo[name];

if($pho_name!=""){
$folder1="emp_picture/".$pho_name;
//move_uploaded_file($mem_photo[tmp_name],$folder1);
}else{
$pho_name=$prev_dtls[employee_picture];
}

$bio_photo=$_FILES[employee_biometric];

$bio_name=$bio_photo[name];
if($bio_name!=""){
$folder2="emp_bio/".$bio_name;
//move_uploaded_file($bio_photo[tmp_name],$folder2);
}else{
$bio_name=$prev_dtls[employee_biometric];
}



$nurl="$log_url?lid=$dtls_link[sublink_id]&pg=$_GET[pg]";

$my->new_modify_val2($con,employee,employee_picture,$pho_name,employee_biometric,$bio_name,$nurl,$_POST[subId]);
header("location:$nurl");

}else{
$nurl="$log_url?lid=$dtls_link[sublink_id]&msg=This mobile number is already available";
header("location:$nurl");
}
}
}
?>       





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



<script type="text/javascript">

function validate_form(form){

if( form.elements['employee_mobile'].value=="" ) { alert("Please type Mobile Number."); form.elements['employee_mobile'].focus(); return false; }

if( form.elements['employee_mobile'].value!="" ) { 

var number = form.elements['employee_mobile'].value;

var number1=number.length;

if(number1!=10){alert("Please type valid Number"); form.elements['employee_mobile'].focus(); return false; }  

}

}

</script>



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

<small>Employee Details</small>

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

<i class="fa fa-list"></i>  Employee Search 

</div>

</div>







<div class="panel-body">



<form class="col-sm-6" name="newform" method="post" enctype="multipart/form-data">

<div class="form-group">

<label>Employee ID</label>

<input type="text" class="form-control" name="employee_code" id="employee_code"  onkeyup="return ajax2()" placeholder="Enter Employee ID" required>

</div>

<div class="form-group">

<label>Employee Name</label>

<input type="text" class="form-control" name="employee_name" id="employee_name"  placeholder="Employee Name" readonly >

</div>



<div class="reset-button">

<input type="submit" name="submit" class="btn btn-success"  value="Submit" />

<input type="reset" value="Exit" class="btn btn-warning" />



</div>

</form>

<br/><br/>

<center>

<?php

$msg=$_REQUEST[msg];

if($_REQUEST[msg])

echo "<p><span style='color:brown;font-size:14px;font-weight:bold'>$msg</span></p>";

?>

</center>



</div>





<?

if($_POST[submit]!=""){



$value_num=$my->second_num($con,employee,employee_code,$_POST[employee_code],st,1);



if($value_num>0){

$value_det=$my->total_row($con,employee,employee_code,$_POST[employee_code]);

}else{

header("location:$log_url?lid=$dtls_link[sublink_id]");

}





if($value_num>0){

?>





<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">

<div class="btn-group" id="buttonlist"> 

<i class="fa fa-list"></i>  Employee Details 

</div>

</div>





<div class="panel-body" id="panel-body">



<form class="col-sm-6" action="" method="post" name="newform1" onsubmit="return validate_form(this);" enctype="multipart/form-data">



<div class="form-group">

<label>Employee ID</label>

<?=$value_det[employee_code]?>

</div>





<div class="form-group">

<label>Employee Name</label>

<input type="text" class="form-control" name="employee_name" value="<?=$value_det[employee_name]?>"  required>

</div>





<div class="form-group">

<label>Father's Name</label>

<input type="text" class="form-control" name="employee_father" value="<?=$value_det[employee_father]?>"  required>

</div>



<div class="form-group">

<label>Sex</label>

<input name="employee_sex" value="MALE" <? if($value_det[employee_sex]=="MALE") {?> checked="checked" <?}?> type="radio">MALE &nbsp;

<input name="employee_sex" value="FEMALE"  <? if($value_det[employee_sex]=="FEMALE") {?> checked="checked" <?}?>type="radio">FEMALE

</div>





<div class="form-group">

<label>Designation</label>

<select class="form-control" name="designation_id" id="designation_id" style='font-size:14px;width:300px'  required>

<option value="">Select Designation</option>

<?

$designation_det=$my->check_all_asc($con,designation,st,1,designation_id);

foreach($designation_det as $k1=>$v1){

?>

<option value="<?=$v1[designation_id]?>" <? if($v1[designation_id]==$value_det[designation_id]) {?> Selected <?}?>><?=$v1[designation_name]?></option>

<?}?>

</select>

</div>



<div class="form-group">

<label>Address</label>

<textarea class="form-control" rows="3" name="employee_address" required><?=$value_det[employee_address]?></textarea>

</div>



<div class="form-group">

<label>Pin Code</label>

<input type="text" class="form-control"  name="employee_pincode"  maxlength="6" value="<?=$value_det[employee_pincode]?>" onkeypress="return keyRestrict(event, '1234567890')" required>

</div>



<div class="form-group">

<label>Land Mark</label>

<input type="text" class="form-control" name="employee_landmark" value="<?=$value_det[employee_landmark]?>"  required>

</div>





<div class="form-group">

<label>Mobile</label>

<input type="text" class="form-control"  name="employee_mobile"   value="<?=$value_det[employee_mobile]?>"  maxlength="10" onkeypress="return keyRestrict(event, '1234567890')" required>

</div>



<div class="form-group">

<label>Email</label>

<input type="email" class="form-control" style='text-transform:lowercase' value="<?=$value_det[employee_email]?>"  name="employee_email"  required>

</div>



<div class="form-group">

<label>Police Station</label>

<input type="text" class="form-control"  name="employee_ps"  value="<?=$value_det[employee_ps]?>" required>

</div>





<div class="form-group">

<label>Post Office</label>

<input type="text" class="form-control"   name="employee_po"  value="<?=$value_det[employee_po]?>" required>

</div>



<div class="form-group">

<label>Bank Name</label>

<select class="form-control" name="bank_id" id="bank_id" style='font-size:14px;width:300px' required>

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

<input type="text" class="form-control"  name="bank_branch" value="<?=$value_det[bank_branch]?>" required>

</div>



<div class="form-group">

<label>Account No.</label>

<input type="text" class="form-control"  name="bank_accno" value="<?=$value_det[bank_accno]?>"  required>

</div>



<div class="form-group">

<label>IFSC</label>

<input type="text" class="form-control" name="bank_ifsc" value="<?=$value_det[bank_ifsc]?>"  required>

</div>



<div class="form-group">

<label>Salary</label>

<input type="text" class="form-control"  name="employee_salary" value="<?=$value_det[employee_salary]?>" onkeypress="return keyRestrict(event, '1234567890')"  required>

</div>



<div class="form-group">

<label>PAN</label>

<input type="text" class="form-control" name="employee_pan" value="<?=$value_det['employee_pan']?>"  />

</div>


<!--
<?

if($value_det[employee_picture]!=""){

?>

<div class="form-group">

<label>Image</label>

<img  height="150px" src="emp_picture/<?=$value_det[employee_picture]?>">

</div>

<? } ?>



<div class="form-group">

<label>Image upload</label>

<input type="file" accept="image/*" name="employee_picture" onchange="preview_image(event)" >

<br>

<br>

<img id="output_image" src="">

</div>



<?

if($value_det[employee_biometric]!=""){

?>

<div class="form-group">

<label>Document Details</label> &nbsp;&nbsp;

<a href="emp_bio/<?=$value_det[employee_biometric]?>" target="_blank"> Click to See </a>

</div>

<? } ?>



<div class="form-group">

<label>Upload Document</label>

<input type="file" accept="image/*" name="employee_biometric" >

</div>
-->


<div class="form-group">

<label>Remarks</label>

<textarea class="form-control" name="remarks" rows="3" ><?=$value_det[remarks]?></textarea>

</div>



<div class="form-group">





<input type="hidden" name="employee_code" value="<?=$value_det['employee_code']?>" readonly />

<input type="hidden" name="employee_pwd" value="<?=$value_det['employee_pwd']?>" readonly />

<input type="hidden" name="subId" value="<?=$value_det['employee_id']?>" readonly />



<input type="hidden" name="st" value="<?=$value_det[st]?>" readonly />

<input type="hidden" name="user_id" value="<?=$value_det['user_id']?>" readonly />

<input type="hidden" name="entry_date" value='<?=$value_det[entry_date]?>' readonly />

<input type="hidden" name="entry_time" value='<?=$value_det[entry_time]?>' readonly />





<input type="submit" name="call_submit" class="btn btn-success"  value="Submit" />

<input type="reset" value="Exit" class="btn btn-warning" />

</div>







</div>



<? }} ?>





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