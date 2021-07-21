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
    <h1 class="dash-title">Unused E-Pin</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> E-Pin </a></li>
          <li><a href="#" class="active">Unused E-Pin</a></li>
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
<th scope="col" class="rounded">Generated Date</th>
<th scope="col" class="rounded">Package</th>
</tr>
            </thead> 


<?php
$msgsql="select * from `e-pin` WHERE `status`='1'  AND `memtransid`='$_SESSION[spid]'  ORDER BY `id` ASC";
$msgres=mysqli_query($con,$msgsql);
while($row=mysqli_fetch_array($msgres)){
$c++;


$dt1=explode("-",$row[date]);
$dt2=$dt1[2]."-".$dt1[1]."-".$dt1[0];

$sre="SELECT * FROM `package` WHERE `package_id`='$row[package_id]'";
$ret=mysqli_query($con,$sre);
$des=mysqli_fetch_array($ret);

?>
<tr  valign="middle">

           
<td><?=$c?>.</td>
<td><?=$row[id]?></td>
<td><?=$row[pin]?></td>
<td><?=$dt2?></td>
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