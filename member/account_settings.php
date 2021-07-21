<?php 
include("include/top.php");
include("include/menu.php");



	
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

$sql="SELECT * FROM `member_account` WHERE `spid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<script type="text/javascript">



</script>


<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Account  Settings</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
          <li><a href="account_settings.php?m=1" class="active">Account  Settings</a></li>
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
                <h3>Account Details</h3>
                <p class="text-muted"></p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <form class="form-horizontal"  action="account_details_insert.php" method="post" onsubmit="return validate_form1(this)">
            
		

			
            <div class="form-group">
                <label for="name2" class="col-sm-2 control-label">Block Chain</label>
                <div class="col-sm-10"><input type="text" class="form-control" id="paytm" name="paytm" value="<?=$row['paytm']?>" style='width:300px' ></div>
            </div> 

		   <div class="form-group">
                <label for="name2" class="col-sm-2 control-label">Bitcoin</label>
                <div class="col-sm-10"><input type="text" class="form-control" id="bitcoin" name="bitcoin" value="<?=$row['bitcoin']?>" style='width:300px' ></div>
            </div> 
			
			
          <!-- /form-group -->


            <div class="col-sm-offset-2 col-sm-10 no-padding">
                <input type="submit" name='login_submit' class="btn btn-md bg-purple"/>
            </div> <!-- /col -->

            </form> <!-- /form-horizontal -->
            </div> 
			
		
			<!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<?php include("include/footer.php"); ?>