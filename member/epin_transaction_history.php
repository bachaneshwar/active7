<?php 
include("include/top.php");
include("include/menu.php");

if($_SESSION[epin]!="antaraseal")
{
header("location:login_epinpassword.php?msg=You are not a valid user.&m=8");
}
?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Transfer Details</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> E-Pin </a></li>
          <li><a href="#" class="active">Transfer Details</a></li>
        </ol> <!-- /breadcrumb -->
    </div> <!-- /dashboard -->
</div> <!-- /row -->


<div class="row">
    
    <!-- //////////////////////////////////////////////////// Responsvie Table Bordered -->
    <div class=" col-xs-12">
        <div class="panel">
            <div class="panel-heading">
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <div class="table-responsive">
            <table class="table table-bordered"> 
            <thead> 
			
<tr>
<th>Sr</th>
<th scope="col" class="rounded">Pin Sr.No.</th>
<th scope="col" class="rounded">Pin No.</th>
<th scope="col" class="rounded">Member ID</th>
<th scope="col" class="rounded">Package</th>
</tr>
            </thead> 


<?php
$msgsql="SELECT * FROM  `e-pin` WHERE `senderid`='$_SESSION[spid]'  ORDER BY  `date` DESC";
$msgres=mysqli_query($con,$msgsql);
while($row=mysqli_fetch_array($msgres)){
$c++;


$sre="SELECT * FROM `package` WHERE `package_id`='$row[package_id]'";
$ret=mysqli_query($con,$sre);
$des=mysqli_fetch_array($ret);

?>
<tr  valign="middle">

           
<td><?=$c?>.</td>
<td><?=$row[id]?></td>
<td><?=$row[pin]?></td>
<td><?=$row[memtransid]?></td>
<td><?=$des[package_name]?></td>



</tr>
<?php
	}
?>
</table>
            </div> <!-- /table-responsive -->
            </div> <!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<!-- //////////////////////////////////////////////////// Footer -->
<?php include("include/footer.php"); ?>