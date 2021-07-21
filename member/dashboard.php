<?php
include("include/top.php");
include("include/menu.php");

$zsql="SELECT * FROM `amount_rate` WHERE `id`='1'";
$zres=mysqli_query($con,$zsql);
$zrow=mysqli_fetch_array($zres);
?>

<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel"style="background-color:white;">
<div class="container-fluid">

<div class="row">
<div class="col-xs-12 dashboard-header">
<h1 class="dash-title"style='color:green;'>DashBoard</h1>
<!-- //////////////////////////////////////////////////// Breadcrumb -->
<ol class="breadcrumb">
<li><a href="#"style='color:green;'><i class="fa fa-home" aria-hidden="true"style='color:green;'></i> home</a></li>
<li><a href="#" class="active"style='color:green;'>DashBoard</a></li>
</ol> <!-- /breadcrumb -->

</div> <!-- /dashboard -->
</div> <!-- /row -->


<?
if($row[kyc_status]==0 && $row[kyc_updt]==0){
?>
<center><span style="color:red;font-size:20px;font-family:'Times New Roman', Times, serif;font-weight:bold">KYC NOT UPLOAD</span></center>
<? } elseif($row[kyc_status]==0 && $row[kyc_updt]==1){?>
<center><span style="color:blue;font-size:20px;font-family:'Times New Roman', Times, serif;font-weight:bold">KYC PENDING</span></center>
<? } else { ?>
<center><span style="color:green;font-size:20px;font-family:'Times New Roman', Times, serif;font-weight:bold">KYC APPROVED</span></center>
<? } ?>


<?php

$msql="SELECT * FROM `ewallet` WHERE `spid`='$_SESSION[spid]'";
$mres=mysqli_query($con,$msql);
$mrow=mysqli_fetch_array($mres);


$sel_bin_id = "select * FROM `binary_level` where `spid`='$_SESSION[spid]'" ;
$res_bin_id = mysqli_query($con,$sel_bin_id) ;
$row_bin_id = mysqli_fetch_array($res_bin_id) ;
$binary = $row_bin_id[binary];
$level = $row_bin_id[level];


$msql1="SELECT * FROM `member`  where `sponsorid`='$_SESSION[spid]' AND `st`='1' AND `member_status`='1' ";
$mres1=mysqli_query($con,$msql1);
$mnum1=mysqli_num_rows($mres1);

$zmem_all = "SELECT * FROM `member` as mem,`binary_level` as bin WHERE mem.spid=bin.spid  AND bin.binary LIKE '$binary%' AND mem.member_status='1' AND bin.level>'$level'";
$zrem_all = mysqli_query($con,$zmem_all);
$znum_all = mysqli_num_rows($zrem_all) ;

$sqc4 = "SELECT SUM(`amount`) from `withdrawal` WHERE `spid`='$_SESSION[spid]' ";
$rqc4 = mysqli_query($con,$sqc4);
$roc4 = mysqli_fetch_array($rqc4);
$withdrawal=$roc4[0];if($withdrawal==""){$withdrawal=0;}


$sql_direct1="SELECT SUM(selprod.qty*selprod.bv),SUM(selprod.qty*selprod.pv) FROM `sell` as sell,`sell_product` as selprod WHERE sell.customer_id='$row[memid]' AND sell.sell_id=selprod.sell_id  AND sell.st='1'";
$query_direct1=mysqli_query($con,$sql_direct1);
$row_direct1=mysqli_fetch_array($query_direct1);
$self_bv=round($row_direct1[0]);// Self BV
$self_pv=$row_direct1[1];// Self PV


$avsql2 ="SELECT SUM(selprod.qty*selprod.bv),SUM(selprod.qty*selprod.pv) FROM `binary_level` as bin,`sell` as sell,`sell_product` as selprod,`member` as mem WHERE bin.binary LIKE '$row_bin_id[binary]%' AND bin.level>='$row_bin_id[level]' AND bin.spid=mem.spid AND mem.memid=sell.customer_id AND sell.sell_id=selprod.sell_id  AND sell.st='1' ORDER BY bin.id ASC";
$avres2 =mysqli_query($con,$avsql2);
$avrow2 = mysqli_fetch_array($avres2);
$team_bv=round($avrow2[0]);// Team BV
$team_pv=$avrow2[1];// Team PV

if($self_pv==""){$self_pv=0;}
if($self_bv==""){$self_bv=0;}
if($team_pv==""){$team_pv=0;}
if($team_bv==""){$team_bv=0;}



$sqc5 = "SELECT SUM(`referral_income`),SUM(`binary_income`),SUM(`level_income`) from `payout` WHERE `spid`='$_SESSION[spid]'";
$rqc5 = mysqli_query($con,$sqc5);
$roc5 = mysqli_fetch_array($rqc5);

if($roc5[0]==""){$roc5[0]=0;}
if($roc5[1]==""){$roc5[1]=0;}
if($roc5[2]==""){$roc5[2]=0;}
if($roc5[3]==""){$roc5[3]=0;}

if($car_fund==""){$car_fund=0;}
if($house_fund==""){$house_fund=0;}
if($royalty_fund==""){$royalty_fund=0;}



?>






<div class="row">

<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 doughunt-chart">
    <div class="panel" id="grad1">
        <div class="panel-heading">
            <h3 style="color:#ffffff;font-weight:bold"><center>Active Sponsor</center></h3>

        </div>
        <div class="panel-body dashboard-panel m-t-0">
        <div class="canvas-holder">
		 <center><img src="new_icon/large-icon-user.png" width="50px" /></center>
		  <br/>
           <h1 style="color:#ffffff;font-weight:bold"><center> <?=$mnum1?></center></h1>
        </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 doughunt-chart">
    <div class="panel" id="grad2">
        <div class="panel-heading">
            <h3 style="color:#ffffff;font-weight:bold"><center>Active Team</center></h3>
        </div>
        <div class="panel-body dashboard-panel m-t-0">
        <div class="canvas-holder">
		 <center><img src="new_icon/conference-xxl.png" width="50px" /></center>
		 <br/>
         <h1 style="color:#ffffff;font-weight:bold"><center> <?=$znum_all?></center></h1>
        </div>
        </div>
    </div>
</div>

<!-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 doughunt-chart">
    <div class="panel" id="grad4">
        <div class="panel-heading">
            <h3 style="color:#ffffff;font-weight:bold"><center>Withdrawal</center></h3>
        </div>
        <div class="panel-body dashboard-panel m-t-0">
        <div class="canvas-holder">
		 <center><img src="new_icon/rupee.png" width="30px" /></center>
		   <br/>
           <h1 style="color:#ffffff;font-weight:bold"><center> <?=$withdrawal?></center></h1>
        </div>
        </div>
    </div>
</div> -->

<!-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 doughunt-chart">
    <div class="panel" id="grad3">
        <div class="panel-heading">
            <h3 style="color:#ffffff;font-weight:bold"><center>E-Wallet</center></h3>

        </div>
        <div class="panel-body dashboard-panel m-t-0">
        <div class="canvas-holder">
          <center><img src="new_icon/wallet.png" width="50px" /></center>
		   <br/>
           <h1 style="color:#ffffff;font-weight:bold"><center> <?=$mrow[rest_amt]?></center></h1>
        </div>
        </div>
    </div>
</div> -->



<!--
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 doughunt-chart">
    <div class="panel" id="grad3">
        <div class="panel-heading">
            <h3 style="color:#ffffff;font-weight:bold"><center>Self PV</center></h3>

        </div>
        <div class="panel-body dashboard-panel m-t-0">
        <div class="canvas-holder">
		 <center><img src="new_icon/cart-outline.png" width="50px" /></center>
		  <br/>
           <h1 style="color:#ffffff;font-weight:bold"><center> <?=$self_pv?></center></h1>
        </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 doughunt-chart">
    <div class="panel" id="grad2">
        <div class="panel-heading">
            <h3 style="color:#ffffff;font-weight:bold"><center>Team PV</center></h3>
        </div>
        <div class="panel-body dashboard-panel m-t-0">
        <div class="canvas-holder">
		 <center><img src="new_icon/cart-outline.png" width="50px" /></center>
		   <br/>
           <h1 style="color:#ffffff;font-weight:bold"><center> <?=$team_pv?></center></h1>
        </div>
        </div>
    </div>
</div>


-->



<!-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 doughunt-chart">
    <div class="panel" id="grad4">
        <div class="panel-heading">
            <h3 style="color:#ffffff;font-weight:bold"><center>Self Business</center></h3>
        </div>
        <div class="panel-body dashboard-panel m-t-0">
        <div class="canvas-holder">
		 <center><img src="new_icon/cart-outline.png" width="50px" /></center>
		 <br/>
         <h1 style="color:#ffffff;font-weight:bold"><center> <?=$self_bv?></center></h1>
        </div>
        </div>
    </div>
</div> -->



<!-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 doughunt-chart">
    <div class="panel" id="grad1">
        <div class="panel-heading">
            <h3 style="color:#ffffff;font-weight:bold"><center>Team Business</center></h3>

        </div>
        <div class="panel-body dashboard-panel m-t-0">
        <div class="canvas-holder">
          <center><img src="new_icon/cart-outline.png" width="50px" /></center>
		   <br/>
           <h1 style="color:#ffffff;font-weight:bold"><center> <?=$team_bv?></center></h1>
        </div>
        </div>
    </div>
</div> -->

<!-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 doughunt-chart">
    <div class="panel" id="grad4">
        <div class="panel-heading">
            <h3 style="color:#ffffff;font-weight:bold"><center>Referral Income</center></h3>

        </div>
        <div class="panel-body dashboard-panel m-t-0">
        <div class="canvas-holder">
		 <center><img src="new_icon/rupee.png" width="25px" /></center>
		   <br/>
           <h1 style="color:#ffffff;font-weight:bold"><center><?=$roc5[0]?></center></h1>

        </div>
        </div>
    </div>
</div> -->

<!-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 doughunt-chart">
    <div class="panel" id="grad3">
        <div class="panel-heading">
            <h3 style="color:#ffffff;font-weight:bold"><center>Level Income</center></h3>
        </div>
        <div class="panel-body dashboard-panel m-t-0">
        <div class="canvas-holder">
		 <center><img src="new_icon/rupee.png" width="25px" /></center>
		 	   <br/>
           <h1 style="color:#ffffff;font-weight:bold"><center><?=$roc5[1]?></center></h1>
        </div>
        </div>
    </div>
</div> -->




</div>


        <!-- //////////////////////////////////////////////////// Statistics -->


<div class="row" style="background-color:white;">


<!-- //////////////////////////////////////////////////// Polar Chart -->

<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
<div class="panel"  style="border: 2px solid #5290e7;border-radius:5px;">

    <div class="panel-heading"  id="grad5">
        <h3 style="color:#ffffff;font-weight:bold"><center>Welcome Panel</center></h3>
    </div>

    <div class="panel-body dashboard-panel no-padding">
        <div id="line-chart">
	Thanks for choosing <?=$row_sp1[com_name]?></b><br><br>
A warm welcome to recognized & fast growing Group. Now you are a part of our team.<br> <br>

The right decision at the right time, can make the bright path for you & your associates towards happy and prosperous future with status in the society for today and tomorrow.
		</div>



    </div>

</div> <!-- /panel -->
</div>


<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
<div class="panel"  style="border: 2px solid #f1a019;border-radius:5px;">

    <div class="panel-heading" id="grad6">
	        <h3 style="color:#ffffff;font-weight:bold"><center>News Panel</center></h3>




    </div>

    <div class="panel-body dashboard-panel no-padding">
        <div id="line-chart">
		<MARQUEE direction="up" height="238px" onmouseover="this.stop();" onmouseout="this.start();">
<?
$sql42="SELECT * FROM `news`";
$res42=mysqli_query($con,$sql42);
?>
<p class="customQuote">
<?
while($row42=mysqli_fetch_array($res42)){
?>
<b><?=$row42[news]?></b> <br/>
<? }?>
</MARQUEE>

		</div>
    </div>

</div> <!-- /panel -->
</div>









</div>
</div> <!-- /row -->


<!-- //////////////////////////////////////////////////// DashBoard -->

<!-- //////////////////////////////////////////////////// Footer -->
<div class="row">
<footer>
<div id="credits">
<div class="col-xs-12">
<br><br><p><center> Copyright &copy; <?=date("Y")?>  by <?=$row_sp1[com_name]?>. All Rights Reserved.</center></p><br><br>
</div> <!-- /col-sm-12 -->
</div> <!-- /credits -->
</footer> <!-- /footer-->
</div> <!-- /row -->



<!-- /////////////////////////////// Scripts /////////////////////////////// -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Offline jQuery script -->
<!-- <script  type="text/javascript" src="jquery.min"></script>  -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script  type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- Menu Script -->
<script  type="text/javascript" src="js/menu/metisMenu.min.js"></script>
<script type="text/javascript" src="js/menu/nanoscroller.js"></script>
<!-- Custom scripts -->
<script  type="text/javascript" src="js/jquery-functions.js"></script>

</body>


</html>
