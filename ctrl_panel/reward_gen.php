<?php
error_reporting(0);
ob_start();
session_start();
ini_set('memory_limit', '15000000000000M');
ini_set('max_execution_time',30000000000000);
date_default_timezone_set("UTC");

include_once("lib_panel/config.php");





$stdt=$_POST['start_date'];
$endt=$_POST['end_date'];

$ptdt=date("Y-m-d");

$date_diff_1=strtotime($endt)-strtotime($stdt);
$date_diff=$date_diff_1/(24*60*60) + 1;

$end_dttime=$endt." 23:59:59";

if($create_date<$end_dttime){
header("location:gen_reward.php?msg=End Date is not less than correct time.");
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Generate Reward</title>
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

<form action="action_reward1.php" method="post">

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
<th style='font-size:15px;border:1px solid black;text-align:center;font-family: Verdana;'>Reward Details of <?=$stdt?> To <?=$endt?></th>
</tr>


<tr>
<td>
<center>



<table class="table" align="center" cellspacing="0" cellpadding="5" style="font-family: Verdana;width:100%;" id="table2excel">

<tr>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Member ID</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Member Name</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Reward Name</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Reward Date</td>
<!-- <th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Pair</td> -->
</tr>

<? 

unset($_SESSION[stdt]);unset($_SESSION[endt]);unset($_SESSION[ptdt]);unset($_SESSION[spid]);unset($_SESSION[pair_amt]);
unset($_SESSION[td]);unset($_SESSION[sc]);unset($_SESSION[rep_charge]);unset($_SESSION[total_amt]);
unset($_SESSION[deduction_pair]);unset($_SESSION[total_flash_pair]);
unset($_SESSION[total_pair]);unset($_SESSION[total_deductpair]);
unset($_SESSION[dedeuct_pair]);unset($_SESSION[sponsor_amt]);
unset($_SESSION[reward_id]);unset($_SESSION[pair]);

$sel1 = "select * from `member`  WHERE `doj`<='$endt' AND `st`='1' AND `member_status`='1' ORDER BY `memid` ASC";
$res_pay = mysqli_query($con,$sel1);
while($row_pay = mysqli_fetch_array($res_pay)) { 
$c++;

//print $row_pay[spid]; echo "<br>";

unset($leftno);unset($rightno);unset($total_amt);unset($commission_amt);
unset($binary);unset($level);unset($own_collection);unset($down_collection);unset($total_collection);
unset($left_pt);unset($right_pt);unset($final_level);unset($cal_package_id);
unset($total_pair);unset($first_left);unset($first_right);unset($deduct_pair);

$sel_bin_id = "select * FROM `binary_level` where `spid`='$row_pay[spid]'" ;

$res_bin_id = mysqli_query($con,$sel_bin_id) ;
$row_bin_id = mysqli_fetch_array($res_bin_id) ;
$binary = $row_bin_id[binary];
$level = $row_bin_id[level];


$left_pt = $binary."L" ;
$right_pt = $binary."R" ;





$sel_left_calc="Select SUM(pack.points) from `binary_level` as bin,`member` as mat,`package` as pack,`member_topup` as mtop WHERE bin.spid=mat.spid AND bin.binary LIKE '$left_pt%'  AND mat.member_status='1' AND pack.package_id=mtop.package_id AND mtop.spid=mat.spid AND mtop.topup_dt<='$endt' AND mat.binary_chk='1'";
$res_left_calc = mysqli_query($con,$sel_left_calc) ;
$num_left_calc = mysqli_fetch_array($res_left_calc) ;
$leftno=$num_left_calc[0];




$sel_right_calc="Select SUM(pack.points) from `binary_level` as bin,`member` as mat,`package` as pack,`member_topup` as mtop WHERE bin.spid=mat.spid AND bin.binary LIKE '$right_pt%'  AND mat.member_status='1' AND pack.package_id=mtop.package_id AND mtop.spid=mat.spid AND mtop.topup_dt<='$endt' AND mat.binary_chk='1'";
$res_right_calc = mysqli_query($con,$sel_right_calc) ;
$num_right_calc = mysqli_fetch_array($res_right_calc) ;
$rightno=$num_right_calc[0];


if($leftno==""){$leftno=0;}
if($rightno==""){$rightno=0;}




if($leftno>$rightno){
$pair=$rightno;
}
elseif($rightno>$leftno){
$pair=$leftno;
}
elseif($rightno==$leftno){
$pair=$leftno;
}

// print $row_pay[spid];print "&nbsp;";
// print $leftno;print "&nbsp;";print $rightno;print "&nbsp;";
// print $pair;
// print "<br/>";

$sql_search="SELECT * FROM `reward_generation` WHERE `spid`='$row_pay[spid]'  ORDER BY `reward_id` DESC";

$sql_res=mysqli_query($con,$sql_search);
$sql_row=mysqli_fetch_array($sql_res);
$cal_package_id=$sql_row[reward_id]+1;



$msqlt="Select * from `reward_select` WHERE `reward_id`='$cal_package_id'"; 
 // print "<br>";
$mrest=mysqli_query($con,$msqlt);
$mrowt=mysqli_fetch_array($mrest);

if($pair>=$mrowt[pv]){

if($sql_row[prize]!=""){
"Reward..........".$mrowt[prize];


}


?>
<tr>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$row_pay[spid]?></td>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$row_pay['sname']?></td>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$mrowt[prize]?></td>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$endt?></td>
<!-- <td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$pair?></td> -->
</tr>	


<?php
$_SESSION[stdt][]=$stdt;
$_SESSION[endt][]=$endt;
$_SESSION[ptdt][]=$ptdt;
$_SESSION[spid][]=$row_pay[spid];
$_SESSION[reward_id][]=$cal_package_id;
$_SESSION[pair][]=$pair;


?>




<?
unset($cal_package_id);unset($pair);unset($sponsor_commission_total);


}
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
<? 
/*
} 
else {
header("location:generate_reward.php?msg=You can't generate less than 1 month.");
} 
*/
?>


	</body>
</html>

