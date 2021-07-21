<?php
ob_start();
error_reporting(0);
session_start();
include_once("lib_panel/config.php");
include("include/loginchk.php");

ini_set('memory_limit', '1500000000M');
ini_set('max_execution_time',3000000000);
date_default_timezone_set("UTC");


if(time() - $_SESSION['timestamp'] > 3600) { //subtract new timestamp from the old one

echo "<script>alert('30 minutes over');</script>";
unset($_SESSION[indi_cpanel]);
unset($_SESSION[login_type]);
unset($_SESSION[userid]);
unset($_SESSION[employee_id]);
unset($_SESSION[timestamp]);
session_destroy();
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?msg=Login First">';		 
exit;
} else {
$_SESSION['timestamp'] = time(); //set new timestamp
}


if($_SESSION[login_type]=="Employee"){
if($log_url!="dashboard.php"){
$vsqlnum="SELECT * FROM `sublink` as sln,`authenticate_status` as auth WHERE auth.sublink_id=sln.sublink_id AND auth.employee_id='$_SESSION[employee_id]' AND auth.authen_status='1' AND sln.sublink_id='$_REQUEST[lid]'";
$vresnum=mysqli_query($con,$vsqlnum);
$vnum_status=mysqli_num_rows($vresnum);
$vnum_row=mysqli_fetch_array($vresnum);
if($vnum_status==0){
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=dashboard.php?m=0">';		 
}
$edit_status=$vnum_row[edit_status];
}
}

$month_dtls=$my->total_row($con,month_list,month_id,$_POST[month_id]);
$first_date=$_POST[year]."-".$_POST[month_id]."-01";
$end_date= date("Y-m-t", strtotime($first_date));





$sqlm_1="SELECT * FROM `amount_rate`";
$reslm_1=mysqli_query($con,$sqlm_1);
$rowlm_1=mysqli_fetch_array($reslm_1);
$tds_amt1=$rowlm_1[tds];
$tds_amt2=$rowlm_1[tds_pan];
$sc_amt=$rowlm_1[sc];



?>



<!DOCTYPE html>

<html>

	<head>

		<title>Statement</title>

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



<form action="employeeaction.php" method="post">



<table cellspacing="0" cellpadding="2" border="0" width="100%">

<tbody>



<tr>

<td><br>

<center><INPUT TYPE="submit" value="Submit" name="paysub" style="width:100px;height:30px;font-size:15px"></center>

<br>

</td>

</tr>







<tr>

<th style='font-size:15px;border:1px solid black;text-align:center;font-family: Verdana;'>Payout Details of <?=$month_dtls[month_name]?> <?=$_POST[year]?></th>

</tr>





<tr>

<td>

<center>







<table class="table" align="center" cellspacing="0" cellpadding="5" style="font-family: Verdana;width:100%;" id="table2excel">



<tr>

<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Employee ID</td>

<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Employee Name</td>

<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Designation</td>

<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Salary</td>

<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;TDS</td>

<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>&nbsp;Total</td>



</tr>



<? 



unset($_SESSION[stdt]);unset($_SESSION[endt]);unset($_SESSION[ptdt]);unset($_SESSION[employee_id]);unset($_SESSION[salary_amt]);

unset($_SESSION[td]);unset($_SESSION[sc]);unset($_SESSION[total_amt]);



$sel1 = "select * from `employee`  WHERE `entry_date`<='$end_date' AND `st`='1'";

$res_pay = mysqli_query($con,$sel1);

while($row_pay = mysqli_fetch_array($res_pay)) { 

$c++;



unset($sell_amt1);unset($sell_amt2);unset($sellamt);unset($pan);

unset($salary_amt);unset($td_charge);unset($sc_charge);unset($total_amt);unset($pan);unset($td_amt);



$pan=$row_pay[employee_pan];

if($pan!=""){

$td_amt=$tds_amt1;

}else{

$td_amt=$tds_amt2;

}





$salary_amt=$row_pay[employee_salary];



$td_charge=round(($salary_amt*$td_amt)/100);

//$sc_charge=round(($salary_amt*$sc_amt)/100);



$total_amt=round($salary_amt-($td_charge+$sc_charge));



$desig_dtls=$my->total_row($con,designation,designation_id,$row_pay[designation_id]);







?>

<tr>

<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$row_pay['employee_code']?></td>

<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$row_pay['employee_name']?></td>

<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$desig_dtls['designation_name']?></td>

<td style='font-size:14px;border:1px solid black;text-transform:uppercase'>&nbsp;<?=$salary_amt?></td>

<td style='font-size:14px;border:1px solid black;'>&nbsp;<?=$td_charge?></td>

<td style='font-size:14px;border:1px solid black;'>&nbsp;<?=$total_amt?></td>

</tr>	





<?php

$_SESSION[stdt][]=$first_date;

$_SESSION[endt][]=$end_date;

$_SESSION[ptdt][]=$today_date;

$_SESSION[employee_id][]=$row_pay[employee_id];

$_SESSION[td][]=$td_charge;

$_SESSION[total_amt][]=$total_amt;

$_SESSION[salary_amt][]=$salary_amt;



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



	</body>

</html>



