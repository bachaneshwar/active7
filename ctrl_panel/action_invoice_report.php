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
<title>Invoice Report From <?=$row[start_date]?> To <?=$row[end_date]?></title>
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
<h1>Invoice Report From <?=$_POST[start_date]?> To <?=$_POST[end_date]?></h1>

<div class="">
<div id="employee_grid_wrapper" class="dataTables_wrapper">

<table id="employee_grid" class="display dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="employee_grid_info" style="width: 100%;">
<thead>
<tr role="row">

<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Sr</td>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Invoice Number</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Member ID</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Member</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Amount</th>
<!-- <th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Binary</th> -->
<!-- <th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Reward Name</th> -->
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'> Date</th>


</tr>
</thead>


<tbody>
<?

$sel1="select * from `member`  WHERE `doj`>='$_POST[start_date]' AND `doj`<='$_POST[end_date]' AND `st`='1' AND `member_status`='1' ORDER BY `memid` ASC";
$res_pay = mysqli_query($con,$sel1);
while($row11 = mysqli_fetch_array($res_pay)) {
$c++;






// $binary_income+=$row8[0];
// $level_income+=$row8[1];
// $referral_income+=$row8[2];
// $td+=$row8[3];
// $sc_amount+=$row8[4];
// $total_amt+=$row8[5];

?>
<tr>

<td style='font-size:13px;border:1px solid black;'><?= $c;?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row11[invoice_vch_no]; ?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row11[spid]; ?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row11[sname]; ?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row11[amount]; ?></td>
<!-- <td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$binary_income?></td> -->
<!-- <td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$level_achive[level];?></td> -->
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row11[doj];?></td>


</tr>
<?} ?>


</tbody>


</table>


<center> <a style='text-decoration:none;font-size:20px'  href="invoice_report.php">BACK</a> </center>

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
