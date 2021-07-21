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

$prev_date=date("Y-m-d",strtotime(date("Y-m-d", strtotime($endt)) . " +1 day"));  //Every Date

$start_dttime=$stdt." 00:00:00";
$end_dttime=$endt." 23:59:59";

if($create_date<$end_dttime){
header("location:generate_sales_payout.php?msg=End Date is not less than correct time.");
}



?>

<!DOCTYPE html>
<html>
	<head>
		<title>Generate Payout</title>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    
		
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


<form action="rank_action.php" method="post">

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
<th style='font-size:15px;border:1px solid black;text-align:center;font-family: Verdana;'>Payout Details of <?=$start_dttime?> To <?=$end_dttime?></th>
</tr>



<tr>
<td>
<center>



<table class="table" align="center" cellspacing="0" cellpadding="5" style="font-family: Verdana;width:100%;" id="table2excel">

<tr>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Agent ID</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Agent Name</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Gr Collect.</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Salary</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Commission</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Above Comm.</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Direct</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;TDS</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;SC</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Total</td>

</tr>

<? 

unset($_SESSION[stdt]);unset($_SESSION[endt]);unset($_SESSION[ptdt]);unset($_SESSION[agent_code]);
unset($_SESSION[td]);unset($_SESSION[sc]);unset($_SESSION[total_amt]);unset($_SESSION[pair_amt]);
unset($_SESSION[team_business]);unset($_SESSION[salary]);unset($_SESSION[target_comm]);unset($_SESSION[above_comm]);unset($_SESSION[direct]);




$sel1 = "select * from `sales_agent`  WHERE `doj`<='$endt' AND `st`='1' AND `member_status`='1' ORDER BY `agent_id` ASC";
$res_pay = mysqli_query($con,$sel1);
while($row_pay = mysqli_fetch_array($res_pay)) { 
$c++;

unset($td_charge);unset($sc_charge);unset($total_amt);unset($commission_amt);
unset($salary);unset($target_comm);unset($above_comm);unset($direct);
unset($team_business);unset($down_business);unset($direct_business);

$arow=$my->total_row($con,sales_rank,sales_rank_id,$row_pay[sales_rank_id]);


///////////////////////////////////////////////////////////////////////

$msgsql="select SUM(`business_amount`) from `sales_business` WHERE `entry_dt`>='$_REQUEST[start_date]' AND `entry_dt`<='$_REQUEST[end_date]' AND `agent_code`='$row_pay[agent_code]' AND `payout_id`='0'";
$msgres=mysqli_query($con,$msgsql);
$msgrow=mysqli_fetch_array($msgres);
$direct_business=$msgrow[0];

if($direct_business==""){$direct_business=0;}

$vsql2="SELECT * FROM `sales_agent` WHERE `agent_bianry` LIKE '$row_pay[agent_bianry]%' AND `agent_level`>'$row_pay[agent_level]' ORDER BY `agent_level` ASC";
$vres2=mysqli_query($con,$vsql2);
while($vrow2=mysqli_fetch_array($vres2))
{

$msgsql1="select SUM(`business_amount`) from `sales_business` WHERE `entry_dt`>='$_REQUEST[start_date]' AND `entry_dt`<='$_REQUEST[end_date]' AND `agent_code`='$vrow2[agent_code]' AND `payout_id`='0'";
$msgres1=mysqli_query($con,$msgsql1);
$msgrow1=mysqli_fetch_array($msgres1);

$down_business+=$msgrow1[0];

}

if($down_business==""){$down_business=0;}
$team_business=($direct_business+$down_business);

////////////////////////////////////////////////////////////////////////////////////////////////////

$direct=round(($direct_business*$arow[direct_percent])/100);

if($team_business>=$arow[target]){
$salary=$arow[salary];
}else{
$salary=0;
}

if($team_business>=$arow[target]){

$remain_business=($team_business-$arow[target]);
if($remain_business<0){$remain_business=0;}

$target_comm=round(($arow[target]*$arow[target_percent])/100);
$above_comm=round(($remain_business*$arow[above_percent])/100);
}else{
$above_comm=0;
$target_comm=round(($team_business*$arow[below_percent])/100);
}


//////////////////////////////////////////////////////////////////////////////////////////////////

if($salary==""){$salary=0;}
if($target_comm==""){$target_comm=0;}
if($above_comm==""){$above_comm=0;}
if($direct==""){$direct=0;}

$commission_amt=$salary+$target_comm+$above_comm+$direct;



$td_charge=round(($commission_amt*$td_amt)/100);
$sc_charge=round(($commission_amt*$sc_amt)/100);

$total_amt=round($commission_amt-($td_charge+$sc_charge));



?>
<tr>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$row_pay['agent_code']?></td>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$row_pay['sname']?></td>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$team_business?></td>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$salary?></td>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$target_comm?></td>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$above_comm?></td>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$direct?></td>

<td style='font-size:14px;border:1px solid black;'>&nbsp;<?=$td_charge?></td>
<td style='font-size:14px;border:1px solid black;'>&nbsp;<?=$sc_charge?></td>

<td style='font-size:14px;border:1px solid black;'>&nbsp;<?=$total_amt?></td>
</tr>	


<?php
$_SESSION[stdt][]=$stdt;
$_SESSION[endt][]=$endt;
$_SESSION[ptdt][]=$today_date;
$_SESSION[agent_code][]=$row_pay[agent_code];
$_SESSION[td][]=$td_charge;
$_SESSION[sc][]=$sc_charge;
$_SESSION[total_amt][]=$total_amt;

$_SESSION[team_business][]=$team_business;
$_SESSION[salary][]=$salary;
$_SESSION[target_comm][]=$target_comm;
$_SESSION[above_comm][]=$above_comm;
$_SESSION[direct][]=$direct;

?>



<?
unset($commission_amt);unset($total_amt);unset($td);unset($sc);
unset($fright_1);unset($fleft_1);unset($final_pair);
unset($total_final_pair);unset($total_pair);unset($pair_amt);

}

?>





</table>



</center>

</td>
</tr>


<tr><td>&nbsp; <br/></td></tr>





</tbody>
</table>

</form>


	</body>
</html>

