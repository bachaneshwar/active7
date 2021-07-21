<?php
include_once("include/conn.php");

$sql="SELECT * FROM `package` WHERE `package_id`='$_GET[package_id]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
if($row[emi_applicable]==1){
?>
<select name="choice_id" id="choice_id" class="form-control" required >
<option value="">Select</option>
<option value="1">Commision & Plot</option>
<option value="2">Only Plot</option>
<option value="3">Only Commision</option>
</select>
<?}else{?>
<input type="hidden" name="choice_id" id="choice_id" value="3" readonly >
<?}?>

