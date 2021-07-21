<?php
error_reporting(0);
ob_start();
session_start();
ini_set('memory_limit', '1500000000M');
ini_set('max_execution_time',3000000000);
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
$date_diff=$date_diff_1/(24*60*60)+1 ;

if($date_diff>=58){
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

<form action="reward_action.php" method="post">

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
<!--<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Left : Right</td>-->
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Reward Amount</td>

</tr>

<? 

unset($_SESSION[stdt]);unset($_SESSION[endt]);unset($_SESSION[ptdt]);unset($_SESSION[spid]);unset($_SESSION[reward_amt]);
unset($_SESSION[t_l]);unset($_SESSION[t_r]);unset($_SESSION[f_l]);unset($_SESSION[f_r]);
unset($_SESSION[total_pair]);unset($_SESSION[reward_id]);

$sel1 = "select * from `member`  WHERE `doj`<='$endt' AND `st`='1'";
$res_pay = mysqli_query($con,$sel1);
while($row_pay = mysqli_fetch_array($res_pay)) { 
$c++;

unset($td_charge);unset($sc_charge);unset($reward_id);unset($reward_amt);
unset($binary);unset($level);unset($vrow1);unset($vrow2);
unset($leftno);unset($rightno);unset($pair);
unset($left_pt);unset($right_pt);unset($first_left);unset($first_right);
unset($left_1);unset($right_1);unset($reward_amt);

$sel_bin_id = "select * FROM `binary_level` where `spid`='$row_pay[spid]'" ;
$res_bin_id = mysqli_query($con,$sel_bin_id) ;
$row_bin_id = mysqli_fetch_array($res_bin_id) ;
$binary = $row_bin_id[binary];
$level = $row_bin_id[level];
$left_pt = $binary."L" ;
$right_pt = $binary."R" ;

$sql_f_pair="SELECT * FROM `memberpair` WHERE `spid`='$row_pay[spid]'";
$res_f_pair=mysqli_query($con,$sql_f_pair);
$row_f_pair=mysqli_fetch_array($res_f_pair);

$first_left=$row_f_pair[left_side];  // Carry Forward Left
$first_right=$row_f_pair[right_side]; // Carry Forward Right

/*
$msgsql1="select SUM(area.point) from `plot_booking` as pbk,`binary_level` as bin,`emi_payment` as emi,`area` as area,`plot` as plot WHERE  emi.plot_bkId=pbk.plot_bkId AND pbk.spid=bin.spid AND bin.binary LIKE '$left_pt%' AND pbk.status='1' AND emi.status='1' AND emi.chq_status='1' AND emi.approve_dt>='$stdt' AND emi.approve_dt<='$endt' AND emi.approve_dt!='0000-00-00' AND plot.plot_id=pbk.plot_id AND area.area_id=plot.area_id AND emi.emi='0'";
$msgres1=mysqli_query($con,$msgsql1);
$vrow1=mysqli_fetch_array($msgres1);

$msgsql2="select SUM(area.point) from `plot_booking` as pbk,`binary_level` as bin,`emi_payment` as emi,`area` as area,`plot` as plot WHERE  emi.plot_bkId=pbk.plot_bkId AND pbk.spid=bin.spid AND bin.binary LIKE '$right_pt%' AND pbk.status='1' AND emi.status='1' AND emi.chq_status='1' AND emi.approve_dt>='$stdt' AND emi.approve_dt<='$endt' AND emi.approve_dt!='0000-00-00' AND plot.plot_id=pbk.plot_id AND area.area_id=plot.area_id AND emi.emi='0'";
$msgres2=mysqli_query($con,$msgsql2);
$vrow2=mysqli_fetch_array($msgres2);
*/

$msgsql1="select SUM(area.point) from `plot_booking` as pbk,`binary_level` as bin,`emi_payment` as emi,`area` as area,`plot` as plot WHERE  emi.plot_bkId=pbk.plot_bkId AND pbk.spid=bin.spid AND bin.binary LIKE '$left_pt%' AND pbk.status='1' AND emi.status='1' AND emi.chq_status='1' AND emi.payment_dt>='$stdt' AND emi.payment_dt<='$endt' AND emi.approve_dt!='0000-00-00' AND plot.plot_id=pbk.plot_id AND area.area_id=plot.area_id AND emi.emi='0'";
$msgres1=mysqli_query($con,$msgsql1);
$vrow1=mysqli_fetch_array($msgres1);


$msgsql2="select SUM(area.point) from `plot_booking` as pbk,`binary_level` as bin,`emi_payment` as emi,`area` as area,`plot` as plot WHERE  emi.plot_bkId=pbk.plot_bkId AND pbk.spid=bin.spid AND bin.binary LIKE '$right_pt%' AND pbk.status='1' AND emi.status='1' AND emi.chq_status='1' AND emi.payment_dt>='$stdt' AND emi.payment_dt<='$endt' AND emi.approve_dt!='0000-00-00' AND plot.plot_id=pbk.plot_id AND area.area_id=plot.area_id AND emi.emi='0'";
$msgres2=mysqli_query($con,$msgsql2);
$vrow2=mysqli_fetch_array($msgres2);



$leftno=$vrow1[0]+$first_left;
$rightno=$vrow2[0]+$first_right;

if($rightno>0.5 && $leftno>0.5){
if($leftno>$rightno){
$left_1=($leftno-$rightno);//print " L Remain ".
}
if($leftno<$rightno){
$right_1=($rightno-$leftno);//print " R Remain ".
}
}else{
$left_1=$leftno;
$right_1=$rightno;
}



if($rightno>0.5 && $leftno>0.5){
if($rightno>$rightno){
$pair=$rightno;
}
elseif($rightno<$rightno){
$pair=$rightno;
}
elseif($rightno==$rightno){
$pair=$rightno;
}
}else{
$pair=0;
}

if($leftno==""){$leftno=0;}
if($rightno==""){$rightno=0;}
if($left_1==""){$left_1=0;}
if($right_1==""){$right_1=0;}
if($pair==""){$pair=0;}


$sqlc="SELECT * FROM `rewards` WHERE `pair`<='$pair' ORDER BY `reward_id` DESC LIMIT 1";
$resc=mysqli_query($con,$sqlc);
$rowc=mysqli_fetch_array($resc);
$reward_amt=$rowc[monthly];


if($reward_amt==""){$reward_amt=0;}

if($reward_amt==0){$pair=0;}

?>
<tr>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$row_pay['spid']?></td>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$row_pay['sname']?></td>
<!--td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$leftno?> : <?=$rightno?> = <?=$left_1?> : <?=$right_1?></td>-->
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$reward_amt?></td>
</tr>	


<?php
$_SESSION[stdt][]=$stdt;
$_SESSION[endt][]=$endt;
$_SESSION[ptdt][]=$today_date;
$_SESSION[spid][]=$row_pay[spid];
$_SESSION[f_l][]=$left_1;
$_SESSION[f_r][]=$right_1;
$_SESSION[total_pair][]=$pair;
$_SESSION[t_l][]=$leftno;
$_SESSION[t_r][]=$rightno;

$_SESSION[reward_id][]=$rowc[reward_id];
$_SESSION[reward_amt][]=$reward_amt;

?>



<?}?>





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
} 
else {
header("location:generate_reward.php?msg=You can't generate less than 2 monthes.");
} 
?>


	</body>
</html>

