<?php
ob_start();
error_reporting(0);
include_once("lib_panel/config.php");


$sql="SELECT * FROM `sales_payout`  WHERE `endt`='$_REQUEST[endt]' GROUP BY `endt`";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Payout Report From <?=$row[stdt]?> To <?=$row[endt]?></title>
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
<h1>Payout Report From <?=$row[stdt]?> To <?=$row[endt]?></h1>

<div class="">
<div id="employee_grid_wrapper" class="dataTables_wrapper">

<table id="employee_grid" class="display dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="employee_grid_info" style="width: 100%;">
<thead>
<tr role="row">
<th style='border:1px solid black;'></td>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Sr</td>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Agent ID</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Name</th>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>Salary</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>Commission</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>Extra Comm.</td>
<th style='font-size:14px;border:1px solid black;font-weight:bold;text-align:center'>Direct</td>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>TDS</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Admin</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Total</th>

</tr>
</thead>


<tbody>



<? 

$sel1 = "select * from `sales_payout` WHERE `endt`='$_REQUEST[endt]'  AND `total_amt`!='0' ORDER BY `payout_id` ASC";
$res_pay = mysqli_query($con,$sel1);
while($row_pay = mysqli_fetch_array($res_pay)) { 
$c++;

$srow=$my->total_row($con,sales_agent,agent_code,$row_pay[agent_code]);

$salary_comm+=$row_pay[salary_comm];
$target_comm+=$row_pay[target_comm];
$extra_comm+=$row_pay[extra_comm];
$direct_comm+=$row_pay[direct_comm];


$td+=$row_pay[td];
$sc_amount+=$row_pay[sc_amount];
$total_amt+=$row_pay[total_amt];

?>
<tr>
<td style='border:1px solid black;width:1px'></td>
<td style='font-size:13px;border:1px solid black;'><?=$c?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[agent_code]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow['sname']?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[salary_comm]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[target_comm]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[extra_comm]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[direct_comm]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[td]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[sc_amount]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[total_amt]?></td>
</tr>	
<?} ?>

<tr>
<td style='font-size:13px;border:1px solid black;'></td>
<td style='font-size:13px;border:1px solid black;'>Total</td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$salary_comm?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$target_comm?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$extra_comm?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$direct_comm?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$td?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$sc_amount?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$total_amt?></td>
</tr>	

</tbody>


</table>


<center> <a style='text-decoration:none;font-size:20px'  href="sales_payout_dtls.php">BACK</a> </center>

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

