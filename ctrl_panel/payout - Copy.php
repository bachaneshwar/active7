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
//$td_amt=$rowlm_1[tds];
//$sc_amt=$rowlm_1[sc];
$binary_amt=($rowlm_1[matchng_income]*2);
$matching_capping = $rowlm_1[matching_capping];

$stdt=$_POST['start_date'];
$endt=$_POST['end_date'];

$ptdt=date("Y-m-d");

$date_diff_1=strtotime($endt)-strtotime($stdt);
$date_diff=$date_diff_1/(24*60*60) + 1;

$prev_date=date("Y-m-d",strtotime(date("Y-m-d", strtotime($endt)) . " +1 day"));  //Every Date

$start_dttime=$stdt." 00:00:00";
$end_dttime=$endt." 23:59:59";

if($create_date<$end_dttime){
header("location:generate_payout.php?msg=End Date is not less than correct time.");
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


<form action="action.php" method="post">

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
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Member ID</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Member Name</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Matching</td>

<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;TDS</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;SC</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Total</td>

</tr>

<? 

unset($_SESSION[stdt]);unset($_SESSION[endt]);unset($_SESSION[ptdt]);unset($_SESSION[spid]);
unset($_SESSION[td]);unset($_SESSION[sc]);unset($_SESSION[total_amt]);unset($_SESSION[pair_amt]);
unset($_SESSION[total_pair]);unset($_SESSION[paid_pair]);
unset($_SESSION[f_l]);unset($_SESSION[f_r]);


$sel1 = "select * from `member`  WHERE `doj`<='$endt' AND `st`='1' AND `member_status`='1' ORDER BY `memid` ASC";
$res_pay = mysqli_query($con,$sel1);
while($row_pay = mysqli_fetch_array($res_pay)) { 
$c++;

unset($td_charge);unset($sc_charge);unset($total_amt);unset($commission_amt);
unset($binary);unset($level);unset($own_collection);unset($down_collection);
unset($left_pt);unset($right_pt);unset($capping_amount);
unset($total_pair);unset($first_left);unset($first_right);unset($msgnum);

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
$first_left=$row_f_pair[left_side]; // Carry Forward Left 
$first_right=$row_f_pair[right_side]; // Carry Forward Right
$total_pair=$row_f_pair[pair]; 

$sre="SELECT * FROM `package` WHERE `package_id`='$row_pay[package_id]'";
$ret=mysqli_query($con,$sre);
$des=mysqli_fetch_array($ret);
$capping_pair=$des[capping];

unset($snum);
$ssq="SELECT * FROM `member` WHERE `sponsorid`='$row_pay[spid]' AND `binary_chk`='1'";
$srq=mysqli_query($con,$ssq);
$snum=mysqli_num_rows($srq);


for($i=0;$i<$date_diff;$i++){

$next_date_diff=date("Y-m-d",strtotime(date("Y-m-d", strtotime($stdt)) . " +".$i."day"));  //Every Date

///////////////////////////////////////////////////////////////////////////////////////////////



$sel_left_calc="Select SUM(pack.points) from `binary_level` as bin,`member` as mat,`package` as pack,`member_topup` as mtop WHERE bin.spid=mat.spid AND bin.binary LIKE '$left_pt%' AND mtop.topup_dt='$next_date_diff'  AND mat.binary_chk='1' AND mat.member_status='1' AND pack.package_id=mtop.package_id AND mtop.spid=mat.spid AND pack.package_type='1'";
$res_left_calc = mysqli_query($con,$sel_left_calc) ;
$num_left_calc = mysqli_fetch_array($res_left_calc) ;
$fleftno1=$num_left_calc[0];

if($fleftno1==""){$fleftno1=0;}



$sel_right_calc="Select SUM(pack.points) from `binary_level` as bin,`member` as mat,`package` as pack,`member_topup` as mtop WHERE bin.spid=mat.spid AND bin.binary LIKE '$right_pt%' AND mtop.topup_dt='$next_date_diff' AND mat.binary_chk='1' AND mat.member_status='1' AND pack.package_id=mtop.package_id AND mtop.spid=mat.spid AND pack.package_type='1'";
$res_right_calc = mysqli_query($con,$sel_right_calc) ;
$num_right_calc = mysqli_fetch_array($res_right_calc) ;
$frightno1=$num_right_calc[0];

if($frightno1==""){$frightno1=0;}


////////////////////////////////////////1:1//////////////////////////////////////////


if(($fleft_1=="") && ($fright_1=="")){
$fleftno=$fleftno1+$first_left;
$frightno=$frightno1+$first_right;
}
else{
$fleftno=$fleftno1+$fleft_1;
$frightno=$frightno1+$fright_1;
unset($fleft_1);unset($fright_1);
}


if($fleftno>0){
if($fleftno>$frightno){
$fleft_1=($fleftno-$frightno);//print " L Remain ".
}
}
if($frightno>0){
if($fleftno<$frightno){
$fright_1=($frightno-$fleftno);//print " R Remain ".
}
}

if($snum>=3){
if($fleftno>0 && $frightno>0){
if($fleftno>$frightno){
$fpair=$frightno;
}
elseif($fleftno<$frightno){
$fpair=$fleftno;
}
elseif($fleftno==$frightno){
$fpair=$fleftno;
}
}
else{
$fpair=0;
$fleft_1=$fleftno;
$fright_1=$frightno;
}
}
else{
$fpair=0;
$fleft_1=$fleftno;
$fright_1=$frightno;
}


if($fpair==""){
$paid_pair=0;
}else{ 
$paid_pair=$fpair; 
}



/////////////////////////////////////////////////////////////

//capping_pair
if($paid_pair>=$capping_pair){
$paid_pair=$capping_pair;
}else{
$paid_pair=$paid_pair;
}

$pair_amt1 = ($paid_pair*$binary_amt); 
$pair_amt+=$pair_amt1;

if($pair_amt1>0){
if($snum>=3){

if($fleftno>$frightno){
$fleft_1=($fleftno-$paid_pair);
$fright_1=0;
}
else{
$fleft_1=0;
$fright_1=($frightno-$paid_pair);
}


}
}




/////////////////////Carry Forward////////////////////////

if($fleft_1==""){
$fleft_1=0;
}else{
$fleft_1=$fleft_1;
}

if($fright_1==""){
$fright_1=0;
}else{
$fright_1=$fright_1;
}

/////////////////////Carry Forward////////////////////////


/*
print $fleftno1;print "&nbsp;";
print $frightno1;print "&nbsp;";
print $fleftno;print "&nbsp;";
print $frightno;print "&nbsp;";
print $paid_pair;print "&nbsp;";
print $pair_amt1;print "&nbsp;";

print " CL ".$fleft_1;
print " CR ".$fright_1;
print "&nbsp;";
print "<br/>";
*/

$total_final_pair+=$paid_pair;

/////////////////////////////////////////////////////

unset($fleftno1);unset($frightno1);unset($pair_amt1);unset($leader_ship);
unset($fleftno);unset($frightno);unset($fpair_count);unset($f_p);
unset($paid_pair);unset($fpair);unset($ftotal_pair);unset($first_left);unset($first_right);

}

//print $total_final_pair;

/*
print " FCL ".$fleft_1;
print " FCR ".$fright_1;
print "&nbsp;";
*/

$final_pair=($total_final_pair+$total_pair);

/*
print $row_pay['spid'];
print "<br/>";
*/

////////////////////////////////////////////////////////////////////////////////////////////////////

$commission_amt=$pair_amt;

//$td_charge=round(($commission_amt*$td_amt)/100);
//$sc_charge=round(($commission_amt*$sc_amt)/100);

$total_amt=round($commission_amt-($td_charge+$sc_charge));


if($pair_amt>0){
?>
<tr>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$row_pay['spid']?></td>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$row_pay['sname']?></td>
<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$pair_amt?></td>

<td style='font-size:14px;border:1px solid black;'>&nbsp;<?=$td_charge?></td>
<td style='font-size:14px;border:1px solid black;'>&nbsp;<?=$sc_charge?></td>

<td style='font-size:14px;border:1px solid black;'>&nbsp;<?=$total_amt?></td>
</tr>	


<?php
}

$_SESSION[stdt][]=$stdt;
$_SESSION[endt][]=$endt;
$_SESSION[ptdt][]=$today_date;
$_SESSION[spid][]=$row_pay[spid];
$_SESSION[td][]=$td_charge;
$_SESSION[sc][]=$sc_charge;
$_SESSION[total_amt][]=$total_amt;
$_SESSION[pair_amt][]=$pair_amt;
$_SESSION[total_pair][]=$final_pair;
$_SESSION[paid_pair][]=$total_final_pair;

$_SESSION[f_l][]=$fleft_1;
$_SESSION[f_r][]=$fright_1;
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

