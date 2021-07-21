<?php
include("include/conn.php");
session_start();

$srow=$my->total_row($con,member,spid,$_REQUEST[spid]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<head>
		<title>Booking Report</title>
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

<table cellspacing="0" cellpadding="2" border="0" width="100%">
<tbody>



<tr>
<td>&nbsp;</td>
</tr>

<tr>
<td style='font-size:14px;border:2px solid black;font-weight:bold;text-align:center'>
Booking Report of <?=$srow[spid]?> (<?=$srow[sname]?>)
</td>
</tr>


<tr>
<td>
<center>
	<table class="table" align="center" cellspacing="0" cellpadding="5" style="font-family: Verdana;width:100%;" id="table2excel">
<thead>

<?
$plot_report=$my->search_row3($con,plot_booking,spid,$srow[spid],status,1,plot_bkId,$_REQUEST[pbId]);
?>

<tr>
<?
foreach($plot_report as $k1=>$v1){

$prow=$my->total_row($con,plot,plot_id,$v1[plot_id]);
$phrow=$my->total_row($con,phase,phase_id,$prow[phase_id]);
$arow=$my->total_row($con,area,area_id,$prow[area_id]);
?>
<th style='font-size:9px;border:2px solid black;font-weight:bold;text-align:center;width:20px' colspan="4">
<?=$phrow[phase_name]?> <?=$prow[plot_name]?> (<?=$arow[area_name]?>)
</th>
<?
}
?>
</tr>



<tr>
<?
foreach($plot_report as $k1=>$v1){
?>
<th style='font-size:9px;border:2px solid black;font-weight:bold;text-align:center;width:20px'>EMI Month-Year</th>
<th style='font-size:9px;border:2px solid black;font-weight:bold;text-align:center;width:20px'>Next EMI Date</th>
<th style='font-size:9px;border:2px solid black;font-weight:bold;text-align:center;width:20px'>Payment Date</th>
<th style='font-size:9px;border:2px solid black;font-weight:bold;text-align:center;width:20px'>Payment Amount</th>
<?
}
?>
</tr>

</thead>
<tbody>

<?
for($i=0;$i<=47;$i++){
?>

<tr  valign="middle">
<?php 
foreach($plot_report as $k1=>$v1){

if($i==0){
$sel_sp11 = "select * from `emi_payment` WHERE `plot_bkId`='$v1[plot_bkId]' AND `status`='1' AND `emi`='0'";
$res_sp11 = mysqli_query($con,$sel_sp11) ;
$row_sp11 = mysqli_fetch_array($res_sp11);
$first_bookdt = $row_sp11[payment_dt];
$date = new DateTime($first_bookdt);
$month=$date->format('F');
$exp=explode("-",$first_bookdt);
$year=$exp[0];
$next_bookdt=$row_sp11[next_emidt];

$explode_salary_dt=explode("-",$first_bookdt);
$days_no=cal_days_in_month(CAL_GREGORIAN,$explode_salary_dt[1],$explode_salary_dt[0]); // DAYS NO. IN A MONTH

$start_day=$explode_salary_dt[0]."-".$explode_salary_dt[1]."-"."01"; // MONTH START DAY
$end_day=$explode_salary_dt[0]."-".$explode_salary_dt[1]."-".$days_no; // MONTH END DAY



}else{

$date = new DateTime($first_bookdt);
$month=$date->format('F');
$exp=explode("-",$first_bookdt);
$year=$exp[0];

$current_dt=$first_bookdt;
$old_dt=explode("-",$current_dt);

$fdate = new DateTime($current_dt);
$fdate->modify($con,'first day of +1 month');
$fstdt=$fdate->format('Y-m-d'); 

$ldate = new DateTime($current_dt);
$ldate->modify($con,'last day of +1 month');
$enddt=$ldate->format('Y-m-d'); 

$explode_dt=explode("-",$fstdt);
$new_dt=$explode_dt[0]."-".$explode_dt[1]."-".$old_dt[2];

$valchq=checkdate($explode_dt[1],$old_dt[2],$explode_dt[0]);

if($valchq==""){$valchq=0;}

if($valchq==1){
$next_bookdt=$new_dt;
}else{
$next_bookdt=$enddt;
}

$explode_salary_dt=explode("-",$first_bookdt);
$days_no=cal_days_in_month(CAL_GREGORIAN,$explode_salary_dt[1],$explode_salary_dt[0]); // DAYS NO. IN A MONTH

$start_day=$explode_salary_dt[0]."-".$explode_salary_dt[1]."-"."01"; // MONTH START DAY
$end_day=$explode_salary_dt[0]."-".$explode_salary_dt[1]."-".$days_no; // MONTH END DAY



}

$exp_dt=explode("-",$next_bookdt);
$new_dt=$exp_dt[2]."/".$exp_dt[1]."/".$exp_dt[0]; 


$sql1="SELECT SUM(`payment_amt`) FROM `emi_payment` WHERE `payment_dt`>='$start_day' AND `payment_dt`<='$end_day' AND `status`='1' AND `plot_bkId`='$v1[plot_bkId]'";
$res1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($res1);

?>
<td style='font-size:9px;border:2px solid black;font-weight:bold;'>&nbsp;<?=$month?> - <?=$year?></td>
<td style='font-size:9px;border:2px solid black;font-weight:bold;'><?if($i<47){?><?=$new_dt?><?}?></td>
<td style='font-size:9px;border:2px solid black;font-weight:bold;'>
<?
$sql2="SELECT * FROM `emi_payment` WHERE `payment_dt`>='$start_day' AND `payment_dt`<='$end_day' AND `status`='1' AND `plot_bkId`='$v1[plot_bkId]'";
$res2=mysqli_query($con,$sql2);
while($row2=mysqli_fetch_array($res2)){
?>
<?=$row2[payment_dt]?>&nbsp;
<? } ?>
</td>
<td style='font-size:9px;border:2px solid black;font-weight:bold;'>&nbsp;<?=$row1[0]?></td>
<?php


$first_bookdt=$next_bookdt;

unset($next_bookdt);unset($start_day);unset($end_day);
}
unset($next_bookdt);
?>
</tr>

<? } ?>



</tbody>
</table>
</center>

</td>
</tr>


<tr><td>&nbsp; <br/></td></tr>



<tr>
<td >
<div id="pnlButton">
<br/>
<div class="tdEmpty width-200">
&nbsp;
</div>
<div class="tdLabel width-100">
&nbsp;
</div>
<div class="noprint tdControl buttons" >
<center>
<a onclick="window.print();" id="btnPrint" class="positive" usesubmitbehavior="False" href="javascript:__doPostBack('btnPrint','')">Print</a>
<a  href="booking_status.php">Back</a>
   <button class="btn btn-success" onclick="reloadPage()">Excel</button></div>
</center>
</div>

</div>
</td>
</tr>


</tbody>
</table>




		<script>
		
        
            
          
		
			$(function() {
				$("button").click(function(){
				$("#table2excel").table2excel({
					exclude: ".noExl",
    				name: "Excel Document Name"
				}); 
				 });
			});
		</script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	</body>
</html>