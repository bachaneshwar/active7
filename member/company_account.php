<?php 
include("include/top.php");
include("include/menu.php");



$sql="SELECT * FROM `member_account` WHERE `spid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);


$zsql="SELECT * FROM `company_account` WHERE `acc_id`='1'";
$zres=mysqli_query($con,$zsql);
$zrow=mysqli_fetch_array($zres);

?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<script type="text/javascript">



</script>


<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Company Account  </h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
          <li><a href="company_account.php?m=1" class="active">Company Account</a></li>
        </ol> <!-- /breadcrumb -->
        
    </div> <!-- /dashboard -->
</div> <!-- /row -->
<!-- //////////////////////////////////////////////////// Work Shift Master -->
<div class="row">

	

    <div class="col-md-12 col-sm-12 col-xs-12">
	
	

        <div class="panel">
		<br/>

            <div class="panel-heading">
                <h3>Company Account</h3>
                <p class="text-muted"></p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <form class="form-horizontal"  action="account_details_insert.php" method="post" onsubmit="return validate_form1(this)">
            
		

			
            <div class="form-group">
                <label for="name2" class="col-sm-2 control-label">Block Chain :</label>
                <div class="col-sm-10"><?=$zrow[blockchain]?></div>
            </div> 

		   <div class="form-group">
                <label for="name2" class="col-sm-2 control-label">Bitcoin :</label>
                <div class="col-sm-10"><?=$zrow[bitcoin]?></div>
            </div> 
			
			
          <!-- /form-group -->


          <!-- /col -->

            </form> <!-- /form-horizontal -->
            </div> 
			
		
			<!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<?php include("include/footer.php"); ?>