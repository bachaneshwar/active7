<?php
ob_start();
error_reporting(0);
include_once("lib_panel/config.php");







?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Withdrawl Details</title>
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
<h1>Withdrawl Details</h1>

<div class="">
<div id="employee_grid_wrapper" class="dataTables_wrapper">
<form action="" method="post">

<table id="employee_grid" class="display dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="employee_grid_info" style="width: 100%;">
<thead>
<tr role="row">


<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Sr</td>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Member ID</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Name</th>


<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Pancard</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Mobile No.</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Accoun No.</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Bank</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>IFSC Code</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Amount</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Approved Date</th>

</tr>
</thead>


<tbody>



<? 

$sel1 = "select * from `withdrawal` ORDER BY `with_d_id` ASC";
$res_pay = mysqli_query($con,$sel1);
while($row_pay = mysqli_fetch_array($res_pay)) { 
$c++;

$srow=$my->total_row($con,member,spid,$row_pay[spid]);

if($row_pay[pay_st]==1){
$status="Paid";
}else{
$status="Unpaid";
}

$total_deduction=$row_pay[td]+$row_pay[sc_amount];
// print $total_deduction;
?>
<tr>
	

<td style='font-size:13px;border:1px solid black;'><?=$c?>.</td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[spid]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow['sname']?></td>


<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[pan]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[mob]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[acc_no]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[bank]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[ifsc_code]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[amount]?></td>

<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[status_dt]?></td>

</tr>	
<?} ?>


</tbody>


</table>

</form>

<center> <a style='text-decoration:none;font-size:20px'  href="dashboard.php">BACK</a> </center>

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

