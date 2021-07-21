<?php
error_reporting(0);
ob_start();
session_start();
ini_set('memory_limit', '15000000000000M');
ini_set('max_execution_time',30000000000000);
date_default_timezone_set("UTC");

include_once("lib_panel/config.php");



$sqlm_1="SELECT * FROM `amount_rate`";
$reslm_1=mysqli_query($con,$sqlm_1);
$rowlm_1=mysqli_fetch_array($reslm_1);
$td_amt=$rowlm_1[tds];
$sc_amt=$rowlm_1[sc];


$stdt=$_POST['start_date'];
$endt=$_POST['end_date'];

$ptdt=date("Y-m-d");

$date_diff_1=strtotime($endt)-strtotime($stdt);
$date_diff=$date_diff_1/(24*60*60) + 1;



if($ptdt<=$endt){
header("location:generate_payout3.php?msg=End Date is not less than correct time.");
}



?>

<!DOCTYPE html>
<html>
	<head>
		<title>Generate Payout</title>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="jquery.table2excel.js"></script>
		
		<link href="./Welcome Letter_files/thm-christmas.min.css" rel="stylesheet" type="text/css">

<script type="text/javascript">
function reloadPage()
{
location.reload()
}
</script>




		
<style type="text/css">
#tbLetter{font-family:Arial;font-size:11px}
</style>

	</head>
<body style="background: #fff">


<form action="repurchase_action.php" method="post">

<table cellspacing="0" cellpadding="2" border="0" width="100%">
<tbody>

<tr>
<td><br>
<center>
<INPUT TYPE="submit" value="Submit" name="paysub" style="width:100px;height:30px;font-size:15px" onclick="this.disabled=true;this.value='Please wait';this.form.submit();">
</center>
<br>
</td>
</tr>



<tr>
<th style='font-size:15px;border:1px solid black;text-align:center;font-family: Verdana;'>Payout Details of <?=$stdt?> To <?=$endt?></th>
</tr>



<tr>
<td>
<center>



<table class="table" align="center" cellspacing="0" cellpadding="5" style="font-family: Verdana;width:100%;" id="table2excel">

<tr>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Member ID</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Member Name</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Own Commission</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Dowline Commission</td>

<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;TDS</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;SC</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Total</td>

</tr>

<? 

unset($_SESSION[stdt]);unset($_SESSION[endt]);unset($_SESSION[ptdt]);unset($_SESSION[spid]);unset($_SESSION[pair_amt]);
unset($_SESSION[td]);unset($_SESSION[sc]);unset($_SESSION[rep_charge]);unset($_SESSION[total_amt]);
unset($_SESSION[deduction_pair]);unset($_SESSION[total_flash_pair]);
unset($_SESSION[total_pair]);unset($_SESSION[total_deductpair]);
unset($_SESSION[f_l]);unset($_SESSION[f_r]);unset($_SESSION[self_income]);
unset($_SESSION[final_deduct]);unset($_SESSION[self_commission]);unset($_SESSION[downline_commission]);

$sel1 = "select * from `member`  WHERE `doj`<='$endt' AND `st`='1' AND `member_status`='1' ORDER BY `memid` ASC";
$res_pay = mysqli_query($con,$sel1);
while($row_pay = mysqli_fetch_array($res_pay)) { 
$c++;

unset($td_charge);unset($sc_charge);unset($total_amt);unset($commission_amt);
unset($binary);unset($level);unset($own_collection);unset($down_collection);unset($total_collection);
unset($left_pt);unset($right_pt);unset($final_level);
unset($total_pair);unset($first_left);unset($first_right);unset($deduct_pair);

$sel_bin_id = "select * FROM `binary_level` where `spid`='$row_pay[spid]'" ;
$res_bin_id = mysqli_query($con,$sel_bin_id) ;
$row_bin_id = mysqli_fetch_array($res_bin_id) ;
$binary = $row_bin_id[binary];
$level = $row_bin_id[level];
$final_level = $level+20;
$left_pt = $binary."L" ;
$right_pt = $binary."R" ;


/////////////////////////////////referel amount calculation start///////////////////////////////
//$row_pay[spid]; 


$self_sql ="Select * from `repurchase_package` as pack,`repurchase_details` as mtop WHERE mtop.purchase_dt>='$stdt' AND mtop.purchase_dt<='$endt' AND mtop.spid='$row_pay[spid]' AND pack.repurchase_package_id=mtop.repurchase_package_id  GROUP BY mtop.rep_detid";
$res_sql = mysqli_query($con,$self_sql) ;
$row_num = mysqli_num_rows($res_sql) ;
if($row_num>0){
while($row_sql=mysqli_fetch_array($res_sql)){

$msql1="SELECT * FROM `repurchase_package` WHERE `repurchase_package_id`='$row_sql[repurchase_package_id]'";
$mres1=mysqli_query($con,$msql1) ;
$mrow1=mysqli_fetch_array($mres1) ;

$package_amt=($mrow1[dp_rate]*$row_sql[package_no]);
$self_commission1=round(($package_amt*$rowlm_1[own_repurchase])/100);

$self_commission+=$self_commission1;
unset($self_commission1);
}
}


if($self_commission==""){$self_commission=0;}

/////////////////////////////////referel amount calculation end///////////////////////////////


unset($first_row_left_calc);unset($frightno12);

$first_sel_left_calc="Select * from `binary_level` as bin,`member` as mat,`repurchase_package` as pack,`repurchase_details` as mtop WHERE bin.spid=mat.spid AND bin.binary LIKE '$binary%' AND mtop.purchase_dt>='$stdt' AND mtop.purchase_dt<='$endt' AND mtop.spid=mat.spid AND pack.repurchase_package_id=mtop.repurchase_package_id AND bin.level<='$final_level' AND mat.spid!='$row_pay[spid]' GROUP BY mtop.rep_detid";
$first_res_left_calc = mysqli_query($con,$first_sel_left_calc) ;
$first_num_left_calc = mysqli_num_rows($first_res_left_calc) ;
if($first_num_left_calc>0){
while($first_row_left_calc=mysqli_fetch_array($first_res_left_calc)){

unset($current_level);unset($package_commission);unset($package_amt);
$current_level=$first_row_left_calc[level]-$level;

if($current_level>0){

unset($mrow);
$msql="SELECT * FROM `level_plan` WHERE `level_id`='$current_level'";
$mres=mysqli_query($con,$msql) ;
$mrow=mysqli_fetch_array($mres) ;

$msql1="SELECT * FROM `repurchase_package` WHERE `repurchase_package_id`='$first_row_left_calc[repurchase_package_id]'";
$mres1=mysqli_query($con,$msql1) ;
$mrow1=mysqli_fetch_array($mres1) ;

$package_amt=($mrow1[dp_rate]*$first_row_left_calc[package_no]);
$package_commission=round(($package_amt*$mrow[percent])/100);

$repurchase_commission+=$package_commission;

}
}
}



if($repurchase_commission==""){$repurchase_commission=0;}

////////////////////////////////////////////////////////////////////////////////////////////////////

$commission_amt=$self_commission+$repurchase_commission;

$td_charge=round(($commission_amt*$td_amt)/100);
$sc_charge=round(($commission_amt*$sc_amt)/100);

$total_amt=round($commission_amt-($td_charge+$sc_charge));



?>
<tr>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$row_pay['spid']?></td>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$row_pay['sname']?></td>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$self_commission?></td>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$repurchase_commission?></td>

<td style='font-size:14px;border:1px solid black;'>&nbsp;<?=$td_charge?></td>
<td style='font-size:14px;border:1px solid black;'>&nbsp;<?=$sc_charge?></td>

<td style='font-size:14px;border:1px solid black;'>&nbsp;<?=$total_amt?></td>
</tr>	


<?php
$_SESSION[stdt][]=$stdt;
$_SESSION[endt][]=$endt;
$_SESSION[ptdt][]=$today_date;
$_SESSION[spid][]=$row_pay[spid];
$_SESSION[td][]=$td_charge;
$_SESSION[sc][]=$sc_charge;
$_SESSION[total_amt][]=$total_amt;
$_SESSION[self_commission][]=$self_commission;
$_SESSION[downline_commission][]=$repurchase_commission;


?>




<?
unset($total_final_deduct);unset($self_commission);unset($repurchase_commission);

unset($commission_amt);unset($total_amt);unset($td);unset($sc);
unset($fright_1);unset($fleft_1);unset($total_paid_pair);
unset($total_final_pair);
unset($ftotal_pair);unset($total_pair);unset($pair_amt);
}

?>





</table>



</center>

</td>
</tr>


<tr><td>&nbsp; <br/></td></tr>

<input type="hidden" name="user_id" value="<?=$_SESSION['employee_id']?>" />




</tbody>
</table>

</form>


	</body>
</html>

