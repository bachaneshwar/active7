<?php
ob_start();
error_reporting(0);
include_once("lib_panel/config.php");




?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Plot Booking Report</title>
<link rel="stylesheet" type="text/css" href="jscss/datatables.min.css">
<script type="text/javascript" src="jscss/datatables.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
font-size: 16px !important;
line-height: 25px !important;
}
</style>

</head>
<body class="">

<div class="container" style="min-height:500px;">

<div class="container" style="padding:20px;20px;">
<div class="">
<h1>Booking Report</h1>

<div class="">
<div id="employee_grid_wrapper" class="dataTables_wrapper">

<table id="employee_grid" class="display dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="employee_grid_info" style="width: 100%;">
<thead>
<tr role="row">
<th style='font-size:12px;border:1px solid black;font-weight:bold;text-align:center'>Sr</td>
<th style='font-size:12px;border:1px solid black;font-weight:bold;text-align:center'>Booking No</th>
<th style='font-size:12px;border:1px solid black;font-weight:bold;text-align:center'>Trans No</th>
<th style='font-size:12px;border:1px solid black;font-weight:bold;text-align:center'>Member Id</th>
<th style='font-size:12px;border:1px solid black;font-weight:bold;text-align:center'>Name</th>
<th style='font-size:12px;border:1px solid black;font-weight:bold;text-align:center'>Phase</th>
<th style='font-size:12px;border:1px solid black;font-weight:bold;text-align:center'>Plot</th>
<th style='font-size:12px;border:1px solid black;font-weight:bold;text-align:center'>Area</th>
<th style='font-size:12px;border:1px solid black;font-weight:bold;text-align:center'>Amount</th>
<th style='font-size:12px;border:1px solid black;font-weight:bold;text-align:center'>Date</th>
<th style='font-size:12px;border:1px solid black;font-weight:bold;text-align:center'>Paymode</th>
<th style='font-size:12px;border:1px solid black;font-weight:bold;text-align:center'>Details</th>
</tr>
</thead>


<tbody>



<? 
if($_POST[phase_id]=="" && $_POST[area_id]==""){
$sel1 = "select * from `plot_booking` WHERE `booking_date`>='$_REQUEST[start_date]' AND `booking_date`<='$_REQUEST[end_date]' AND `status`='1' ORDER BY `booking_date` ASC";
}
if($_POST[phase_id]!="" && $_POST[area_id]==""){
$sel1 = "select * from `plot_booking` as plotb,`plot` as plt WHERE plotb.booking_date>='$_REQUEST[start_date]' AND plotb.booking_date<='$_REQUEST[end_date]' AND plotb.status='1' AND plt.phase_id='$_POST[phase_id]' AND plotb.plot_id=plt.plot_id ORDER BY plotb.booking_date ASC";
}
if($_POST[phase_id]=="" && $_POST[area_id]!=""){
$sel1 = "select * from `plot_booking` as plotb,`plot` as plt WHERE plotb.booking_date>='$_REQUEST[start_date]' AND plotb.booking_date<='$_REQUEST[end_date]' AND plotb.status='1' AND plt.area_id='$_POST[area_id]' AND plotb.plot_id=plt.plot_id ORDER BY plotb.booking_date ASC";
}
if($_POST[phase_id]!="" && $_POST[area_id]!=""){
$sel1 = "select * from `plot_booking` as plotb,`plot` as plt WHERE plotb.booking_date>='$_REQUEST[start_date]' AND plotb.booking_date<='$_REQUEST[end_date]' AND plotb.status='1' AND  plt.area_id='$_POST[area_id]' AND plt.phase_id='$_POST[phase_id]' AND plotb.plot_id=plt.plot_id ORDER BY plotb.booking_date ASC";
}

$res_pay = mysqli_query($con,$sel1);
while($row_pay = mysqli_fetch_array($res_pay)) { 
$c++;

$sel_sp11 = "select * from `emi_payment` WHERE `plot_bkId`='$row_pay[plot_bkId]' AND `emi`='0'" ;
$res_sp11 = mysqli_query($con,$sel_sp11) ;
$row_sp11 = mysqli_fetch_array($res_sp11);

$srow=$my->total_row($con,member,spid,$row_pay[spid]);

$prow=$my->total_row($con,plot,plot_id,$row_pay[plot_id]);
$phrow=$my->total_row($con,phase,phase_id,$prow[phase_id]);
$arow=$my->total_row($con,area,area_id,$prow[area_id]);

$dt1=explode("-",$row_pay[booking_date]);
$dt2=$dt1[2]."-".$dt1[1]."-".$dt1[0];

$payrow=$my->total_row($con,payment_method,pay_method_id,$row_sp11[pay_method_id]);



?>
<tr>
<td style='font-size:12px;border:1px solid black;'><?=$c?>.</td>
<td style='font-size:12px;border:1px solid black;'><?php printf("%06d", $row_pay[plot_bkId]);?></td>
<td style='font-size:12px;border:1px solid black;'><?php printf("%06d", $row_sp11[emi_payId]);?></td>
<td style='font-size:12px;border:1px solid black;text-transform:uppercase'><?=$srow[spid]?></td>
<td style='font-size:12px;border:1px solid black;text-transform:uppercase'><?=$srow['sname']?></td>
<td style='font-size:12px;border:1px solid black;text-transform:uppercase'><?=$phrow[phase_name]?></td>
<td style='font-size:12px;border:1px solid black;text-transform:uppercase'><?=$prow[plot_name]?></td>
<td style='font-size:12px;border:1px solid black;text-transform:uppercase'><?=$arow[area_name]?></td>
<td style='font-size:12px;border:1px solid black;text-transform:uppercase'><?=$row_sp11[payment_amt]?></td>
<td style='font-size:12px;border:1px solid black;text-transform:uppercase'><?=$dt2?></td>
<td style='font-size:12px;border:1px solid black;'><?=$payrow[pay_method]?></td>
<td style='font-size:12px;border:1px solid black;'>
<?
if($row_sp11[pay_method_id]==2){
?>
<?=$row_sp11[cheque_no]?> <?=$row_sp11[cheque_date]?> <br/> <?=$row_sp11[bankdtls]?>
<? } ?>
<?
if($row_sp11[pay_method_id]==3){
?>
<?=$row_sp11[transition_no]?>
<? } ?>
<?
if($row_sp11[pay_method_id]==4 || $row_sp11[pay_method_id]==5){
?>
<?=$row_sp11[card_no]?> <?=$row_sp11[card_holder]?> <br/> <?=$row_sp11[card_details]?>
<? } ?>
<?=$row_sp11[transactionDtls]?>
</td>

</tr>	
<?} ?>



</tbody>


</table>


<center> <a style='text-decoration:none;font-size:20px'  href="plot_booking_report1.php">BACK</a> </center>

</div>
</div>
</div>

</div>


</div>


<script type="text/javascript">
$( document ).ready(function() {
$('#employee_grid').DataTable({
"processing": true,
"dom": 'lBfrtip',
"buttons": [
{
extend: 'collection',
text: 'Export',
buttons: [
'excel',
'csv',
'pdf',
'print'
]
}
]
});
});
</script>
</body>
</html>

