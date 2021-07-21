<?php 
include("include/top.php");
include("include/menu.php");


if($_POST[get_submit]!=""){	

$sql="SELECT * FROM `member` WHERE `spid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

$to="$row[email]";
$subject="Transaction Password";
$message="Your Transaction Password is - $row[trans_password]";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To: '.$row[sname].' <'.$to.'>' . "\r\n";
$headers .= 'From: $row_sp1[com_name] <$row_sp1[email]>' . "\r\n";
 
mail($to,$subject,$message,$headers);

header("location:password_settings.php?msg=Transaction Password Sucessfully Send to your E-mail.&m=$_GET[st]"); 
}

	
if($_POST[login_submit]!=""){

$sql="SELECT * FROM `member` WHERE `spid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$pass=$row[pass];

if($_POST[old_pass]==$pass)
   {
if($_POST[pass]==$_POST[con_pass]){
$query="UPDATE `member` SET `pass`='$_POST[pass]' WHERE `spid`='$_SESSION[spid]'";	
$rows=mysqli_query($con,$query);	
if($rows){
header("location:password_settings.php?msg=Password Sucessfully Updated.&m=$_GET[m]"); 
         }
                                  }
else{
header("location:password_settings.php?msg1=New Password and Confirm Password is not same.&m=$_GET[m]"); 
    }
  }
else{
header("location:password_settings.php?msg1=Please type correct old password.&m=$_GET[m]"); 
}
}



if($_POST[login_trabs]!=""){

$sql="SELECT * FROM `member` WHERE `spid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$pass=$row[trans_password];

if($_POST[old_pass]==$pass)
   {
if($_POST[pass]==$_POST[con_pass]){
$query="UPDATE `member` SET `trans_password`='$_POST[pass]' WHERE `spid`='$_SESSION[spid]'";	
$rows=mysqli_query($con,$query);	
if($rows){
header("location:password_settings.php?msg=Password Sucessfully Updated.&m=$_GET[m]"); 
         }
                                  }
else{
header("location:password_settings.php?msg1=New Password and Confirm Password is not same.&m=$_GET[m]"); 
    }
  }
else{
header("location:password_settings.php?msg1=Please type correct old password.&m=$_GET[m]"); 
}
}

if($_POST[login_epin]!=""){

$sql="SELECT * FROM `member` WHERE `spid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$pass=$row[epin_password];

if($_POST[old_pass]==$pass)
   {
if($_POST[pass]==$_POST[con_pass]){
$query="UPDATE `member` SET `epin_password`='$_POST[pass]' WHERE `spid`='$_SESSION[spid]'";	
$rows=mysqli_query($con,$query);	
if($rows){
header("location:password_settings.php?msg=Password Sucessfully Updated.&m=$_GET[m]"); 
         }
                                  }
else{
header("location:password_settings.php?msg1=New Password and Confirm Password is not same.&m=$_GET[m]"); 
    }
  }
else{
header("location:password_settings.php?msg1=Please type correct old password.&m=$_GET[m]"); 
}
}
?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<script type="text/javascript">
function validate_form1(form){
if( form.elements['old_pass'].value=="" ) { alert("Please type Old Password."); form.elements['old_pass'].focus(); return false; }  
if( form.elements['pass'].value=="" ) { alert("Please type New Password."); form.elements['pass'].focus(); return false; }
if( form.elements['pass'].value!="" ){ 
var pas=form.elements['pass'].value;
 var len=pas.length;
if(len<6){
alert("New Password strength more than five."); form.elements['pass'].focus(); return false;
}
}
if( form.elements['con_pass'].value=="" ) { alert("Please type New Confirm Password."); form.elements['con_pass'].focus(); return false; }
if( form.elements['con_pass'].value!="" ){ 
var pas1=form.elements['con_pass'].value;
 var len1=pas1.length;
if(len1<6){
alert("Confirm Password strength more than five."); form.elements['con_pass'].focus(); return false;
}
}


if(form.elements['con_pass'].value!=""){
var a1 =form.elements['pass'].value;
var a2 =form.elements['con_pass'].value;
if(a1!=a2){
alert("Please type Correct Confirm Password"); form.elements['conpass'].focus(); return false;
}
}

}

function validate_form2(form){
if( form.elements['old_pass'].value=="" ) { alert("Please type Old Password."); form.elements['old_pass'].focus(); return false; }  
if( form.elements['pass'].value=="" ) { alert("Please type New Password."); form.elements['pass'].focus(); return false; }
if( form.elements['pass'].value!="" ){ 
var pas=form.elements['pass'].value;
 var len=pas.length;
if(len<6){
alert("New Password strength more than five."); form.elements['pass'].focus(); return false;
}
}
if( form.elements['con_pass'].value=="" ) { alert("Please type New Confirm Password."); form.elements['con_pass'].focus(); return false; }
if( form.elements['con_pass'].value!="" ){ 
var pas1=form.elements['con_pass'].value;
 var len1=pas1.length;
if(len1<6){
alert("Confirm Password strength more than five."); form.elements['con_pass'].focus(); return false;
}
}


if(form.elements['con_pass'].value!=""){
var a1 =form.elements['pass'].value;
var a2 =form.elements['con_pass'].value;
if(a1!=a2){
alert("Please type Correct Confirm Password"); form.elements['conpass'].focus(); return false;
}
}

}


function validate_form3(form){
if( form.elements['old_pass'].value=="" ) { alert("Please type Old Password."); form.elements['old_pass'].focus(); return false; }  
if( form.elements['pass'].value=="" ) { alert("Please type New Password."); form.elements['pass'].focus(); return false; }
if( form.elements['pass'].value!="" ){ 
var pas=form.elements['pass'].value;
 var len=pas.length;
if(len<6){
alert("New Password strength more than five."); form.elements['pass'].focus(); return false;
}
}
if( form.elements['con_pass'].value=="" ) { alert("Please type New Confirm Password."); form.elements['con_pass'].focus(); return false; }
if( form.elements['con_pass'].value!="" ){ 
var pas1=form.elements['con_pass'].value;
 var len1=pas1.length;
if(len1<6){
alert("Confirm Password strength more than five."); form.elements['con_pass'].focus(); return false;
}
}


if(form.elements['con_pass'].value!=""){
var a1 =form.elements['pass'].value;
var a2 =form.elements['con_pass'].value;
if(a1!=a2){
alert("Please type Correct Confirm Password"); form.elements['conpass'].focus(); return false;
}
}

}
</script>


<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Password Settings</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
          <li><a href="profile_settings.php" class="active">Password Settings</a></li>
        </ol> <!-- /breadcrumb -->
        
    </div> <!-- /dashboard -->
</div> <!-- /row -->
<!-- //////////////////////////////////////////////////// Work Shift Master -->
<div class="row">

	

    <div class="col-md-12 col-sm-12 col-xs-12">
	
	

        <div class="panel">
		<br/>
<?php
$msg=$_REQUEST[msg];
if($_REQUEST[msg])
echo "<p style='color:green;font-weight:bold'>&nbsp;$msg</p>";
if($_REQUEST[msg1])
echo "<p style='color:red;font-weight:bold'>&nbsp;$_REQUEST[msg1]</p>";
?>	
            <div class="panel-heading">
                <h3>Login Password</h3>
                <p class="text-muted"></p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <form class="form-horizontal"  action="" method="post" onsubmit="return validate_form1(this)">
            
		

			
            <div class="form-group">
                <label for="name2" class="col-sm-2 control-label">Old Password</label>
                <div class="col-sm-10"><input type="password" class="form-control" id="old_pass" name="old_pass" value="" style='width:300px' required></div>
            </div> 

		   <div class="form-group">
                <label for="name2" class="col-sm-2 control-label">New Password</label>
                <div class="col-sm-10"><input type="password" class="form-control" id="pass" name="pass" value="" style='width:300px' required></div>
            </div> 
			
			   <div class="form-group">
                <label for="name2" class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-10"><input type="password" class="form-control" id="con_pass" name="con_pass" value="" style='width:300px' required></div>
            </div> 
          <!-- /form-group -->


            <div class="col-sm-offset-2 col-sm-10 no-padding">
                <input type="submit" name='login_submit' class="btn btn-md bg-purple"/>
            </div> <!-- /col -->

            </form> <!-- /form-horizontal -->
            </div> 
			
			 <div class="panel-heading">
                <h3>Transaction Password</h3>
                <p class="text-muted"></p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <form class="form-horizontal"  action="" method="post" onsubmit="return validate_form2(this)">
            
	
		
			
			
            <div class="form-group">
                <label for="name2" class="col-sm-2 control-label">Old Password</label>
                <div class="col-sm-10"><input type="password" class="form-control" id="old_pass" name="old_pass" value="" style='width:300px' required></div>
            </div> 

		   <div class="form-group">
                <label for="name2" class="col-sm-2 control-label">New Password</label>
                <div class="col-sm-10"><input type="password" class="form-control" id="pass" name="pass" value="" style='width:300px' required></div>
            </div> 
			
			   <div class="form-group">
                <label for="name2" class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-10"><input type="password" class="form-control" id="con_pass" name="con_pass" value="" style='width:300px' required></div>
            </div> 
          <!-- /form-group -->


            <div class="col-sm-offset-2 col-sm-10 no-padding">
                <input type="submit" name='login_trabs' class="btn btn-md bg-purple"/>
            </div> <!-- /col -->

            </form> <!-- /form-horizontal -->
            </div> 
			
	
		<!--
			 <div class="panel-heading">
                <h3>E-Pin Password</h3>
                <p class="text-muted"></p>
            </div>
            <div class="panel-body m-t-0">
            <form class="form-horizontal"  action="" method="post" onsubmit="return validate_form3(this)">
            <div class="form-group">
                <label for="name2" class="col-sm-2 control-label">Old Password</label>
                <div class="col-sm-10"><input type="password" class="form-control" id="old_pass" name="old_pass" value="" style='width:300px' required></div>
            </div> 

		   <div class="form-group">
                <label for="name2" class="col-sm-2 control-label">New Password</label>
                <div class="col-sm-10"><input type="password" class="form-control" id="pass" name="pass" value="" style='width:300px' required></div>
            </div> 
			
			   <div class="form-group">
                <label for="name2" class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-10"><input type="password" class="form-control" id="con_pass" name="con_pass" value="" style='width:300px' required></div>
            </div> 


            <div class="col-sm-offset-2 col-sm-10 no-padding">
                <input type="submit" name='login_epin' class="btn btn-md bg-purple"/>
            </div>

            </form> 
            </div> 

		
			
	<center>		
<form action="" method="post">
<input type="submit" name="get_submit" value="Generate Transaction Password" style="height:30px">
</form>
	</center>	

<p style='padding:10px'>If you did not get your transaction password or you forgot your transaction password. If you have still not created a transaction password, or if you want to generate a new transaction password. You can create new transaction password. Just click on Generate Transaction Password button. The system will send you your new Transaction Password to your e-mail address mentioned by you in the personal details. Please update your mobile number and email id.</p>	
<br/>	
-->
	
			<!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<?php include("include/footer.php"); ?>