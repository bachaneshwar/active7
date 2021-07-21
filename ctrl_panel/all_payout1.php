<?php
ob_start();
error_reporting(0);
include_once("lib_panel/config.php");


$sql="SELECT * FROM `sponsor_payout`  WHERE `endt`='$_REQUEST[endt]' GROUP BY `endt`";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title> Payout Report From <?=$row[stdt]?> To <?=$row[endt]?></title>
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
<h1>  Payout Report From <?=$row[stdt]?> To <?=$row[endt]?></h1>

<div class="">
<div id="employee_grid_wrapper" class="dataTables_wrapper">

<table id="employee_grid" class="display dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="employee_grid_info" style="width: 100%;">
<thead>
<tr role="row">
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Sr</td>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Member ID</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Member</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Commission</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>TDS</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Admin</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Net Amount</th>

</tr>
</thead>


<tbody>



<? 

$sel1 = "select * from `sponsor_payout` WHERE `endt`='$_REQUEST[endt]'  AND `total_amt`!='0' ORDER BY `payout_id` ASC";
$res_pay = mysqli_query($con,$sel1);
while($row_pay = mysqli_fetch_array($res_pay)) { 
$c++;

$srow=$my->total_row($con,member,spid,$row_pay[spid]);

$commission+=$row_pay[commission];
$td+=$row_pay[td];
$sc_amount+=$row_pay[sc_amount];
$total_amt+=$row_pay[total_amt];

?>
<tr>
<td style='font-size:13px;border:1px solid black;'><?=$c?>.</td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[spid]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow['sname']?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[commission]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[td]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[sc_amount]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[total_amt]?></td>

</tr>	
<?} ?>

<tr>
<td style='font-size:13px;border:1px solid black;'>Total</td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$commission?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$td?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$sc_amount?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$total_amt?></td>
</tr>	

</tbody>


</table>


<center> <a style='text-decoration:none;font-size:20px'  href="show_all_payout1.php">BACK</a> </center>

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

