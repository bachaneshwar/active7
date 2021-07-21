<?php 
include("include/top.php");
include("include/menu.php");



?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Wallet Transfer History</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i>E-wallet</a></li>
          <li><a href="#" class="active">Wallet Transfer History</a></li>
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
<th align='center'style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033">Sl.</th>
<th align='center' style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033">Amount</th>
<th align='center' style="background-color:#d8ded8;border:1px solid #663300;font-size:13px;color:#000033">Transfer Date</th>
</tr>
            </thead> 

<?
$sql="SELECT * FROM  `wallet_transfer_details` WHERE `spid`='$_SESSION[spid]'  ORDER BY  `id` ASC ";
$res=mysqli_query($con,$sql);
$c=1;
while($row=mysqli_fetch_array($res))
{

if($row[wallet_id]==1){
$rem_msg="Noraml To Repurchase Transfer";
}else{
$rem_msg="Repurchase To Noraml Transfer";
}

?>
<tr align="center" valign="middle">
<td align="center" style="background-color:#fff;border:1px solid #663300;font-size:13px;color:#000033"><b><?=$c?></b></td>
<td align="center" style="background-color:#fff;border:1px solid #663300;font-size:13px;color:#000033"><?=$row['amount']?></td>
<td align="center" style="background-color:#fff;border:1px solid #663300;font-size:13px;color:#000033"><?=$row['payment_dt']?></td>
</tr>
<?
	$c++;
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