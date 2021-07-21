<?php
ob_start();
error_reporting(0);
include_once("lib_panel/config.php");




$stdt=$_POST['start_date'];
$endt=$_POST['end_date'];


?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Generation Details From <?=$_REQUEST[start_date]?> To <?=$_REQUEST[end_date]?></title>
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
<h1>Generation Details From <?=$_REQUEST[start_date]?> To <?=$_REQUEST[end_date]?></h1>

<div class="">
<div id="employee_grid_wrapper" class="dataTables_wrapper">

<table id="employee_grid" class="display dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="employee_grid_info" style="width: 100%;">
<thead>
<tr role="row">
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Sr</td>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Member ID</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Member</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Pin No</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Package</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Amount</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>TDS Charge</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Admin Charge</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Total</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Date</th>
</tr>
</thead>


<tbody>



<?
unset($amount);unset($tds);unset($sc);unset($tc);
$sel1 = "select * from `epin_transfer` WHERE `trans_date`>='$_REQUEST[start_date]' AND `trans_date`<='$_REQUEST[end_date]' AND `gen_type`='1' ORDER BY  `trans_date` ASC";
$res_pay = mysqli_query($con,$sel1);
while($row_pay = mysqli_fetch_array($res_pay)) {
$c++;


$srow=$my->total_row($con,member,spid,$row_pay[spid]);

unset($total_charge);
$package_det=$my->total_row($con,package,package_id,$row_pay[package_id]);
$total_charge=$row_pay['tds']+$row_pay['admin']+$row_pay['pin_amount'];

$amount=$amount+$row_pay['pin_amount'];
$tds=$tds+$row_pay['tds'];
$sc=$sc+$row_pay['admin'];
$tc=$tc+$total_charge;

?>
<tr>
<td style='font-size:13px;border:1px solid black;'><?=$c?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[spid]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow['sname']?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[pin_no]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$package_det['package_name']?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[pin_amount]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[tds]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[admin]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$total_charge?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay['trans_date']?></td>

</tr>
<?} ?>
<tr>
  <td style='font-size:13px;border:1px solid black;'><?=$c?></td>
  <td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
  <td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
  <td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
  <td style='font-size:13px;border:1px solid black;text-transform:uppercase'>Total</td>
  <td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$amount?></td>
  <td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$tds?></td>
  <td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$sc?></td>
  <td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$tc?></td>
  <td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>

</tr>

</tbody>


</table>


<center> <a style='text-decoration:none;font-size:20px'  href="epin_gen_history.php?lid=89">BACK</a> </center>

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
