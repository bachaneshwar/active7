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
<title>Approve Withdrawal Details From <?=$_REQUEST[start_date]?> To <?=$_REQUEST[end_date]?></title>
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
<h1>Approve Withdrawal Details From <?=$_REQUEST[start_date]?> To <?=$_REQUEST[end_date]?></h1>

<div class="">
<div id="employee_grid_wrapper" class="dataTables_wrapper">

<table id="employee_grid" class="display dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="employee_grid_info" style="width: 100%;">
<thead>
<tr role="row">
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Sr</td>

<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Debit</th>
	<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Amount</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>IFSC Code</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Credit Account No</th>

<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Name</th>

<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Account Type</th>


</tr>
</thead>
<tbody>

<?
unset($tot);
$sel1 = "select * from `withdrawal` WHERE `status_dt`>='$_REQUEST[start_date]' AND `status_dt`<='$_REQUEST[end_date]' AND `status`='1'";
$res_pay = mysqli_query($con,$sel1);
while($row_pay = mysqli_fetch_array($res_pay)) {
$c++;

$srow=$my->total_row($con,member,spid,$row_pay[spid]);
$tot=$tot+$row_pay[amount];

?>
<tr>
<td style='font-size:13px;border:1px solid black;'><?=$c?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[amount]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[ifsc_code]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[acc_no]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow['sname']?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[acc_type]?></td>


</tr>
<?} ?>
<tr>
<td style='font-size:13px;border:1px solid black;'><?=$c?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'>Total</td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$tot?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>


</tr>

</tbody>


</table>


<center> <a style='text-decoration:none;font-size:20px'  href="approve_bank_search.php">BACK</a> </center>

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
