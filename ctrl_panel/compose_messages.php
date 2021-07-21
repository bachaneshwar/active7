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


<?php
if($_POST[call_submit]!=""){
$date=date("Y-m-d");
$sql1="SELECT * FROM `member` WHERE `spid`='$_POST[spid]'";
$res1=mysqli_query($con,$sql1);
$num1=mysqli_num_rows($res1);
if($num1>0){
 $update="INSERT INTO `company_message`(`message`,`spid`,`date`)VALUES('$_POST[message]','$_POST[spid]','$date')";
$reup=mysqli_query($con,$update);
if($reup){

$nurl="$log_url?lid=$dtls_link[sublink_id]&";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'msg=Message Sent Sucessfully.">';	

	 
}
}
else{
$nurl="$log_url?lid=$dtls_link[sublink_id]&";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'msg=Please type valid Member ID.">';	
		 
}

}
?>

<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon"><i class="fa fa-envelope-o"></i></div>
<div class="header-title">
<h1>Message</h1>
<small>Compose Message</small>
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
<i class="fa fa-list"></i> Compose Message
</div>
</div>



<div class="panel-body">



<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">


<tr>
<td>Member ID</td>
<td><input type="text" class="form-control" name="spid" required></td>
<td></td>
<td></td>
</tr>	



<tr><td colspan="4"><br/></td></tr>





<tr>
<td>Message</td>
<td colspan="3"><textarea class="form-control" rows="3" name="message" required></textarea></td>
</tr>


<tr ><td colspan="4"><br/></td></tr>

</table> 




<div class="form-group">



<input type="hidden" name="st" value="1" />

<input type="submit" name="call_submit" class="btn btn-success"  value="Submit" />
<input type="reset" name="reset"  class="btn btn-warning" value="Exit" />
</div>




</form>


<?php
$msg=$_REQUEST[msg];
echo "<center><font color=\"#ff0066\" size=\"5\">".$msg."</font></center>";

?>

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