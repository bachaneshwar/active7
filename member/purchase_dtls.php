<?php
include("include/top.php");
include("include/menu.php");
?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Own Purchase </h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i>TopUp</a></li>
          <li><a href="#" class="active">Own Purchase Details</a></li>
        </ol> <!-- /breadcrumb -->
    </div> <!-- /dashboard -->
</div> <!-- /row -->


<div class="row">

    <!-- //////////////////////////////////////////////////// Responsvie Table Bordered -->
    <div class=" col-xs-12">
        <div class="panel">
            <div class="panel-heading">
                <h3></h3>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <div class="table-responsive">
            <table class="table table-bordered">
            <thead>

           <tr>
<th scope="col" >Sr.</th>
<th scope="col" >Invoice</th>
<th scope="col" >Paid</th>
<th scope="col" >Free</th>
<th scope="col" >PV</th>
<th scope="col" >BV</th>
<th scope="col" >Sell</th>
<th scope="col" >CGST</th>
<th scope="col" >SGST</th>
<th scope="col" >Total</th>
<th scope="col" >Date</th>

</tr>
            </thead>


<?php

$sqls="select * from `member` where `spid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sqls);
$row=mysqli_fetch_array($res);

$sql_direct="SELECT * FROM `sell` as sell,`sell_product` as selprod WHERE sell.customer_id='$row[memid]' AND sell.sell_id=selprod.sell_id  AND sell.st='1' GROUP BY sell.sell_id ORDER BY sell.sell_id DESC";
 $query_direct=mysqli_query($con,$sql_direct);
 while($msgrow=mysqli_fetch_array($query_direct)){


$c8++;


$sqlq="SELECT SUM(`qty`),SUM(`free_qty`),SUM(`total_cgst`),SUM(`total_amt`),SUM(qty*pv),SUM(qty*bv) FROM `sell_product` WHERE `sell_id`='$msgrow[sell_id]'";
$relq=mysqli_query($con,$sqlq);
$rolq=mysqli_fetch_array($relq);


$doj=$msgrow[invoice_dt];
$renewal3=explode("-",$doj);
$renewal4=trim($renewal3[2])."/".trim($renewal3[1])."/".trim($renewal3[0]);

unset($sell_price);
$sell_price=$rolq[3]-($rolq[2]+$rolq[2]);

$final_sell+=$sell_price;
$final_qty+=$rolq[0];
$final_free+=$rolq[1];
$final_cgst+=$rolq[2];
$final_sgst+=$rolq[2];
$final_total+=$rolq[3];

$final_pv+=$rolq[4];
$final_bv+=$rolq[5];
?>
<tr  valign="middle">


<td ><?=$c8?></td>
<td style='font-size:11px'><?=$msgrow[invoice_no]?></td>
<td style='font-size:11px'><?=$rolq[0]?></td>
<td style='font-size:11px'><?=$rolq[1]?></td>
<td style='font-size:11px'><?=$rolq[4]?></td>
<td style='font-size:11px'><?=$rolq[5]?></td>
<td style='font-size:11px'><?=$sell_price?></td>
<td style='font-size:11px'><?=$rolq[2]?></td>
<td style='font-size:11px'><?=$rolq[2]?></td>
<td style='font-size:11px'><?=$rolq[3]?></td>
<td style='font-size:11px'><?=$renewal4?></td>
</tr>
<?php
	}
?>
<tr>
<td  style='font-size:11px'></td>
<td  style='font-size:11px'>Total</td>
<td  style='font-size:11px'><?=$final_qty?></td>
<td  style='font-size:11px'><?=$final_free?></td>
<td  style='font-size:11px'><?=$final_pv?></td>
<td  style='font-size:11px'><?=$final_bv?></td>
<td  style='font-size:11px'><?=$final_sell?></td>
<td  style='font-size:11px'><?=$final_cgst?></td>
<td  style='font-size:11px'><?=$final_sgst?></td>
<td  style='font-size:11px'><?=$final_total?></td>
<td  style='font-size:11px'></td>
</tr>

</table>

            </div> <!-- /table-responsive -->
            </div> <!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<!-- //////////////////////////////////////////////////// Footer -->
<?php include("include/footer.php"); ?>
