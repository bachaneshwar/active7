<?php 
include("include/top.php");
include("include/menu.php");


?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->




<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Login Password</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> E-Pin</a></li>
          <li><a href="profile_settings.php" class="active">Login Password</a></li>
        </ol> <!-- /breadcrumb -->
        
    </div> <!-- /dashboard -->
</div> <!-- /row -->
<!-- //////////////////////////////////////////////////// Work Shift Master -->
<div class="row">

	

    <div class="col-md-12 col-sm-12 col-xs-12">
	
	

        <div class="panel">
		<br/>

 <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <form class="form-horizontal"  action="epin_verify.php" method="post" onsubmit="return validate_form1(this)">
            
		

			
 

		   <div class="form-group">
                <label for="name2" class="col-sm-2 control-label">E-Pin Password</label>
                <div class="col-sm-10"><input type="password" class="form-control" id="epin_password" name="epin_password" value="" style='width:300px' required></div>
            </div> 
			<?php
$msg=$_REQUEST[msg];
if($_REQUEST[msg])
echo "<p style='color:green;font-weight:bold'>&nbsp;$msg</p>";
if($_REQUEST[msg1])
echo "<p style='color:red;font-weight:bold'>&nbsp;$_REQUEST[msg1]</p>";
?>	
	
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