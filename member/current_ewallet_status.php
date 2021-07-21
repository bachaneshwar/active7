<?php 
include("include/top.php");
include("include/menu.php");


$sql1="SELECT * FROM `ewallet` WHERE `spid`='$_SESSION[spid]'";
$res1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($res1);
$remain_amt=$row1[rest_amt];
$total_amt=$row1[total_amt];

?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<script type="text/javascript">



</script>


<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">E-Wallet Status</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="current_ewallet_status.php?m=5"><i class="fa fa-home" aria-hidden="true"></i> E-Wallet</a></li>
          <li><a href="current_ewallet_status.php?m=5" class="active">E-Wallet Status</a></li>
        </ol> <!-- /breadcrumb -->
        
    </div> <!-- /dashboard -->
</div> <!-- /row -->
<!-- //////////////////////////////////////////////////// Work Shift Master -->
<div class="row">

	

    <div class="col-md-12 col-sm-12 col-xs-12">
	
	

        <div class="panel">
		<br/>

            <div class="panel-heading">
                <h3>E-Wallet Status</h3>
                <p class="text-muted"></p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <table class="table table-bordered"> 
<!--
<tr>
<td><span style="color:#ff0000;font-size:13px;font-weight:bold">Total Amount</span></td>
<td>&nbsp;&nbsp;:</td>
<td><span style="color:#663300;font-size:12px;font-weight:bold">&nbsp;&nbsp;<?=$total_amt?></span></td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>
-->

<tr>
<td><span style="color:green;font-size:13px;font-weight:bold">E-Wallet Balance</span></td>
<td>&nbsp;&nbsp;:</td>
<td><span style="color:green;font-size:13px;font-weight:bold">&nbsp;&nbsp;  <?=$remain_amt?></span></td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>


<!--
<tr>
<td><span style="color:#ff0000;font-size:13px;font-weight:bold">Withdrawal Amount</span></td>
<td>&nbsp;&nbsp;:</td>
<td><span style="color:#663300;font-size:12px;font-weight:bold">&nbsp;&nbsp;  <?=$row1[withdrawal]?></span></td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>
<tr>
<td><span style="color:#ff0000;font-size:13px;font-weight:bold">Transfer Amount</span></td>
<td>&nbsp;&nbsp;:</td>
<td><span style="color:#663300;font-size:12px;font-weight:bold">&nbsp;&nbsp;  <?=$row1[send_transfer_amt]?></span></td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>
<tr>
<td><span style="color:#ff0000;font-size:13px;font-weight:bold">Receiving Amount</span></td>
<td>&nbsp;&nbsp;:</td>
<td><span style="color:#663300;font-size:12px;font-weight:bold">&nbsp;&nbsp;  <?=$row1[get_transfer_amt]?></span></td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>

<tr>
<td><span style="color:#ff0000;font-size:13px;font-weight:bold">Total Investment Amount</span></td>
<td>&nbsp;&nbsp;:</td>
<td><span style="color:#663300;font-size:12px;font-weight:bold">&nbsp;&nbsp;<?=$row1[invest_amt]?></span></td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>





<tr>
<td><span style="color:#ff0000;font-size:13px;font-weight:bold">Total Payout Amount</span></td>
<td>&nbsp;&nbsp;:</td>
<td><span style="color:#663300;font-size:12px;font-weight:bold">&nbsp;&nbsp; <?=$row1[ref_bonus]?></span></td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>
-->
</table>
 <!-- /form-horizontal -->
            </div> 
			
		
			<!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<?php include("include/footer.php"); ?>