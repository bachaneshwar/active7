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
header("location:generate_payout1.php?msg=End Date is not less than correct time.");
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Generate Payout</title>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
     
		


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


<form action="second_action.php" method="post">

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
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Commission</td>

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
unset($_SESSION[dedeuct_pair]);unset($_SESSION[one_india_income]);

$sel1 = "select * from `global_tree`  WHERE `join_day`<='$endt' AND `st`='1' ORDER BY `global_tree_id` ASC";
$res_pay = mysqli_query($con,$sel1);
while($row_pay = mysqli_fetch_array($res_pay)) { 
$c++;

unset($td_charge);unset($sc_charge);unset($total_amt);unset($commission_amt);
unset($binary);unset($level);unset($one_india_income);unset($down_collection);unset($total_collection);
unset($left_pt);unset($right_pt);unset($present_amt);
unset($total_pair);unset($first_left);unset($first_right);unset($final_level);
unset($num_direct);unset($num_direct1);unset($num_direct2);

$sel_bin_id = "select * FROM `global_tree` where `spid`='$row_pay[spid]'" ;
$res_bin_id = mysqli_query($con,$sel_bin_id) ;
$row_bin_id = mysqli_fetch_array($res_bin_id) ;
$binary = $row_bin_id[binary];
$level = $row_bin_id[level];

$left_pt = $binary."L" ;
$right_pt = $binary."R" ;
$final_level = ($row_bin_id[level]+$rowlm_1[global_tree_level]);


$sqlpair="SELECT * FROM `member` WHERE `spid`='$row_pay[spid]'";
$respair=mysqli_query($con,$sqlpair);
$rowpair=mysqli_fetch_array($respair);



$sql_direct1 = "SELECT * FROM `global_tree` WHERE `join_day`>='$stdt' AND `join_day`<='$endt' AND `binary` LIKE '$left_pt%' AND `level`<='$final_level'"; 
$res_direct1 = mysqli_query($con,$sql_direct1);
$num_direct1 = mysqli_num_rows($res_direct1);

$sql_direct2 = "SELECT * FROM `global_tree` WHERE `join_day`>='$stdt' AND `join_day`<='$endt' AND `binary` LIKE '$right_pt%' AND `level`<='$final_level'"; 
$res_direct2 = mysqli_query($con,$sql_direct2);
$num_direct2 = mysqli_num_rows($res_direct2);

$num_direct=($num_direct1+$num_direct2);

$one_india_income=($num_direct*$rowlm_1[global_tree_income]);

if($one_india_income==""){$one_india_income=0;}


////////////////////////////////////////////////////////////////////////////////////////////////////

$commission_amt=$one_india_income;

$td_charge=round(($commission_amt*$td_amt)/100);
$sc_charge=round(($commission_amt*$sc_amt)/100);

$total_amt=round($commission_amt-($td_charge+$sc_charge));



?>
<tr>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$row_pay['spid']?></td>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$rowpair['sname']?></td>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$one_india_income?></td>
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
$_SESSION[one_india_income][]=$one_india_income;
$_SESSION[f_l][]=$fleft_1;
$_SESSION[f_r][]=$fright_1;
?>




<?
unset($total_final_pair1_1);unset($sponsor_commission);unset($one_india_income);

unset($commission_amt);unset($total_amt);unset($td);unset($sc);
unset($fright_1);unset($fleft_1);unset($total_paid_pair);
unset($total_final_pair);
unset($ftotal_pair);unset($total_pair);unset($total_full_pair);unset($pair_amt);
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

