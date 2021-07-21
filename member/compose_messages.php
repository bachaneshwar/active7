<?php 
include("include/top.php");
include("include/menu.php");



	
$date=date("Y-m-d");
if($_POST[login_submit]!=""){

$sql="INSERT INTO `member_message`(`spid`,`message`,`date`)VALUES('$_SESSION[spid]','$_POST[message]','$date')";
$res=mysqli_query($con,$sql);
if($res){
header("location:compose_messages.php?msg=Sucessfully Submitted&m=3.");
 }
}



?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<script type="text/javascript">



</script>


<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Compose Messages</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> Messages</a></li>
          <li><a href="compose_messages.php?m=3" class="active">Compose Messages</a></li>
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
                <h3>Compose Messages</h3>
                <p class="text-muted"></p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <form class="form-horizontal"  action="" method="post" onsubmit="return validate_form1(this)">
            
		

			
            <div class="form-group">
                <label for="name2" class="col-sm-2 control-label">Messages</label>
                <div class="col-sm-10"><textarea name="message" class="form-control"  id="message" rows="5" cols="36"></textarea></div>
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