<?php
ob_start();
session_start();
error_reporting(0);


if($_SERVER["HTTPS"] != "on") {
 // header("HTTP/1.1 301 Moved Permanently");
  //header("Location: https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
  //exit();
}



include_once("lib_panel/config.php");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  if($_POST['login_type']==1){
if ( isset($_POST['password']) ){
if($_SERVER['REQUEST_METHOD'] == 'POST')
{

$decode_value1 = $_POST['username'];
$decode_value2 = $_POST['password'];

$new_val1 = $decode_value1;
$new_val2 = md5($decode_value2);


$sql="SELECT * FROM `admin` WHERE `user`='$new_val1' AND `pass`='$new_val2'";
$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);

if($num>0)
{
$row=mysqli_fetch_array($res);
$_SESSION['indi_cpanel']="OnlyIndi19Panel";
$_SESSION['login_type']=$row['type'];
$_SESSION['userid']=$row['userid'];
$_SESSION['timestamp']=time();
header("location:dashboard.php?lid=0");
}
else{
    //print $sql;
$msg="<span style='color:red'>Login credentials does not match!</span>";// If verification is incorrect.	
}



}
}
}


if($_POST['login_type']==2){

if ( isset( $_POST[ 'password' ] ) ){
if($_SERVER['REQUEST_METHOD'] == 'POST')
{

$decode_value2=mysqli_real_escape_string($con,$_POST['password']);
$new_val2=md5($decode_value2);

$sql="SELECT * FROM `employee` WHERE `employee_code`='$_POST[username]' AND `employee_pwd`='$new_val2' AND `st`='1'";
$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);
if($num>0)
{
$row=mysqli_fetch_array($res);
$_SESSION['indi_cpanel']="OnlyIndi19Panel";
$_SESSION['login_type']="Employee";
$_SESSION['employee_id']=$row['employee_id'];
$_SESSION['timestamp']=time();
header("location:dashboard.php?m=0");
}else{
$msg="<span style='color:red'>Login credentials does not match!</span>";// If verification is incorrect.	
}
}
}

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>ADMIN PANEL</title>

<!-- Favicon and touch icons -->
<link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
<!-- Bootstrap -->
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!-- Bootstrap rtl -->
<!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
<!-- Pe-icon-7-stroke -->
<link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
<!-- style css -->
<link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
<!-- Theme style rtl -->
<!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->

<!-- Added for CR-2424, To disable right click option for the entire site  -->

<script language="javascript">
var message="This function is not allowed here.";
function clickIE4(){

if (event.button==2){
alert(message);
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}

else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("alert(message);return false;")
</script>	
<!-- Added for CR-2424, To disable right click option for the entire site: ends here-->		 

<!--Disabling CTRL+U , CTRL+C key and right click on your website.-->

<script type='text/javascript'>
var isCtrl = false;
document.onkeyup=function(e)
{
if(e.which == 17)
isCtrl=false;
}
document.onkeydown=function(e)
{
if(e.which == 17)
isCtrl=true;
if((e.which == 85) || (e.which == 67) && (isCtrl == true))
{
return false;
}
}
var isNS = (navigator.appName == "Netscape") ? 1 : 0;
if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
function mischandler(){
return false;
}
function mousehandler(e){
var myevent = (isNS) ? e : event;
var eventbutton = (isNS) ? myevent.which : myevent.button;
if((eventbutton==2)||(eventbutton==3)) return false;
}
document.oncontextmenu = mischandler;
document.onmousedown = mousehandler;
document.onmouseup = mousehandler;
</script>


<script type='text/javascript'>

</script>		

</head>


<body>
<!-- Content Wrapper -->
<div class="login-wrapper">
<div class="back-link">
<a href="../" class="btn btn-add">Back to Web</a>
</div>
<div class="container-center">
<div class="login-area">
<div class="panel panel-bd panel-custom">
<div class="panel-heading">
<div class="view-header">
<div class="header-icon">
<i class="pe-7s-unlock"></i>
</div>
<div class="header-title">
<center><h1 style='font-size:20px'>ADMIN PANEL</h1><br/>
<h5>LOG IN</h5></center>
</div>
</div>
</div>
<div class="panel-body">
<form action="" id="loginForm" onsubmit="return validate_form(this)" method="post">
<div class="form-group">
<label class="control-label" for="username">Username</label>
<input type="text"  name="username" id="username" class="form-control" required style='text-transform:none'>
<span class="help-block small"></span>
</div>
<div class="form-group">
<label class="control-label" for="password">Password</label>
<input type="password" required  name="password" id="password" class="form-control" style='text-transform:none'>
</div>

<div class="form-group">

<input type="hidden"  name="login_type" id="login_type" value="1" readonly />  

</div>
<div>
<?php if(isset($msg)){?>
<span class="help-block small"><?php echo $msg;?></span>
<?php } ?>
<input type="submit" class="btn btn-add" value="Login" />&nbsp;
<!-- <a href="#">Forgot Password?</a>-->
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- /.content-wrapper -->
<!-- jQuery -->
<script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
<!-- bootstrap js -->
<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html>