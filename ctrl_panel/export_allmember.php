<?php
ob_start();
error_reporting(0);
include_once("lib_panel/config.php");







?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>All Member Details</title>
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
<h1>All Member Details</h1>

<div class="">
<div id="employee_grid_wrapper" class="dataTables_wrapper">
<form action="" method="post">

<table id="employee_grid" class="display dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="employee_grid_info" style="width: 100%;">
<thead>
<tr role="row">


<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Sr</td>

<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Name</th>


<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>State</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Address</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Pincode</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Email</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Mobile No.</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Member ID</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Package</th>

</tr>
</thead>


<tbody>



<? 

$sel1 = "select * from `member` ORDER BY `memid` ASC";
$res_pay = mysqli_query($con,$sel1);
while($row_pay = mysqli_fetch_array($res_pay)) { 
$c++;

$srow=$my->total_row($con,package,package_id,$row_pay[package_id]);

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

<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay['sname']?></td>

<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[state]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[addr]?></td>

<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[pincode]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[email]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[mob]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[spid]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[package_name]?></td>

</tr>	
<?} ?>


</tbody>


</table>
<input type="hidden" name="stdt" value="<?=$row[stdt]?>" readonly />
<input type="hidden" name="endt" value="<?=$row[endt]?>"   readonly />
</form>

<center> <a style='text-decoration:none;font-size:20px'  href="export_allmember.php">BACK</a> </center>

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

