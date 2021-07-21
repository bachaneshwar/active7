<?php
ob_start();
error_reporting(0);
include_once("lib_panel/config.php");


$sql="SELECT * FROM `generate_payout`  WHERE `gen_payout_id`='$_REQUEST[gen_payout_id]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Payout Report From <?=$row[start_date]?> To <?=$row[end_date]?></title>
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
<h1>Payout Report From <?=$row[start_date]?> To <?=$row[end_date]?></h1>

<div class="">
<div id="employee_grid_wrapper" class="dataTables_wrapper">

<table id="employee_grid" class="display dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="employee_grid_info" style="width: 100%;">
<thead>
<tr role="row">
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'></td>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Sr</td>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Member ID</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Member</th>

<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Binary</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Level</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Referral</th>


<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>TDS</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Donation</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Total</th>

</tr>
</thead>


<tbody>



<?

$sel1="SELECT * FROM `payout`  WHERE `gen_payout_id`!='0' AND `gen_payout_id`='$row[gen_payout_id]' AND `total_amt`!='0' GROUP BY `spid` ORDER BY  `payout_id` ASC";
$res_pay = mysqli_query($con,$sel1);
while($row_pay = mysqli_fetch_array($res_pay)) {
$c++;

$srow=$my->total_row($con,member,spid,$row_pay[spid]);

$sql8="SELECT SUM(`binary_income`),SUM(`level_income`),SUM(`referral_income`),SUM(`td`),SUM(`sc_amount`),SUM(`total_amt`)  FROM `payout`  WHERE `gen_payout_id`='$row_pay[gen_payout_id]' AND `spid`='$row_pay[spid]'";
$res8=mysqli_query($con,$sql8);
$row8=mysqli_fetch_array($res8);


$binary_income+=$row8[0];
$level_income+=$row8[1];
$referral_income+=$row8[2];
$td+=$row8[3];
$sc_amount+=$row8[4];
$total_amt+=$row8[5];

?>
<tr>
<td style='font-size:13px;border:1px solid black;'></td>
<td style='font-size:13px;border:1px solid black;'><?=$c?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[spid]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow['sname']?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row8[0]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row8[1]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row8[2]?></td>

<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row8[3]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row8[4]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row8[5]?></td>
</tr>
<?} ?>

<tr>
<td style='font-size:13px;border:1px solid black;'></td>
<td style='font-size:13px;border:1px solid black;'>Total</td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$binary_income?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$level_income?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$referral_income?></td>

<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$td?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$sc_amount?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$total_amt?></td>
</tr>

</tbody>


</table>


<center> <a style='text-decoration:none;font-size:20px'  href="show_all_payout.php">BACK</a> </center>

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
