<?php 
include("include/top.php");
include("include/menu.php");

$approve_dt=date('Y-m-d');

if($_POST[sub_can]!=""){

$sqlv="SELECT * FROM `withdrawal` WHERE `with_d_id`='$_REQUEST[with_d_id]'";
$resv=mysqli_query($con,$sqlv);
$rowv=mysqli_fetch_array($resv);
$apply_spid=$rowv[spid];

$sql1="SELECT * FROM `ewallet` WHERE `spid`='$apply_spid'";
$res1=mysqli_query($con,$sql1);
$num1=mysqli_num_rows($res1);

if($num1>0){
$rowqc=mysqli_fetch_array($res1);
$ewallet_wd=$rowqc[withdrawal]-$rowv[amount];
$ewallet_bal=$rowqc[rest_amt]+$rowv[amount]+$rowv[cutting_amt];
$ewallet_wd_chg=$rowqc[withdrawal_chg]-$rowv[cutting_amt];

$del="UPDATE `withdrawal` SET `status`='REJECTED',`status_dt`='$approve_dt' WHERE `with_d_id`='$_REQUEST[with_d_id]'";
$rel=mysqli_query($con,$del);

$sql71="UPDATE `ewallet` SET `rest_amt`='$ewallet_bal',`withdrawal`='$ewallet_wd',`withdrawal_chg`='$ewallet_wd_chg' WHERE `spid`='$apply_spid'";
$res71=mysqli_query($con,$sql71);

}

header("location:withdrwal_history.php?st=5");

}


?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Withdrawal History</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i>Withdrawal</a></li>
          <li><a href="#" class="active">Withdrawal History</a></li>
        </ol> <!-- /breadcrumb -->
    </div> <!-- /dashboard -->
</div> <!-- /row -->


<div class="row">
    
    <!-- //////////////////////////////////////////////////// Responsvie Table Bordered -->
    <div class=" col-xs-12">
        <div class="panel">
             <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <div class="table-responsive">
			<br/>
            <table class="table table-bordered"> 
            <thead> 
        
<tr>
<th >Sl.</th>
<th >Amount</th>
<th >Apply Date</th>
<th >Status</th>
<th >Status Date</th>
</tr>
            </thead> 

<?
$sql="SELECT * FROM  `withdrawal` WHERE `spid`='$_SESSION[spid]'  ORDER BY  `with_d_id` DESC";
$res=mysqli_query($con,$sql);
$c=1;
while($row=mysqli_fetch_array($res))
{

if($row[status]==0){
$pmsg="Pending";
}
elseif($row[status]==1){
$pmsg="Approved";
}
else{
$pmsg="Reject";
}

?>
<tr align="center" valign="middle">
<td ><b><?=$c?></b></td>
<td ><?=$row['amount']?></td>

<td ><?=$row['apply_dt']?></td>

<td ><?=$pmsg?></td>
<td >
<?
if($row[status]>0){
?>
<?=$row['status_dt']?>
<? } ?>
</td>
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