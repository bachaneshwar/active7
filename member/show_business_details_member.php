<?php
session_start();
error_reporting(0);
include("include/top.php");
include("include/menu.php");

?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Inbox</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Messages</a></li>
          <li><a href="#" class="active">Inbox</a></li>
        </ol> <!-- /breadcrumb -->
    </div> <!-- /dashboard -->
</div> <!-- /row -->


<div class="row">

    <!-- //////////////////////////////////////////////////// Responsvie Table Bordered -->
    <div class=" col-xs-12">
        <div class="panel">
            <div class="panel-heading">
                <h3>Inbox</h3>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <div class="table-responsive">
            <table class="table table-bordered">
            <thead>

           <tr>
             <tr>
             <th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Member ID</td>
             <th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Member Name</td>
             <!--
             <th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Direct</td>
             <th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Indirect</td>
             <th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Laps</td>
             -->
             <th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Total downline pv</td>

             <th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Total PPV</td>
             <th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Total TNPV</td>
             <th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;current downline pv</td>
             <th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;current PPV</td>
               <th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;current TNPV</td>

             </tr>


        </tr>
            </thead>

            <?
            $stdt=$_POST['start_date'];
            $endt=$_POST['end_date'];

            $ptdt=date("Y-m-d");
              // PRINT "  SPID=".$_SESSION[spid];
              $ss=$_SESSION[spid];
            unset($_SESSION[stdt]);unset($_SESSION[endt]);unset($_SESSION[ptdt]);unset($_SESSION[spid]);unset($_SESSION[pair_amt]);
            unset($_SESSION[td]);unset($_SESSION[sc]);unset($_SESSION[rep_charge]);unset($_SESSION[total_amt]);
            unset($_SESSION[direct_bonus]);unset($_SESSION[indirect_bonus]);unset($_SESSION[laps_income]);

             $sel1 = "select * from `member`  WHERE `doj`<='$endt' AND `st`='1' AND `member_status`='1' and `spid`='$ss'";
            $res_pay = mysqli_query($con,$sel1);
            while($row_pay = mysqli_fetch_array($res_pay)) {
            $c++;
              //print "<br> spid=".$row_pay[spid];
            unset($binary);unset($level);
            unset($previous_amt);unset($personal_bv);unset($remain_bv);unset($previous_bv);unset($previous_pv);unset($calculate_bv);
            unset($rank_id);unset($rank_dtls);unset($nxt_rank);unset($nrank_dtls);
            unset($down_red);unset($downr_num);unset($personal_pv1);unset($self);unset($personal_pv2);unset($self2);

             $sel_bin_id = "select * FROM `binary_level` where `spid`='$row_pay[spid]'" ;
            $res_bin_id = mysqli_query($con,$sel_bin_id) ;
            $row_bin_id = mysqli_fetch_array($res_bin_id) ;
            // print " binary=".
            $binary     = $row_bin_id[binary];
            // print " level=".
            $level      = $row_bin_id[level];

            ////////////self///////////////
            $sql_direct1="SELECT SUM(selprod.qty*selprod.pv) FROM `sell` as sell,`sell_product` as selprod WHERE sell.customer_id='$row_pay[memid]' AND sell.sell_id=selprod.sell_id  AND sell.st='1'";
            $query_direct1=mysqli_query($con,$sql_direct1);
            $row_direct1=mysqli_fetch_array($query_direct1);
            $personal_pv1=$row_direct1[0];
             // print "self=".
             $self=$self+$personal_pv1;

            $sql_direct12="SELECT SUM(selprod.qty*selprod.pv) FROM `sell` as sell,`sell_product` as selprod WHERE sell.customer_id='$row_pay[memid]' AND sell.invoice_dt>='$stdt' AND sell.invoice_dt<='$endt' AND sell.sell_id=selprod.sell_id  AND sell.st='1'";
            $query_direct12=mysqli_query($con,$sql_direct12);
            $row_direct12=mysqli_fetch_array($query_direct12);
            $personal_pv12=$row_direct12[0];
            //print "self with date=".
            $self2=$self2+$personal_pv12;

            ////////////Downline/////////
            unset($personal_pv);unset($personal_bv);unset($p);unset($p1);
             $vsql2="SELECT * FROM `binary_level` WHERE `binary` LIKE '$binary%' AND `level`>'$level'  ORDER BY `level` ASC";
            $vres2=mysqli_query($con,$vsql2);
            while($vrow2=mysqli_fetch_array($vres2))
            {
            $ch++;
            // print " ch=".$ch;

            $sqll="select * from `member` where `spid`='$vrow2[spid]' ";
            $res=mysqli_query($con,$sqll);
            $row=mysqli_fetch_array($res);

            unset($personal_pv);unset($personal_bv);
             $sql_direct="SELECT SUM(selprod.qty*selprod.pv) FROM `sell` as sell,`sell_product` as selprod WHERE sell.customer_id='$row[memid]'  AND sell.sell_id=selprod.sell_id  AND sell.st='1'";
             $query_direct=mysqli_query($con,$sql_direct);
             $row_direct=mysqli_fetch_array($query_direct);
            $personal_pv=$row_direct[0];
                $p=$p+$personal_pv;
             $sql_direct123="SELECT SUM(selprod.qty*selprod.pv) FROM `sell` as sell,`sell_product` as selprod WHERE sell.customer_id='$row[memid]' AND sell.invoice_dt>='$stdt' AND sell.invoice_dt<='$endt' AND sell.sell_id=selprod.sell_id  AND sell.st='1'";
             $query_direct123=mysqli_query($con,$sql_direct123);
             $row_direct123=mysqli_fetch_array($query_direct123);
             $personal_bv123=$row_direct123[0];
              $p1=$p1+$personal_bv123;
            }
            // print " tnpv=".$p;
            // print " tnpv with time=".$p1;
            if($p==""){$p=0;}
            if($p1==""){$p1=0;}
            if($self==""){$self=0;}
            if($self2==""){$self2=0;}

             ?>






            <tr>
            <td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$row_pay['spid']?></td>
            <td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$row_pay['sname']?></td>

            <td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$p?></td>
            <td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$self?></td>
            <td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$self+$p?></td>
            <td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$p1?></td>

            <td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$self2?></td>
            <td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$self2+$p1?></td>
            <!-- <td style='font-size:14px;border:1px solid black;'>&nbsp;<?=$td_charge?></td>
            <td style='font-size:14px;border:1px solid black;'>&nbsp;<?=$sc_charge?></td>

            <td style='font-size:14px;border:1px solid black;'>&nbsp;<?=$total_amt?></td> -->
            </tr>
<?}?>
		  </table>
		  </div> <!-- /table-responsive -->
            </div> <!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<!-- //////////////////////////////////////////////////// Footer -->
<?php include("include/footer.php"); ?>
